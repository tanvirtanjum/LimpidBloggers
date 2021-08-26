<?php
session_start();

require_once '../../models/BlogModel.php';
require_once '../../models/BookmarkModel.php';
require_once '../../models/CommentModel.php';

$urlValidate = true;
$id = $_GET['id'];
$blogs = getReadableBlog($id,3);
$comments = null;
$msg = "";

$data = array("comment"=>"", "blog_id"=>"", "commenter_id"=>"");

$validate = true;

function validateComment()
{
    global $validate;

    if(empty(trim($_POST['commentTB'])))
    {
        $validate = false;
    }

    return $validate;
}

function loadBlog($id)
{
    $checkBook = getCheckBookMark($id, unserialize($_COOKIE["userInfo"])["id"]);
    global $blogs;
    $content = "";
    if(sizeof($blogs) > 0 && $blogs != null)
    {
        foreach($blogs as $data)
        {
            $content .= '<center>';
            $content .=        '<div class="blogsDiv">';
            $content .=            '<h1 class="blogTitle">'.$data["title"].'</h1>';
            $content .=            '<p class="blogSub">By- <a class="ancorText3" href="https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id='.$data["blogged_by"].'">'.$data["blogger_name"].'</a></p>';
            if($_SESSION["loginInfo"]["usertype_id"]==3 && !$checkBook && $data["blogger_id"] != unserialize($_COOKIE["userInfo"])["id"])
            {
                $content .=            '<center>';
                $content .=                '<button type="submit" id="bookmarkBTN" name="bookmarkBTN" class="btnBookmark" >ADD TO BOOKMARK</button>';
                $content .=            '</center>';
            }
            if($_SESSION["loginInfo"]["usertype_id"]==3 && $checkBook && $data["blogger_id"] != unserialize($_COOKIE["userInfo"])["id"])
            {
                $content .=            '<center>';
                $content .=                '<a class="linkBtn5" href="#" disabled>BOOKMARKED</a>';
                $content .=            '</center>';
            }
            $content .=            '<span class="blogContent" style="text-align: justify;">'.$data["content"].'</span>';
            $content .=            '<br>';
            $content .=            '<p class="blogTime">'.$data["post_time"].' (<i style="color:#15ad01;">'.$data["category"].'</i>)</p>';
            $content .=        '</div>';
            $content .='</center>';	
        }
    }
    else
    {
        $content .= '<center><h1 class="error2">NO BLOGS FOUND.</h1></center>';
    }

    echo $content;
}

function loadComments($id)
{
    global $comments;
    $comments = loadCommentsByBlogID($id);
    $content = "";
    if(sizeof($comments) > 0 && $comments != null)
    {
        foreach($comments as $data)
        {
            $content .= '<tr>';
            $content .= '<td><a class="ancorText3" href="https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id='.$data["commenter_id"].'">'.$data["name"].'</a></td>';
            $content .= '<td>'.$data["comment"].'</td>';
            $content .= '<td>'.$data["comment_time"].'</td>';
            if($_SESSION["loginInfo"]["usertype_id"] == 3 && $data["commenter_id"] == unserialize($_COOKIE["userInfo"])["id"])
            {
                $content .= '<td><a class="ancorText4" onclick="return confirm_delete();" href="https://localhost/LimpidBloggers/controllers/api/DeleteMyComment.php?blogid='.$data["blog_id"].'&commentid='.$data["id"].'">Delete</a></td>';
            }
            $content .='</tr>';	
        }
    }
    else
    {
        $content .= '<tr><td colspan="4" align="middle"><h1 class="error2">NO COMMENTS FOUND.</h1></td></tr>';
    }

    echo $content;
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
{
    if($blogs == null)
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

    }

    if(isset($_POST["commentBTN"]))
    {
        if(validateComment())
        {
            $data = array("comment"=>$_POST["commentTB"], "blog_id"=>$id, "commenter_id"=>unserialize($_COOKIE["userInfo"])["id"]);
            $execution = insertComment($data);

            if($execution)
            {
                increaseCommentCount($id);
            }
            else
            {
                $msg = "Something Went Wrong.";
            }
        }
        else
        {
            $msg = "Write Comment First.";
        }
    }

    if(isset($_POST["bookmarkBTN"]))
    {
        $dataBookmark = array("blog_id"=>$id, "bookmarked_by"=>unserialize($_COOKIE["userInfo"])["id"]);
        $execution = insertBookmark($dataBookmark);

        if($execution)
        {
            increaseBookmarkCount($id);
        }
    }
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>