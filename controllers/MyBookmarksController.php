<?php
session_start();

require_once '../../models/BookmarkModel.php';

function loadMyBookmarks()
{
    $bloggers = getBookmarksByOwner(unserialize($_COOKIE["userInfo"])["id"]);
    $content = "";
    $Sl = 1;
    if(sizeof($bloggers) > 0 && $bloggers != null)
    {
        foreach($bloggers as $data)
        {
            $content .= '<tr>';
            $content .=        '<td>'.$Sl.'</td>';
            $content .=        '<td>'.$data["title"].'</td>';
            $content .=        '<td><a class="ancorText3" href="https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id='.$data["blogger_id"].'">'.$data["blogger_name"].'</a></td>';
            $content .=        '<td>'.$data["category"].'</td>';
            $content .=        '<td>'.$data["post_time"].'</td>';
            $content .=        '<td align="middle">';
            $content .=             '<a class="linkBtn1" href="https://localhost/LimpidBloggers/views/Common/Blog.php?id='.$data["blog_id"].'">View Blog</a>&nbsp;';
            $content .=             '<a class="linkBtn4" onclick="return confirm_delete();" href="https://localhost/LimpidBloggers/controllers/api/DeleteMyBookmark.php?id='.$data["id"].'">Remove</a>';
            $content .=        '</td>';
            $content .='</tr>';	
            $Sl += 1;
        }
    }
    else
    {
        $content .= '<tr><td colspan="6" align="middle"><h2 class="error2">NO BLOGGERS FOUND.</h2></td></tr>';
    }

    echo $content;
}

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 3)
{
    
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>