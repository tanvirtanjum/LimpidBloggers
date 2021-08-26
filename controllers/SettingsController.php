<?php
session_start();

require_once '../../models/LoginModel.php';

$data = array("id"=>"", "password"=>"");
$validate = true;
$msg = "";

function validateProceed()
{
    global $validate, $msg;
    if(empty(trim($_POST["oldpasswordTB"])))
    {
        $validate = false;
    }
    else
    {
        if($_POST["oldpasswordTB"] != $_SESSION['loginInfo']['password'])
        {
            $validate = false;
            $msg .= "Incorrect Old Password. ";
        }
    }

    if(empty(trim($_POST["newpasswordTB"])) || strlen(trim($_POST["newpasswordTB"])) < 4)
    {
        $validate = false;
    }

    if(empty(trim($_POST["conpasswordTB"])) || strlen(trim($_POST["conpasswordTB"])) < 4 || $_POST["newpasswordTB"] != $_POST["newpasswordTB"])
    {
        $validate = false;
    }

    return $validate;
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
{
    if(isset($_POST["proceedBTN"]))
    {
        if(validateProceed())
        {
            $data = array("id"=>$_SESSION['loginInfo']['id'], "password"=>$_POST["newpasswordTB"]);

            $confirm = updatePassword($data);

            if(!$confirm)
            {
                $msg = "Something Went Wrong.";
            }
            else
            {
                header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
            }
        }
        else
        {
            $msg .= " Fill up Correctly.";
        }
    }
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>