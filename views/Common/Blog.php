<?php
include "../../controllers/BlogController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Blog</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="http://localhost/LimpidBloggers/assets/js/BlogJS.js"></script>
    </head>

    <body>
        <form method="POST">
            <!-- Adding Navbar Layout -->
            <?php 
            if($_SESSION['loginInfo']['usertype_id'] == 1)
            {
                include "../Admin/navbar.php";
            }
            if($_SESSION['loginInfo']['usertype_id'] == 2)
            {
                include "../Moderator/navbar.php";
            }
            if($_SESSION['loginInfo']['usertype_id'] == 3)
            {
                include "../Blogger/navbar.php";
            }
            ?>

            <div class="remainDiv2">
                <div style="padding-top: 1vh;"></div>
                <div style="width: 100%;">
                    <?php
                        loadBlog($id);

                        if($_SESSION['loginInfo']['usertype_id'] == 3)
                        {
                            include "../Blogger/CommentSection.php";
                        }
                    ?>
                </div>
                <center>
                    <table class="table3">
                        <tbody>
                            <?php loadComments($id); ?>
                        </tbody>
                    </table>
                </center>
            </div>
        </form>
    </body>
</html>