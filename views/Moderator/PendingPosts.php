<?php
include "../../controllers/PendingPostsController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Pending Posts</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
    </head>

    <body>
        <form method="POST">
            <!-- Adding Moderator Navbar -->
            <?php include "./navbar.php" ?>

            <div class="remainDiv2">
                <div style="padding-top: 2vh;"></div>
                    <center>
                        <table class="table2">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Post By</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php renderPendingPosts(); ?>
                            </tbody>
                        </table>
                    </center>
            </div>
        </form>
    </body>
</html>