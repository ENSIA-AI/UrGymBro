<?php
session_start();
unset($_SESSION['user']);
session_unset();    
header("refresh:1;url=/UrGymBro-main/html/homepage_s.php");
exit();
?>