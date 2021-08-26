<?php
session_start();

require_once '../../models/BlogModel.php';

$id = $_GET['id'];

$urlValidate = true;

$allData = getBlogByID($id);

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 2)
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
        if($allData[0]["blogstatus_id"] == 1)
        {
            $execution = updateMyBlogStatus(2, $id);

            if($execution)
            {
                header("Location: https://localhost/LimpidBloggers/views/Moderator/PendingPosts.php");
            }
            else
            {
                header("Location: https://localhost/LimpidBloggers/views/Common/SignIn.php");
            }
            
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