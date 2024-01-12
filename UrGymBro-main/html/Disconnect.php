<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']); 
    setcookie('user', '', -1, '/');
    header("refresh:1;url=/UrGymBro-main/html/homepage.php");
exit();
} else {
    return false;
}
?>