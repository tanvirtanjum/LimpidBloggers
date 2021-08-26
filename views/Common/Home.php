<?php
include "../../controllers/HomeController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Home</title>

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
            <!-- Adding Common Layout -->
            <?php include "./SharedLayout.php" ?>

            <div class="homeDiv">
                <p class="homeHeader"><b>Welcome to LimpidBloggers</b></p>
                <span class="homeInfo"><i>Join our community and share your thoughts.</i></span>
            </div>
        </form>
    </body>
</html>