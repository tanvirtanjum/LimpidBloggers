<?php
include "../../controllers/SignUpController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Registration</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="http://localhost/LimpidBloggers/assets/js/SignUpJS.js"></script>
    </head>

    <body>
        <form method="POST">
            <!-- Adding Common Layout -->
            <?php include "./SharedLayout.php" ?>

            <div class="remainDiv">
                <div style="padding-top: 3vh;"></div>
               <center>
                    <div class="regDiv">
                        <h1 class="loginHeader">Sign Up</h1>
                        <input type="text" name="nameTB" id="nameTB" class="inputText1" placeholder="Full Name" value="<?php echo $dataBlogger['name']; ?>">
                        <input type="text" class="inputText1" placeholder="Contact" value="+880" style="width: calc(20%);" readonly>
                        <input type="text" name="contactTB" id="contactTB" class="inputText1" placeholder="1XXXXXXXXX" value="<?php echo $dataBlogger['contact']; ?>" style="width: calc(75%);">
                        <input type="text" name="dateTB" id="dateTB" class="inputText1" value="<?php echo $dataBlogger['birth_date']; ?>" onfocus="(this.type='date')" onfocusout="(this.type='text')" placeholder="Date of Birth">
                        <select id="gender" name="gender" class="inputText1" style="width: calc(47.5%);">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <select id="bloodgroup" name="bloodgroup" class="inputText1" style="width: calc(47.5%);">
                            <option value="">Select Bloog Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <input type="text" name="emailTB" id="emailTB" class="inputText1" placeholder="Email" value="<?php echo $dataLogin['email']; ?>">
                        <input type="password" name="passwordTB" id="passwordTB" class="inputText1" placeholder="Password" value="">
                        <input type="password" name="conpasswordTB" id="conpasswordTB" class="inputText1" placeholder="Confirm Password" value="">
                        <span class="error"><?php echo $msg; ?></span>
                        <span class="success"><?php echo $success; ?></span>
                        <br>
                        <span class="message1">Already have an account? <a class="ancorText" href="https://localhost/LimpidBloggers/views/Common/SignIn.php">Click Here</a><span>
                        <button type="submit" name="registerBTN" id="registerBTN" class="btnReg" onclick="return validateRegistration()"><b>REGISTER</b></button>
                    </div>
               </center>
            </div>
        </form>
    </body>
</html>