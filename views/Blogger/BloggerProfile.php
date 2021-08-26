<?php
include "../../controllers/BloggerProfileController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LimpidBlogger | Blogger</title>

        <link rel="icon" href="https://localhost/LimpidBloggers/assets/image/Project Icon/LimpidBloggers.ico">

        <!-- Adding External CSS -->
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/navigationbar.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/divs.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/texts.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/forms.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/buttons.css">
        <link rel="stylesheet" href="https://localhost/LimpidBloggers/assets/css/tables.css">

        <!-- Adding External JS -->
        <script src="https://localhost/LimpidBloggers/assets/js/BloggerProfileJS.js"></script>
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

            <div>
                 
            <div class="remainDiv2">
                <div style="padding-top: 3vh;"></div>
                <div style="width: calc(25%); float: left; text-align:center;">
                    <span class="blogTitle"><?php echo $allData[0]["name"]; ?></span>
                    <br>
                    <b><i><a href="mailto:<?php echo $allData[0]["email"]; ?>"><?php echo $allData[0]["email"]; ?></a></i></b>
                    <br>
                    Contact: <b><i><a href="tel:<?php echo $allData[0]["contact"]; ?>"><?php echo $allData[0]["contact"]; ?></a></i></b>
                    <br>
                    Gender: <b><i><?php echo $allData[0]["gender"]; ?></i></b>
                    <br>
                    Blood Group: <b><i><?php echo $allData[0]["blood_group"]; ?></i></b>
                    <br>
                    Date of Birth: <b><i><?php echo $allData[0]["birth_date"]; ?></i></b>
                    <br>
                    <br>
                    <?php
                    if($_SESSION['loginInfo']['usertype_id'] == 3 && unserialize($_COOKIE['userInfo'])['id'] == $id)
                    {
                        echo '<a class="linkBtn3" href="http://localhost/LimpidBloggers/views/Common/MyProfile.php">Edit Profile</a>';
                    }
                    ?>
                </div>
                <div style="width: calc(75%); float: right; overflow-y:scroll">
                   <?php 
                        if($_SESSION['loginInfo']['usertype_id'] == 3 && unserialize($_COOKIE['userInfo'])['id'] == $id)
                        {
                            echo '<a class="linkBtn2" href="http://localhost/LimpidBloggers/views/Blogger/PostBlog.php">Post New Blog</a>';
                        } 
                   ?>
                   <div style="padding-top: 2vh;"></div>
                    <center>
                        <table class="table2">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Comments</th>
                                <th>Bookmarks</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                    if($_SESSION['loginInfo']['usertype_id'] == 3 && unserialize($_COOKIE['userInfo'])['id'] == $id)
                                    {
                                        loadBloggersPostsMyPanel();
                                    }
                                    else
                                    {
                                        loadBloggersPosts();
                                    }
                                ?>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </form>
    </body>
</html>