<?php
session_start();

setcookie("userInfo",$_COOKIE["userInfo"],time()-(20 * 365 * 24 * 60 * 60),"/");
unset($_COOKIE["userInfo"]);

session_destroy();
unset($_SESSION["loginInfo"]);

header("Location: https://localhost/LimpidBloggers/");
?>