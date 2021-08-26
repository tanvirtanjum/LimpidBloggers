<?php
include "../../controllers/MyProfileController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Profile</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/MyProfileJS.js"></script>
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

            <div class="remainDiv">
                <div style="padding-top: 3vh;"></div>
               <center>
                    <div class="<?php if($_SESSION['loginInfo']['usertype_id'] != 3){echo "infoDiv2";} else{ echo "infoDiv1"; } ?>">
                        <h1 class="loginHeader">My Information</h1>
                        <input type="text" name="nameTB" id="nameTB" class="inputText1" placeholder="Full Name" value="<?php echo $data["name"]; ?>" readonly>
                        <input type="text" class="inputText1" placeholder="Contact" value="+880" style="width: calc(15%);" readonly>
                        <input type="text" name="contactTB" id="contactTB" class="inputText1" placeholder="1XXXXXXXXX" value="<?php echo $data["contact"]; ?>" style="width: calc(80%);" readonly>
                        <input type="text" name="dateTB" id="dateTB" class="inputText1" value="<?php echo $data["birth_date"]; ?>" onfocus="(this.type='date')" onfocusout="(this.type='text')" placeholder="Date of Birth" readonly>
                        <?php
                        if($_SESSION['loginInfo']['usertype_id'] != 3)
                        {
                            echo '<input type="text" name="salaryTB" id="salaryTB" class="inputText1" placeholder="Salary" value="'.$data["salary"].'" readonly>';
                            echo '<input type="text" name="designTB" id="designTB" class="inputText1" placeholder="Designation" value="'.$data["designation"].'" readonly>';
                        }
                        ?>
                        <select id="gender" name="gender" class="inputText1" style="width: calc(47.5%);" disabled>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if($data["gender"]=="Male"){echo "selected";} ?>>Male</option>
                            <option value="Female" <?php if($data["gender"]=="Female"){echo "selected";} ?>>Female</option>
                            <option value="Other" <?php if($data["gender"]=="Other"){echo "selected";} ?>>Other</option>
                        </select>
                        <select id="bloodgroup" name="bloodgroup" class="inputText1" style="width: calc(47.5%);" disabled>
                            <option value="">Select Bloog Group</option>
                            <option value="A+" <?php if($data["blood_group"]=="A+"){echo "selected";} ?>>A+</option>
                            <option value="A-" <?php if($data["blood_group"]=="A-"){echo "selected";} ?>>A-</option>
                            <option value="AB+" <?php if($data["blood_group"]=="AB+"){echo "selected";} ?>>AB+</option>
                            <option value="AB-" <?php if($data["blood_group"]=="AB-"){echo "selected";} ?>>AB-</option>
                            <option value="B+" <?php if($data["blood_group"]=="B+"){echo "selected";} ?>>B+</option>
                            <option value="B-" <?php if($data["blood_group"]=="B-"){echo "selected";} ?>>B-</option>
                            <option value="O+" <?php if($data["blood_group"]=="O+"){echo "selected";} ?>>O+</option>
                            <option value="O-" <?php if($data["blood_group"]=="O-"){echo "selected";} ?>>O-</option>
                        </select>
                        <input type="text" name="emailTB" id="emailTB" class="inputText1" placeholder="Email" value="<?php echo $data["email"]; ?>" readonly>
                        <span class="error"><?php echo $msg; ?></span>
                        <span class="success"><?php echo $success; ?></span>
                        <br>
                        <button type="button" name="enableBTN" id="enableBTN" class="btnEn" onclick="enableEdit();"><b>ENABLE UPDATE</b></button>
                        <button type="submit" name="updateBTN" id="updateBTN" class="btnReg" onclick="return validateUpdate();" hidden><b>CONFIRM UPDATE</b></button>
                    </div>
               </center>
            </div>
        </form>
    </body>
</html>