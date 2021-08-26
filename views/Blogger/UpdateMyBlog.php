<?php
include "../../controllers/UpdateMyBlogController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Update Blog</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/PostBlogJS.js"></script>
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

            <div class="remainDiv">
                <div style="padding-top: 3vh;"></div>
                <input type="text" placeholder="Post Title" class="inputText1" name="titleTB" id="titleTB" value="<?php echo $blog[0]["title"]; ?>">
                <select name="category"  id="category" class="inputText1">
                    <option value="">Select Category</option>
                    <?php renderCategories(); ?>
                </select>
                <textarea class="textarea1" name="contentTB" id="contentTB" placeholder="Write Blog Here..."><?php echo $blog[0]["content"]; ?></textarea>
                <br>
                <span class="error"><?php echo $msg; ?></span>
                <span class="success"><?php echo $success; ?></span>
                <br>
                <button type="submit" class="btnPost" name="updateBTN" id="updateBTN" onclick="return validatePost();">UPDATE BLOG</button>
            </div>
        </form>
    </body>
</html>