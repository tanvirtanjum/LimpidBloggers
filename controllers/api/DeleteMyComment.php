<?php
session_start();

require_once '../../models/BlogModel.php';
require_once '../../models/CommentModel.php';

$blogid = $_GET['blogid'];
$commentid = $_GET['commentid'];

$urlValidate = true;

$allData = getBlogByID($blogid);
$commentData = loadCommentByIDandBlogID($blogid, $commentid);

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 3)
{
    if($allData == null)
    {
        $urlValidate = false;
    }
    if($commentData == null)
    {
        $urlValidate = false;
    }
    if (!isset($_GET['blogid'])) 
    {
        $urlValidate = false;
    }
    if (!isset($_GET['commentid'])) 
    {
        $urlValidate = false;
    }

    if(!$urlValidate)
    {
        header("Location: https://localhost/LimpidBloggers/views/Common/SignIn.php");
    }
    else
    {
        if($commentData[0]["commenter_id"] == unserialize($_COOKIE['userInfo'])['id'])
        {
            $execution = deleteComment($commentid);
            if($execution)
            {
                decreseCommentCount($blogid);
            }
            header("Location: https://localhost/LimpidBloggers/views/Common/Blog.php?id=$blogid");
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