<?php
session_start();

require_once '../../models/CategoryModel.php';
require_once '../../models/BlogModel.php';

$data = array("id"=>"", "title"=>"", "content"=>"", "category_id"=>"", "blogged_by"=>"");

$id = $_GET["id"];

$blog = getBlogByIDandOwnerID($id, unserialize($_COOKIE["userInfo"])["id"]);

$validate = true;

$msg = "";
$success = "";

function renderCategories()
{
    global $blog;
    $categories = getCategories();

    $content = "";
    if(sizeof($categories) > 0 && $categories != null)
    {
        foreach($categories as $data)
        {
            if($blog[0]["category_id"] == $data["id"])
            {
                $content .= '<option value="'.$data["id"].'" selected>'.$data["category"].'</option>';
            }
            else
            {
                $content .= '<option value="'.$data["id"].'">'.$data["category"].'</option>';
            }
            
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
    if(isset($_POST["updateBTN"]))
    {
        $execution = true;
        if(validatePost())
        {
            $data = array("id"=>$id, "title"=>$_POST['titleTB'], "content"=>$_POST['contentTB'], "category_id"=>$_POST['category'], "blogged_by"=>unserialize($_COOKIE['userInfo'])['id']);
            $execution = updateMyBlog($data);

            if(!$execution)
            {
                $msg = "Something Went Wrong. Try Again";

                $blog = getBlogByIDandOwnerID($id, unserialize($_COOKIE["userInfo"])["id"]);
            }
            else
            {
                $success = "Blog Updated.";

                $blog = getBlogByIDandOwnerID($id, unserialize($_COOKIE["userInfo"])["id"]);
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