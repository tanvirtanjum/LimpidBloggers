<?php
session_start();

require_once '../../models/LoginModel.php';

function loadActiveBloggers()
{
    $bloggers = getBloggersByRegistarationStatus(3);
    $content = "";
    $Sl = 1;
    if(sizeof($bloggers) > 0 && $bloggers != null)
    {
        foreach($bloggers as $data)
        {
            $content .= '<tr>';
            $content .=        '<td>'.$Sl.'</td>';
            $content .=        '<td>'.$data["name"].'</td>';
            $content .=        '<td>'.$data["email"].'</td>';
            $content .=        '<td>'.$data["contact"].'</td>';
            $content .=        '<td>'.$data["gender"].'</td>';
            $content .=        '<td align="middle"><a class="linkBtn1" href="https://localhost/LimpidBloggers/views/Blogger/BloggerProfile.php?id='.$data["blogger_id"].'">View Profile</a></td>';
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

if(isset($_SESSION['loginInfo']) && isset($_COOKIE['userInfo']))
{
    
}
else
{
    header("Location: https://localhost/LimpidBloggers/controllers/api/Logout.php");
}
?>