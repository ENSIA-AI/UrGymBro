<?php
if (isset($_COOKIE['user'])) {
  header("refresh:1;url=/UrGymBro-main/html/hompage_connected.php");
  exit();
} ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="../style/Login_Page_webdev.css" />
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
      <li class="nav-item"><a id="login" href="#">LOG IN </a></li>
    </ul>
  </nav>

  <div class="title">Login</div>
  <div class="subtitle" id="kk">Welcome Back !</div>

  <div class="container">
    <form action="#" method="post">
      <input type="text" name="input" id="username" class="sign_up_input" placeholder="Username" required />
      <input type="password" name="password" id="password" class="sign_up_input" placeholder="Password" required />
      <div class="button1">
        <input type="submit" name="login_button" id="login_button" value="Login!" required />
      </div>
    </form>
  </div>
  <div class="reminder" id="have_acc">
    <p>Don't have an account ?<a class="a_reminder" href="../html/signup.php"> Sign Up !</a></p>
  </div>
  <div class="button_container">

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
  <script src="../javascript/login_auh.js"></script>
  <script src="../javascript/navbar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="../javascript/go_to_top.js"></script>
</body>

</html>



<?php
session_start();

if (!isset($_POST['input']) || !isset($_POST['password'])) {
  if(isset($_SESSION["msg"]))
  {echo "
<script>
  mydiv=document.getElementById('kk');
  mydiv.innerHTML='" . $_SESSION["msg"] . "';
</script>";
unset($_SESSION["msg"]);
exit();}
  else
  $mydisplay = "Please fill all the fields";
} else {
  $input = trim($_POST['input']);

  $password = trim($_POST['password']);

  @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
  if (mysqli_connect_errno()) {
    $mydisplay = 'Error: Could not connect to database. Please try again later.';
  }
  $query = "SELECT *  FROM `users` WHERE `User_id`=?";
  $query2 = "SELECT *  FROM `users` WHERE `email`=?";



  $nameverif = $my_connection->prepare($query);
  $nameverif->bind_param('s', $input);
  $nameverif->execute();
  $nameverif->store_result();
  if ($nameverif->num_rows == 0) {
    $mydisplay = "Error in Username/Email or Password";

  } else if ($nameverif->num_rows == 1) {
    $nameverif->bind_result($input, $pass, $m, $n, $t, $c, $s, $token);
    ($nameverif->fetch());
    if (password_verify($password, $pass)) {
      unset($_SESSION['msg']);
      setcookie('user', "$token", time() + (86400 * 30), "/");
      header("refresh:1;url=/UrGymBro-main/html/hompage_connected.php");
      //header("Location:/UrGymBro-main/html/homepage.php:3");
      exit();
      // $mydisplay= "<div class='subtitle'>Welcome back</div>";
    } else
      $mydisplay = "Error in Username/Email or Password";


  }
  $nameverif = $my_connection->prepare($query2);
  $nameverif->bind_param('s', $input);
  $nameverif->execute();
  $nameverif->store_result();
  if ($nameverif->num_rows == 0) {
    $mydisplay = "Error in Username/Email or Password";

  } else if ($nameverif->num_rows == 1) {
    $nameverif->bind_result($input, $pass, $m, $n, $t, $c, $s, $token);
    ($nameverif->fetch());
    if (password_verify($password, $pass)) {
      unset($_SESSION['msg']);
      setcookie('user', "$token", time() + (86400 * 30), "/");
      if (!isset($_SESSION['page'])) {

          header("refresh:1;url=/UrGymBro-main/html/hompage_connected.php");
          exit();
      } else {
        header("refresh:1;url=/UrGymBro-main/html/Profile.php");
        unset($_SESSION['page']);
        exit();
      }
      //header("Location:/UrGymBro-main/html/homepage.php:3");
      exit();
      // $mydisplay= "<div class='subtitle'>Welcome back</div>";
    } else
      $mydisplay = "Error in Username/Email or Password";


  }
  //header("Location:/UrGymBro-main/html/Login_Page_webdev.php");
  $_SESSION["msg"] = $mydisplay;
  header("Location: /UrGymBro-main/html/Login_Page_webdev.php");
}

echo "
<script>
  mydiv=document.getElementById('kk');
  mydiv.innerHTML='" . $_SESSION["msg"] . "';
</script>";
?>