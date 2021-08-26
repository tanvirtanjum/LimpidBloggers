<?php
session_start();

require_once '../../models/BlogModel.php';
require_once '../../models/CommentModel.php';
require_once '../../models/BookmarkModel.php';

$id = $_GET['id'];

$urlValidate = true;

$allData = getBlogByID($id);

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 3)
{
    if($allData == null)
    {
        $urlValidate = false;
    }
    if (!isset($_GET['id'])) 
    {
        $urlValidate = false;
    }

    if(!$urlValidate)
    {
        header("Location: https://localhost/LimpidBloggers/views/Common/SignIn.php");
    }
    else
    {
        if($allData[0]["blogged_by"] == unserialize($_COOKIE['userInfo'])['id'])
        {
            deleteCommentForBlogDelete($id);
            deleteBookmarkForBlogDelete($id);
            deleteBlog($id);
            header("Location: https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id=".unserialize($_COOKIE["userInfo"])["id"]);
        }
        else
        {
            header("Location: https://localhost/LimpidBloggers/views/Common/SignIn.php");
        }
    }
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>