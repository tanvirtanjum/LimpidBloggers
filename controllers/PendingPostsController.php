<?php
session_start();

require_once '../../models/BlogModel.php';

function renderPendingPosts()
{
    $blogs = getAllBlogsByBlogStatus(1);
    $content = "";
    if(sizeof($blogs) > 0 && $blogs != null)
    {
        $Sl = 1;
        foreach($blogs as $data)
        {
            $content .= '<tr>';
            $content .=            '<td>'.$Sl.'</td>';
            $content .=            '<td>'.$data["title"].'</td>';
            $content .=            '<td>'.$data["category"].'</td>';
            $content .=            '<td>'.$data["post_time"].'</td>';
            $content .=            '<td><span class="attenText1">Pending</span></td>';
            $content .=            '<td>'.$data["blogger_name"].'</td>';
            $content .=             '<td align="middle">';
            $content .=                 '<a class="linkBtn3" href="https://localhost/LimpidBloggers/controllers/api/ApproveBlog.php?id='.$data["id"].'">Approve</a>&nbsp';
            $content .=                 '<a class="linkBtn4" href="https://localhost/LimpidBloggers/controllers/api/RejectBlog.php?id='.$data["id"].'">Reject</a>';
            $content .=             '</td>';
            $content .='</tr>';	
            $Sl += 1;
        }
    }
    else
    {
        $content .= '<tr><td class="error2" colspna="7">NO PENDING BLOGS FOUND.</td></tr>';
    }

    echo $content;
}


if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']) && $_SESSION['loginInfo']['usertype_id'] == 2)
{
    
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>