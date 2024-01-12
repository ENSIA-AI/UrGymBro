<?php
session_start();

    if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['user_email']) || !isset($_POST['password_conf'])||
     !isset($_POST['user_gender'])|| !isset($_POST['b_date'])|| !isset($_POST['user_weight'])|| 
     !isset($_POST['user_height'])) {
        $_SESSION['msgs']= "<div class='subtitle'>Please fill all the fields</div>";
        header("Location: /UrGymBro-main/html/signup_s.php");
        exit();}
        @$my_connection=new mysqli('localhost','root','','urgymbro');
        if (mysqli_connect_errno()) 
        {
            echo 'Error: Could not connect to database. Please try again later.';
            exit;
        }
        $username=trim($_POST['username']);
        $token=substr(hash('md5',$_POST['username']),0,200);
        $email=trim($_POST['user_email']);
        $query2="SELECT User_id FROM `users` WHERE `User_id`=?";
        $query3="SELECT User_id FROM `users` WHERE `email`=?";
        $query4="SELECT User_id FROM `users` WHERE `token`=?";
        $nameverif=$my_connection->prepare($query2);
        $nameverif->bind_param('s',$username);
        $nameverif->execute();
        $nameverif->store_result();
        if($nameverif->num_rows!=0)
        {
            $_SESSION['msgs']="<div class='subtitle'>username already exists</div>";
            header("Location: /UrGymBro-main/html/signup_s.php");
exit();
        }
$emailverif=$my_connection->prepare($query3);
$emailverif->bind_param('s',$email);
        $emailverif->execute();
        $emailverif->store_result();
        if($emailverif->num_rows!=0)
        {
            $_SESSION['msgs']="<div class='subtitle'>email already exists</div>";
            header("Location: /UrGymBro-main/html/signup_s.php");
exit();
        }
       do {$tokenverif=$my_connection->prepare($query4);
$tokenverif->bind_param('s',$token);
        $tokenverif->execute();
        $tokenverif->store_result();
        if($tokenverif->num_rows==0)
        {break;}
            $token=substr(hash('md5',$token.generateRandomString()),0,200);
        }while($tokenverif->num_rows!=0);
        

        $password=trim($_POST['password']);
        $password_conf=trim($_POST['password_conf']);
        $gender=trim($_POST['user_gender']);
        $bdate=trim($_POST['b_date']);
        $weight=trim($_POST['user_weight']);
        $height=trim($_POST['user_height']);
        if($password!=$password_conf){
            $_SESSION['msgs']= "<div class='subtitle'>error in one of the passwords</div>";
            header("Location: /UrGymBro-main/html/signup_s.php");
            exit();
        }
        if($gender=='Male'){
            $gender=0;
        }
        else
        $gender=1;
$query="INSERT INTO `users` VALUES(?,?,?,?,?,?,?,?)";
$hashed_password=password_hash($password,PASSWORD_DEFAULT);
$statement=$my_connection->prepare($query);
$statement->bind_param('sssisiis',$username,$hashed_password,$bdate,$gender,$email,$height,$weight,$token);
$statement->execute();
$_SESSION['user']=$token;
unset($_SESSION['msg']);
header( "refresh:1;url=/UrGymBro-main/html/hompage_connected_s.php" );








function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}