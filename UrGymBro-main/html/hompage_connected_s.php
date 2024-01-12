<?php 
session_start();
if(!isset($_SESSION['user'])){
  header( "refresh:1;url=/UrGymBro-main/html/homepage_s.php" );
  exit();
}?>
<!DOCTYPE html>
<html>

<head>
    <title>UrGymBro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../style/homepage.css">
</head>

    <!-- SAME PAGE AS THE ONE ABOVE BUT WITH A DIFFERENT NAVBAR
    AND A DIFFERENT JOIN NOW BUTTON. INSTEAD IT WAS TURNED 
    TO FIND A GYM NOW BUTTON -->

<body>
    <nav>
        <label class="logo"><a href="../html/homepage_s.php"><img src="../images/Property Black.svg" width="100px" /></a></label>
        <button class="menu-button">&#9776;</button>
        <ul class="nav-list" id="navbarList">
            <li class="nav-item"><a id="home" href="#">HOME</a></li>
            <li class="nav-item"><a id="maps" href="../html/maps.php">MAPS
                </a></li>
            <li class="nav-item"><a id="products" href="../html/products_s.php">PRODUCTS</a></li>
            <li class="nav-item"><a id="food" href="../html/Food.php">FOOD</a></li>
            <li class="nav-item"><a id="aboutus" href="../html/About_Us_webdev.php">ABOUT US </a></li>
            <?php
                    @$my_connection=new mysqli('localhost','root','','urgymbro');
                    if (mysqli_connect_errno()) 
                    {
                        $mydisplay= 'Error: Could not connect to database. Please try again later.';
                        
                    }
            $query="SELECT User_id  FROM `users` WHERE `token`=?";
$verif=$my_connection->prepare($query);
$verif->bind_param('s',$_SESSION["user"]);
$verif->execute();
        $verif->store_result();
        if($verif->num_rows==0)
        {
          header( "refresh:1;url=/UrGymBro-main/html/homepage_s.php" );
        }
        else if($verif->num_rows==1){
            $verif->bind_result($username);
             ($verif->fetch());}
           echo '<li class="nav-item"><a id="login" href="../html/Profile_s.php">'.$username."</a></li>";
        ?>
            </ul>
    </nav>

    <div class="Herosection">
        <img class="mainLogo" src="../images/Logo red and gray.svg" width="311" height="120">
        <div class="slogan">
            <p>YOUR GUIDE TO <br>A HEALTHY LIFESTYLE</p>
        </div>
    </div>

    <a href="../html/maps.php" class="joinnowa">
        <button class="joinbutton">
            <span class="jointext">Look for a Gym Now !</span>
        </button>
    </a>

    <!-- BIG ARROW ANNIMATION -->
    <div class="bigArrowContainer" onclick="scrollToNextSection()">
        <img class="bigarrow" src="../images/bigarrow.svg" alt="arrow" width="151px" height="137.6px">
    </div>

    <!-- OUR SERVICES TITLE -->
    <div class="ourServices" id="ourServicesSection">Our Services</div>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <div class="content">
            <div class="arrow"><a class="prev" onclick="plusSlides(-1)">&#10094;</a></div>

            <div class="mySlides fade">
                <img src="../images/maps.jpg" width="370" , height="480">
                <div class="text"><a href="../html/maps.php" class="linka"> Maps </a></div>
            </div>

            <div class="mySlides fade">
                <img src="../images/equipment.jpg" width="370" , height="480">
                <div class="text"><a href="../html/products_s.php" class="linka"> Products </a></div>
            </div>

            <div class="mySlides fade">
                <img src="../images/healthy diet.jpg" width="370" , height="480">
                <div class="text"><a href="../html/food.php" class="linka"> Food </a></div>
            </div>

            <div class="arrow"><a class="next" onclick="plusSlides(1)">&#10095;</a></div>
        </div>
        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

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
                <li><a href="../html/Login_Page_webdev_s.php">Log in</a></li>
                <li><a href="../html/maps.php">Maps</a></li>
                <li><a href="../html/Food.php">Foods</a></li>
                <li><a href="../html/products_s.php">Products</a></li>
              </ul>
            </div>
            <div class="footerCol">
              <h4>Follow Us</h4>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/iheb.meki?igsh=NXR2anYwYjdrY3B4"><i class="fab fa-instagram"></i></a>
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
    

    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/homepageScript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../javascript/go_to_top.js"></script>

</body>


</html>