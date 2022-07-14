<?php
// setcookie("cafe_no_list", "");
// setcookie("cafe_name_list", "");
// setcookie("price_list", "");
// setcookie("quantity_list", "");

//cookie
setcookie("id", "");
setcookie("passed", "");

// session
session_start();
session_unset();
session_destroy();
header("location:login.php");
