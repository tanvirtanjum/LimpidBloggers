<?php
session_start();

require_once '../../models/CategoryModel.php';
require_once '../../models/BlogModel.php';

$data = array("title"=>"", "content"=>"", "category_id"=>"", "blogstatus_id"=>'1', "blogged_by"=>"");

$validate = true;

$msg = "";
$success = "";

function renderCategories()
{
    $categories = getCategories();

    $content = "";
    if(sizeof($categories) > 0 && $categories != null)
    {
        foreach($categories as $data)
        {
            $content .= '<option value="'.$data["id"].'">'.$data["category"].'</option>';
        }
    }
    else
    {
        $content .= '';
    }

    echo $content;
}

function validatePost()
{
    global $validate;

    if(empty(trim($_POST['titleTB'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['category'])))
    {
        $validate = false;
    }
    if(empty(trim($_POST['contentTB'])))
    {
        $validate = false;
    }

    return $validate;
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 3)
{
    if(isset($_POST["postBTN"]))
    {
        $execution = true;
        if(validatePost())
        {
            $data = array("title"=>$_POST['titleTB'], "content"=>$_POST['contentTB'], "category_id"=>$_POST['category'], "blogstatus_id"=>'1', "blogged_by"=>unserialize($_COOKIE['userInfo'])['id']);
            $execution = insertBlog($data);

            if(!$execution)
            {
                $msg = "Something Went Wrong. Try Again";
            }
            else
            {
                $success = "Blog Posted. Blog Status: <b>Pending</b><br>Moderator Acceptance Needed for Publish.";
            }
        }
        else
        {
            $msg = "Fill up Correctly.";
        }
    }
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>