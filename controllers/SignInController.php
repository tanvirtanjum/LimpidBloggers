<?php
session_start();

require_once '../../models/LoginModel.php';
require_once '../../models/EmployeeModel.php';
require_once '../../models/BloggerModel.php';

$msg = "";
$validate = true;
$data = array("email"=>"",  "password"=>"");

function validateLogin()
{
    global $validate;

    if(empty(trim($_POST['emailTB'])) || !filter_var($_POST['emailTB'], FILTER_VALIDATE_EMAIL))
    {
        $validate = false;
    }
    if(empty(trim($_POST['passwordTB'])))
    {
        $validate = false;
    }

    return $validate;
}

if(!isset($_SESSION['loginInfo']) && !isset($_COOKIE['userInfo']))
{
    if (isset($_POST['loginBTN'])) 
    {
        if(validateLogin())
        {
            $data = array("email"=>$_POST['emailTB'], "password"=>$_POST['passwordTB']);
        
            $loginInfo = getUser($data);
    
            if($loginInfo == null)
            {
                $msg = "Incorrect Email/Password";
            }
            else
            {
                if($loginInfo[0]["regstatus_id"] != 3)
                {
                    $msg = "Registration Status: ".$loginInfo[0]["regstatus"];
                }
                else
                {
                    $_SESSION['loginInfo'] = $loginInfo[0]; 
    
                    if($_SESSION['loginInfo']['usertype_id'] != 3)
                    {
                        $userInfo = getEmployeeByLoginID($loginInfo[0]["id"]);
    
                        if($userInfo!= null)
                        {
                            setcookie("userInfo", serialize($userInfo[0]),time()+(20 * 365 * 24 * 60 * 60),"/");
                        }
                        else
                        {
                            session_destroy();
                            unset($_SESSION["loginInfo"]);
    
                            $msg = "Something Went Wrong. Contact Supports.";
                        }
                        
                    }
                    else
                    {
                        $userInfo = getBloggerByLoginID($loginInfo[0]["id"]);
                        if($userInfo!= null)
                        {
                            setcookie("userInfo", serialize($userInfo[0]),time()+3600,"/");
                        }
                        else
                        {
                            session_destroy();
                            unset($_SESSION["loginInfo"]);
    
                            $msg = "Something Went Wrong. Contact Supports.";
                        }
                    }
    
                    header("Location: https://localhost/LimpidBloggers/views/Common/Blogs.php");
                }
            }
        }
        else
        {
            $msg = "Please Fill-up Correctly.";
        }
    }
}
else
{
    // header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
    header("Location: https://localhost/LimpidBloggers/views/Common/Blogs.php");
}
?>