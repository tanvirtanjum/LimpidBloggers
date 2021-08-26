<?php
include "../../controllers/SignInController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Login</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/SignInJS.js"></script>
    </head>

    <body>
        <form method="POST">
            <!-- Adding Common Layout -->
            <?php include "./SharedLayout.php" ?>

            <div class="remainDiv">
                <div style="padding-top: 20vh;"></div>
                <center>
                        <div class="loginDiv">
                            <h1 class="loginHeader">Sign In</h1>
                            <input type="text" name="emailTB" id="emailTB" class="inputText1" placeholder="Email" value="<?php echo $data["email"]; ?>">
                            <input type="password" name="passwordTB" id="passwordTB" class="inputText1" placeholder="Password" value="<?php echo $data["password"]; ?>">
                            <span class="error"><?php echo $msg; ?></span>
                            <br>
                            <span class="message1">Don't have any account? <a class="ancorText" href="https://localhost/LimpidBloggers/views/Common/SignUp.php">Click Here</a><span>
                            <button type="submit" name="loginBTN" id="loginBTN" class="btnLogin" onclick="return validateLogin()"><b>LOGIN</b></button>
                        </div>
                </center>
            </div>
        </form>
    </body>
</html>