<?php
session_start();

require_once '../../models/EmployeeModel.php';
require_once '../../models/BloggerModel.php';

$msg = "";
$success = "";
$validate = true;
$data = array("id"=>"", "name"=>"", "contact"=>"", "blood_group"=>"", "gender"=>"", "birth_date"=>"", "login_id"=>"", "email"=>"", "salary"=>"", "designation"=>"");

function validateUpdate()
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

    return $validate;
}

function getDetails()
{
    global $data;

    if($_SESSION['loginInfo']['usertype_id'] != 3)
    {
        $user = getEmployeeByID(unserialize($_COOKIE["userInfo"])["id"]);

        $data = array("id"=>$user[0]["id"], "name"=>$user[0]["name"], "contact"=>substr($user[0]["contact"], 4), "blood_group"=>$user[0]["blood_group"], "gender"=>$user[0]["gender"], "birth_date"=>$user[0]["birth_date"], "login_id"=>$user[0]["login_id"], "email"=>$user[0]["email"], "salary"=>$user[0]["salary"], "designation"=>$user[0]["type"]);
    }
    else
    {
        $user = getBloggerByID(unserialize($_COOKIE["userInfo"])["id"]);

        $data = array("id"=>$user[0]["id"], "name"=>$user[0]["name"], "contact"=>substr($user[0]["contact"], 4), "blood_group"=>$user[0]["blood_group"], "gender"=>$user[0]["gender"], "birth_date"=>$user[0]["birth_date"], "login_id"=>$user[0]["login_id"], "email"=>$user[0]["email"], "salary"=>"", "designation"=>"");
    }
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
{
    getDetails();

    if(isset($_POST['updateBTN']))
    {
        if(validateUpdate())
        {
            $data["name"] = $_POST["nameTB"];
            $data["contact"] = "+880".$_POST["contactTB"];
            $data["blood_group"] = $_POST["bloodgroup"];
            $data["gender"] = $_POST["gender"];
            $data["birth_date"] = $_POST["dateTB"];

            $execution = true;

            if($_SESSION['loginInfo']['usertype_id'] != 3)
            {
                $execution = updateEmployeeOwnProfile($data);
            }
            else
            {
                $execution = updateBloggerOwnProfile($data);
            }

            if($execution)
            {
                $success = "Information Successfully Updated.";
                getDetails();
            }
            else
            {
                $msg = "Something Went Wrong. Try Again.";
            }

        }
        else
        {
            $msg = "Fill up Correctly";
        }
    }
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>