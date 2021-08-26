<?php
session_start();

require_once '../../models/LoginModel.php';
require_once '../../models/BloggerModel.php';

$msg = "";
$success = "";
$validate = true;
$dataLogin = array("email"=>"",  "password"=>"", "usertype_id"=>"", "regstatus_id"=>"");
$dataBlogger = array("name"=>"",  "contact"=>"",  "blood_group"=>"",  "gender"=>"",  "birth_date"=>"",  "login_id "=>"");

function validateRegistration()
{
    global $validate;

    if(empty(trim($_POST['nameTB'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['contactTB'])) || !is_numeric($_POST['contactTB']) || strlen(trim($_POST['contactTB'])) != 10)
    {
        $validate = false;
    }
    if(empty(trim($_POST['dateTB'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['gender'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['bloodgroup'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['emailTB'])) || !filter_var($_POST['emailTB'], FILTER_VALIDATE_EMAIL)) 
    {
        $validate = false;
    }
    if(empty(trim($_POST['passwordTB'])) || strlen(trim($_POST['passwordTB'])) < 4)
    {
        $validate = false;
    }
    if($_POST['passwordTB'] != $_POST['conpasswordTB'])
    {
        $validate = false;
    }

    return $validate;
}

if(!isset($_SESSION['loginInfo']) && !isset($_COOKIE['userInfo']))
{
    if(isset($_POST['registerBTN']))
    {
        if(validateRegistration())
        {
            $dataLogin = array("email"=>$_POST['emailTB'], "password"=>$_POST['passwordTB'], "usertype_id"=>"3", "regstatus_id"=>"3");
            $dataBlogger = array("name"=>$_POST['nameTB'],  "contact"=>$_POST['contactTB'],  "blood_group"=>$_POST['bloodgroup'],  "gender"=>$_POST['gender'],  "birth_date"=>$_POST['dateTB'],  "login_id"=>"");

            if(emailExist($dataLogin["email"]))
            {
                $msg = "Email Already Exists.";
            }
            else
            {
                $loginID = insertLogin($dataLogin);

                if($loginID == -1 || $loginID != getIDByEmail($dataLogin["email"]))
                {
                    $msg = "Something Went Wrong. Try Again.";
                }
                else
                {
                    $dataBlogger = array("name"=>$_POST['nameTB'],  "contact"=>$_POST['contactTB'],  "blood_group"=>$_POST['bloodgroup'],  "gender"=>$_POST['gender'],  "birth_date"=>$_POST['dateTB'],  "login_id"=>$loginID);

                    if(insertBlogger($dataBlogger))
                    {
                        // $success = "Successfully Registered. Approval Required for Login.";
                        $success = "Successfully Registered. Login and Enjoy.";
                    }
                    else
                    {
                        $msg = "Something Went Wrong. Try Again.";
                    }
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
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>