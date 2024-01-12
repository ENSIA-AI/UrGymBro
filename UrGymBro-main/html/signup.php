<?php
session_start();
if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['user_email']) && !isset($_POST['password_conf'])&&
!isset($_POST['user_gender'])&& !isset($_POST['b_date'])&& !isset($_POST['user_weight'])&&
!isset($_POST['user_height'])) {}
 else  if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['user_email']) || !isset($_POST['password_conf'])||
     !isset($_POST['user_gender'])|| !isset($_POST['b_date'])|| !isset($_POST['user_weight'])|| 
     !isset($_POST['user_height'])) {
        $_SESSION['msgs']= "<div class='subtitle'>Please fill all the fields</div>";
        header("Location: /UrGymBro-main/html/signup.php");
        exit();}
       else{@$my_connection=new mysqli('localhost','root','','urgymbro');
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
        $query4="SELECT User_id FROM `users` WHERE `email`=?";
        $nameverif=$my_connection->prepare($query2);
        $nameverif->bind_param('s',$username);
        $nameverif->execute();
        $nameverif->store_result();
        if($nameverif->num_rows!=0)
        {
            $_SESSION['msgs']="<div class='subtitle'>username already exists</div>";
            header("Location: /UrGymBro-main/html/signup.php");
exit();
        }
$emailverif=$my_connection->prepare($query3);
$emailverif->bind_param('s',$email);
        $emailverif->execute();
        $emailverif->store_result();
        if($emailverif->num_rows!=0)
        {
            $_SESSION['msgs']="<div class='subtitle'>email already exists</div>";
            header("Location: /UrGymBro-main/html/signup.php");
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
            header("Location: /UrGymBro-main/html/signup.php");
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
setcookie('user',"$token",time() + (86400 * 30), "/");
unset($_SESSION['msg']);
header( "refresh:0;url=/UrGymBro-main/html/hompage_connected.php" );
exit();


      }
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}?>




<!DOCTYPE html>
<html>

<head>
  <title>Sign up now</title>
  <link rel="stylesheet" href="../style/signup.css">
</head>


<body>
  <nav>
    <label class="logo"><a href="../html/homepage.html"><img src="../images/Property Black.svg"
          width="100px" /></a></label>
    <button class="menu-button">&#9776;</button>
    <ul class="nav-list" id="navbarList">
      <li class="nav-item"><a id="home" href="../html/homepage.html">HOME</a></li>
      <li class="nav-item"><a id="maps" href="../html/maps.html">MAPS
        </a></li>
      <li class="nav-item"><a id="products" href="../html/products.html">PRODUCTS</a></li>
      <li class="nav-item"><a id="food" href="../html/Food.html">FOOD</a></li>
      <li class="nav-item"><a id="aboutus" href="../html/About_Us_webdev.html">ABOUT US </a></li>
      <li class="nav-item"><a id="login" href="../html/Login_Page_webdev.html">LOG IN </a></li>
    </ul>
  </nav>

  <div class="sp_div2">
    <div class="join_us">Sign Up</div>
    <div class="subtitle">Join us and take your health to the next level !</div>
    <?php
    if(isset($_SESSION['msgs'])){
    echo $_SESSION['msgs'];
  unset($_SESSION['msgs']);  
  }
        ?>
    <div class="container">
      <form action="#" method="post" id="sign_up_form">
        <input type="text" name="username" id="username" placeholder="Username" class="sign_up_input" required>

        <input type="email" name="user_email" id="user_email" placeholder="Email Adress" class="sign_up_input" required>
        <input type="password" name="password" id="password" placeholder="Password" class="sign_up_input" required>

        <input type="password" name="password_conf" id="password_conf" placeholder="Confirmm Your Password"
          class="sign_up_input" required>

        <select name="user_gender" id="user_gender" class="sign_up_input" required>
          <option value="" id="place_g" disabled selected>Gender</option>
          <option>Male</option>
          <option>Female</option>
        </select>

        <input type="text" name="b_date" id="b_date" placeholder="MM/DD/YYYY" onfocus="(this.type='date')"
          class="sign_up_input" required>
        <input type="number" name="user_weight" id="user_weight" class="sign_up_input" placeholder="Your weight in kg"
          required>
        <input type="number" name="user_height" id="user_height" class="sign_up_input" placeholder="Your height in cm"
          required>
        <div class="reminder" id="have_acc">
          <p>You already have an account ?<a class="a_reminder" href="../html/Login_Page_webdev.html"> Login
              Now !</a></p>
        </div>
    
    <div class="button1">
      <input type="submit" name="sign_up_button" id="sign_up_button" value="Create!" required>
    </div>
    </form>
</div>
    <footer>
      <div class="containerFooter">
        <div class="rowFooter">
          <div class="footerCol">
            <h4>UrGymBro</h4>
            <p>A website dedicated to helping you become your Best Form while providing you with the Right Diet, Products
              and even finding the Right Gym for you! </p>
          </div>
          <div class="footerCol">
            <h4>Useful links</h4>
            <ul>
              <li><a href="#">Log in</a></li>
              <li><a href="../html/maps.html">Maps</a></li>
              <li><a href="#">Foods</a></li>
              <li><a href="#">Products</a></li>
            </ul>
          </div>
          <div class="footerCol">
            <h4>Follow Us</h4>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="footerCol">
            <h4>Contact Us</h4>
            <div class="wrapper">
              <div class="input-data">
                <label class="input_field" for="email">Email</label>
                <input type="text" name="email" id="email">
              </div>
            </div>
            <div class="wrapper">
              <div class="input-data">
                <label class="input_field" for="name">Message</label>
                <textarea name="Message" id="message" cols=pixel_to rows="5"></textarea>
              </div>
            </div>
            <div class="submit">
              <input type="submit" id="submit" name="submit" value="Submit">
            </div>
          </div>
        </div>
      </div>
      <div class='cr-con'>Copyright &copy; 2023 | Made by UrGymBro TEAM</div>
    </footer>


  </div>
  <script src="../javascript/sign_up_form.js"></script>
  <script src="../javascript/go_to_top.js"></script>
  <script src="../javascript/navbar.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</body>

</html>




