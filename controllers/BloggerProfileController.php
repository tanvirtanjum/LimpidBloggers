<?php
session_start();

require_once '../../models/BloggerModel.php';

$id = $_GET['id'];

$urlValidate = true;

$allData = getBloggersInfoAlongBlogsByBloggerID($id);

function loadBloggersPosts()
{
    global $allData;
    $content = "";
    $Sl = 1;
    if(sizeof($allData) > 0 && $allData != null)
    {
        if($allData[0]['title']!=null)
        {
            foreach($allData as $data)
            {
                if($data['blog_status'] == "Approved")
                {
                    $content .= '<tr>';
                    $content .=        '<td>'.$Sl.'</td>';
                    $content .=        '<td>'.$data["title"].'</td>';
                    $content .=        '<td>'.$data["category"].'</td>';
                    $content .=        '<td>'.$data["post_time"].'</td>';
                    $content .=        '<td><span class="attenText1">'.$data["blog_status"].'</span></td>';
                    $content .=        '<td>'.$data["comment_count"].'</td>';
                    $content .=        '<td>'.$data["bookmark_count"].'</td>';
                    $content .=        '<td align="middle"><a class="linkBtn1" href="https://localhost/LimpidBloggers/views/Common/Blog.php?id='.$data["blog_id"].'">View Blog</a></td>';
                    $content .='</tr>';	
                    $Sl += 1;
                }
            }

            if($Sl < 2)
            {
                $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGS FOUND.</h2></td></tr>';
            }
        }
        else
        {
            $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGS FOUND.</h2></td></tr>';
        }
    }
    else
    {
        $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGS FOUND.</h2></td></tr>';
    }

    echo $content;
}

function loadBloggersPostsMyPanel()
{
    global $allData;
    $content = "";
    $Sl = 1;
    if(sizeof($allData) > 0 && $allData != null)
    {
        if($allData[0]['title']!=null)
        {
            foreach($allData as $data)
            {
                $content .= '<tr>';
                $content .=        '<td>'.$Sl.'</td>';
                $content .=        '<td>'.$data["title"].'</td>';
                $content .=        '<td>'.$data["category"].'</td>';
                $content .=        '<td>'.$data["post_time"].'</td>';
                $content .=        '<td><span class="attenText1">'.$data["blog_status"].'</span></td>';
                $content .=        '<td>'.$data["comment_count"].'</td>';
                $content .=        '<td>'.$data["bookmark_count"].'</td>';
                if($data['blog_status'] == "Approved")
                {
                    $content .=        '<td align="middle">';
                    $content .=                '<a class="linkBtn1" href="https://localhost/LimpidBloggers/views/Common/Blog.php?id='.$data["blog_id"].'">View Blog</a>&nbsp;';
                    $content .=                '<a class="linkBtn3" href="https://localhost/LimpidBloggers/views/Blogger/UpdateMyBlog.php?id='.$data["blog_id"].'">Update</a>&nbsp';
                    $content .=                '<a class="linkBtn4" onclick="return confirm_delete();" href="https://localhost/LimpidBloggers/controllers/api/DeleteMyBlog.php?id='.$data["blog_id"].'">Delete</a>';
                    $content .=        '</td>';
                }
                else
                {
                    $content .=        '<td align="middle">';
                    $content .=                '<a class="linkBtn3" href="https://localhost/LimpidBloggers/views/Blogger/UpdateMyBlog.php?id='.$data["blog_id"].'">Update</a>&nbsp';
                    $content .=                '<a class="linkBtn4" onclick="return confirm_delete();" href="https://localhost/LimpidBloggers/controllers/api/DeleteMyBlog.php?id='.$data["blog_id"].'">Delete</a>';
                    $content .=        '</td>';
                }
                $content .='</tr>';	
                $Sl += 1;
            }
        }
        else
        {
            $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGS FOUND.</h2></td></tr>';
        }
    }
    else
    {
        $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGS FOUND.</h2></td></tr>';
    }

    echo $content;
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
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

    }
}
else
{
    header("Location:https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>