<?php
session_start();
    if(!isset($_POST['input']) || !isset($_POST['password'])) {
        $mydisplay= "<div class='subtitle'>Please fill all the fields</div>";
        }

        $input=trim($_POST['input']);
        
        $password=trim($_POST['password']);

        @$my_connection=new mysqli('localhost','root','','urgymbro');
if (mysqli_connect_errno()) 
{
    $mydisplay= 'Error: Could not connect to database. Please try again later.';
    
}
$query="SELECT *  FROM `users` WHERE `User_id`=?";
$query2="SELECT *  FROM `users` WHERE `email`=?";



$nameverif=$my_connection->prepare($query);
        $nameverif->bind_param('s',$input);
        $nameverif->execute();
        $nameverif->store_result();
        if($nameverif->num_rows==0)
        {
            $mydisplay= "<div class='subtitle'>Error in Username/Email or Password</div>";

        }
        else if($nameverif->num_rows==1){
            $nameverif->bind_result($input, $pass,$m,$n,$t,$c,$s,$token);
             ($nameverif->fetch());
if(password_verify($password, $pass)){
    unset($_SESSION['msg']);
    $_SESSION['user']=$token;
    header( "refresh:1;url=/UrGymBro-main/html/hompage_connected_s.php" );
    //header("Location:/UrGymBro-main/html/homepage.php:3");
    exit();
   // $mydisplay= "<div class='subtitle'>Welcome back</div>";
}
else
$mydisplay= "<div class='subtitle'>Error in Username/Email or Password</div>";


        }
        $nameverif=$my_connection->prepare($query2);
        $nameverif->bind_param('s',$input);
        $nameverif->execute();
        $nameverif->store_result();
        if($nameverif->num_rows==0)
        {
            $mydisplay= "<div class='subtitle'>Error in Username/Email or Password</div>";

        }
        else if($nameverif->num_rows==1){
            $nameverif->bind_result($input, $pass,$m,$n,$t,$c,$s,$token);
             ($nameverif->fetch());
if(password_verify($password, $pass)){
    unset($_SESSION['msg']);
    $_SESSION['user']=$token;
    if(isset($_SESSION['page'])){
    if($_SESSION['page']!='profile')
    header( "refresh:1;url=/UrGymBro-main/html/hompage_connected_s.php" );}
else{
header( "refresh:1;url=/UrGymBro-main/html/Profile_s.php" );
unset($_SESSION['page']);
}
    //header("Location:/UrGymBro-main/html/homepage.php:3");
    exit();
   // $mydisplay= "<div class='subtitle'>Welcome back</div>";
}
else
$mydisplay= "<div class='subtitle'>Error in Username/Email or Password</div>";


        }
        //header("Location:/UrGymBro-main/html/Login_Page_webdev.php");
        $_SESSION["msg"] =  $mydisplay ;
        header("Location: /UrGymBro-main/html/Login_Page_webdev_s.php");
       
?>





