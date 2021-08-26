<?php
include "../../controllers/BlogsController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Blogs</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="http://localhost/LimpidBloggers/assets/js/BlogsJS.js"></script>
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
                <div style="padding-top: 1vh;">
                   <?php 
                        if($_SESSION['loginInfo']['usertype_id'] == 3)
                        {
                            echo '<a class="linkBtn2" href="http://localhost/LimpidBloggers/views/Blogger/PostBlog.php">Post New Blog</a>';
                        } 
                   ?>
                   <select name="category"  id="category" class="inputText1" onchange="search();">
                        <option value="">All Blogs</option>
                        <?php renderCategories(); ?>
                    </select>
                </div>
                <div id="blogs">
                    <?php
                        loadApprovedBlogs();
                    ?>
                </div>
            </div>
        </form>
    </body>
</html>