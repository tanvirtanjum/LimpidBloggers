<?php
session_start();

require_once '../../models/BlogModel.php';
require_once '../../models/CategoryModel.php';

function renderCategories()
{
    $categories = getCategories();

    $content = "";
    if(sizeof($categories) > 0 && $categories != null)
    {
        foreach($categories as $data)
        {
            $content .= '<option value="'.$data["id"].'">'.$data["category"].' Blogs</option>';
        }
    }
    else
    {
        $content .= '';
    }

    echo $content;
}

function loadApprovedBlogs()
{
    $blogs = getAllBlogsByBlogStatus(3);
    $content = "";
    if(sizeof($blogs) > 0 && $blogs != null)
    {
        foreach($blogs as $data)
        {
            $content .= '<center>';
            $content .=        '<div class="blogsDiv">';
            $content .=            '<h1 class="blogTitle">'.$data["title"].'</h1>';
            $content .=            '<p class="blogSub">By- <a class="ancorText3" href="https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id='.$data["blogged_by"].'">'.$data["blogger_name"].'</a></p>';
            $content .=            '<span class="blogContent">'.substr($data["content"], 0, 550).'....</span>';
            $content .=            '<br>';
            $content .=            '<center>';
            $content .=                '<a class="linkBtn1" href="https://localhost/LimpidBloggers/views/Common/Blog.php?id='.$data["id"].'">Read Full Blog</a>';
            $content .=            '</center>';
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

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
{
    
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>