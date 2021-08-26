<?php
include "../../controllers/MyBookmarksController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Bookmarks</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/MyBookmarksJS.js"></script>
    </head>

    <body>
        <form method="POST">
            <!-- Adding Navbar Layout -->
            <?php 
            if($_SESSION['loginInfo']['usertype_id'] == 3)
            {
                include "./navbar.php";
            }
            ?>

            <div class="remainDiv2">
                <div style="padding-top: 3vh;"></div>
                <center>
                    <table class="table2">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Blogger</th>
                            <th>Genre</th>
                            <th>Post Time</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                loadMyBookmarks();
                            ?>
                        </tbody>
                    </table>
                </center>
            </div>
        </form>
    </body>
</html>