<?php
include "../../controllers/CommunityController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Community</title>

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
                <div style="padding-top: 3vh;"></div>
                <center>
                    <table class="table1">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                loadActiveBloggers();
                            ?>
                        </tbody>
                    </table>
                </center>
            </div>
        </form>
    </body>
</html>