<?php
include "../../controllers/SettingsController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Settings</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/SettingsJS.js"></script>
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
                <div style="padding-top: 20vh;"></div>
                <center>
                        <div class="changepassDiv">
                            <br>
                            <input type="password" name="oldpasswordTB" id="oldpasswordTB" class="inputText1" placeholder="Old Password">
                            <input type="password" name="newpasswordTB" id="newpasswordTB" class="inputText1" placeholder="New Password">
                            <input type="password" name="conpasswordTB" id="conpasswordTB" class="inputText1" placeholder="Confirm New Password">
                            <span class="error"><?php echo $msg; ?></span>
                            <br>
                            <button type="submit" name="proceedBTN" id="proceedBTN" class="btnProceed" onclick="return validateProceed()"><b>PROCEED</b></button>
                        </div>
                </center>
            </div>
        </form>
    </body>
</html>