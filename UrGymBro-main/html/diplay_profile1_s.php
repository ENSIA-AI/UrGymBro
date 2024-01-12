<?php
session_start();
if (
    !isset($_POST['username']) || !isset($_POST['oldusername']) || !isset($_POST['email']) || !isset($_POST['gender']) ||
    !isset($_POST['weight']) ||
    !isset($_POST['height'])
) {
   
   // header("Location: /UrGymBro-main/html/Profile.php");
    exit();
} else {
    
    @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit();
    }
    $oldusername =trim($_POST['oldusername']);
    $username = trim($_POST['username']);
    $email =trim($_POST['email']);
    $oldemail=trim($_POST['oldemail']);
    if ($oldusername != $username) {
        $query2 = "SELECT User_id FROM `users` WHERE `User_id`=?";
        
        $nameverif = $my_connection->prepare($query2);
        $nameverif->bind_param('s', $username);
        $nameverif->execute();
        $nameverif->store_result();
        if ($nameverif->num_rows != 0) {
           
            $_SESSION['name'] = "username already exists";
            header("Location: /UrGymBro-main/html/Profile_s.php");
            exit();
        }
    }
    if($oldemail!=$email){
    $query3 = "SELECT User_id FROM `users` WHERE `email`=?";
    $emailverif = $my_connection->prepare($query3);
    $emailverif->bind_param('s', $email);
    $emailverif->execute();
    $emailverif->store_result();
    if ($emailverif->num_rows != 0) {
        
        $_SESSION['email'] = "email already exists";
        header("Location: /UrGymBro-main/html/Profile_s.php");
        exit();
    }}


    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height']*100;
    $query = "UPDATE `users` SET `User_id`=?,`gender`=?,`email`=?,`height`=?,`weight`=? WHERE `User_id`=?";
    $statement = $my_connection->prepare($query);
    $statement->bind_param('sisiis', $username, $gender, $email, $height, $weight, $oldusername);
    $statement->execute();
    header("refresh:1;url=/UrGymBro-main/html/Profile_s.php");







    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }














}










