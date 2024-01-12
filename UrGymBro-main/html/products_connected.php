<?php
session_start();
if (!isset($_COOKIE['user'])) {
  $_SESSION['msg'] = "<div class='subtitle'>You need to have an account in order to save products</div>";
  header("refresh:1;url=/UrGymBro-main/html/Login_Page_webdev.php");
} else {
  @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
  if (mysqli_connect_errno()) {
    $mydisplay = 'Error: Could not connect to database. Please try again later.';

  }
  $query = "SELECT User_id  FROM `users` WHERE `token`=?";
  $verif = $my_connection->prepare($query);
  $verif->bind_param('s', $_COOKIE["user"]);
  $verif->execute();
  $verif->store_result();
  if ($verif->num_rows == 0) {
    $_SESSION['msg'] = "<div class='subtitle'>You need to have an account in order to save products</div>";
    header("refresh:1;url=/UrGymBro-main/html/Login_Page_webdev.php");
  } else if ($verif->num_rows == 1) {
    $verif->bind_result($username);
    ($verif->fetch());
  }
  if (
    !isset($_POST['product_img']) || !isset($_POST['product_name']) || !isset($_POST['product_desc']) || !isset($_POST['product_link'])
  ) {

    // header("Location: /UrGymBro-main/html/Profile.php");
  } else {
    $prod_name = $_POST['product_name'];
    $prod_img = $_POST['product_img'];
    $prod_desc = $_POST['product_desc'];
    $prod_link = $_POST['product_link'];
    $query = "SELECT Product_id,Product_description,Product_img,Product_link FROM `products` WHERE `Product_Name`='$prod_name'";
    $verif = $my_connection->prepare($query);
    //$verif->bind_param('sss',$prod_name,$prod_desc,$prod_img);
    $verif->execute();
    $verif->store_result();
    if ($verif->num_rows == 0) {
      echo "<h1>Item not found</h1>";
      header("refresh:1;url=/UrGymBro-main/html/products_connected.php");
    } else {
      $verif->bind_result($prod_id, $prod_desc1, $prod_img1, $prod_link1);
      while ($verif->fetch()) {
        if ($prod_desc == $prod_desc1 && $prod_img = $prod_img1 && $prod_link == $prod_link1)
          break;
      }
      $query = "INSERT INTO `product_savings` Values(?,?)";
      $verif = $my_connection->prepare($query);
      $verif->bind_param('si', $username, $prod_id);
      try {
        $result = $verif->execute();
      } catch (Exception $e) {
        $_SESSION['alert'] = "product Already saved";
        header("refresh:0;url=/UrGymBro-main/html/products_connected.php");
        exit();
      }

      $_SESSION['alert'] = "product successfully saved";
      header("refresh:0;url=/UrGymBro-main/html/products_connected.php");
      exit();
    }

  }
}
?>















<!DOCTYPE html>
<html>


<head>
  <title>Our Products</title>
  <link rel="stylesheet" href="../style/products.css" />
</head>

<body>
  <!-- MAKE SURE THAT THE ONLY SHOW MORE THAT
  HAS COONTENT IS THE FIRST ONE
  NEED TO ADD .JS FILE TO FETCH DATA FROM THE MAIN 
  HTML AND LATER FROM THE DATABASE (BACKEND) -->

  <nav>
    <label class="logo"><a href="../html/homepage.php"><img src="../images/Property Black.svg"
          width="100px" /></a></label>
    <button class="menu-button">&#9776;</button>
    <ul class="nav-list" id="navbarList">
      <li class="nav-item"><a id="home" href="#">HOME</a></li>
      <li class="nav-item"><a id="maps" href="../html/maps.php">MAPS
        </a></li>
      <li class="nav-item"><a id="products" href="../html/products.php">PRODUCTS</a></li>
      <li class="nav-item"><a id="food" href="../html/Food.php">FOOD</a></li>
      <li class="nav-item"><a id="aboutus" href="../html/About_Us_webdev.php">ABOUT US </a></li>
      <?php
      @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
      if (mysqli_connect_errno()) {
        $mydisplay = 'Error: Could not connect to database. Please try again later.';

      }
      $query = "SELECT User_id  FROM `users` WHERE `token`=?";
      $verif = $my_connection->prepare($query);
      $verif->bind_param('s', $_COOKIE["user"]);
      $verif->execute();
      $verif->store_result();
      if ($verif->num_rows == 0) {
        header("refresh:1;url=/UrGymBro-main/html/homepage.php");
      } else if ($verif->num_rows == 1) {
        $verif->bind_result($username);
        ($verif->fetch());
      }
      echo '<li class="nav-item"><a id="login" href="../html/Profile.php">' . $username . "</a></li>";
      ?>
    </ul>
  </nav>

  <div class="top_div">
    <div class="title">Products</div>
    <div class="subtitle" id="kk">
      An amazing collection of items to enhance your workout !
    </div>

    <div class="filters">
      <div class="filter_text">Filters:</div>
      <div class="type">
        <label for="type_filters">Type of product:</label>
        <select name="type_filters" id="type_filters">
          <option value="0" selected="true">All</option>
          <option value="1">Gym Equipment</option>
          <option value="2">Suplements</option>
        </select>
      </div>

      <div class="price">
        <label for="price_filters">Price of the product:</label>
        <select name="price_filters" id="price_filters">
          <option value="0" selected="true">All</option>
          <option value="1">From 0 to 5000 DA</option>
          <option value="2">From 5001 to 10000 DA</option>
          <option value="3">From 10001 to 15000 DA</option>
        </select>
      </div>
    </div>
  </div>

  <div class="products">
    <!-- ==================================================== HERE STARTS THE CODE OF THE ITEMS ==================================================== -->
    <div class="product" id="product1">
      <img src="../images/dumbell.jpg" id="product1_img" class="product_img" />
      <div class="text">
        <div id="product1_name" class="product_name">Product Name</div>
        <div id="product1_price" class="product_price">Price: 5000 DA</div>
        <div class="product_description" id="product1_description">
          Description here
        </div>
        <input type="hidden" id="product1_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button1" data-product-number="1" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product2">
      <img src="../images/dumbell.jpg" id="product2_img" class="product_img" />
      <div class="text">
        <div id="product2_name" class="product_name">Product Name</div>
        <div class="product_price" id="product2_price">Price: 5000 DA</div>
        <div class="product_description" id="product2_description">
          Description here
        </div>
        <input type="hidden" id="product2_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button2" data-product-number="2" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product3">
      <img src="../images/dumbell.jpg" id="product3_img" class="product_img" />
      <div class="text">
        <div id="product3_name" class="product_name">Product Name</div>
        <div class="product_price" id="product3_price">Price: 5000 DA</div>
        <div class="product_description" id="product3_description">
          Description here
        </div>
        <input type="hidden" id="product3_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button3" data-product-number="3" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product4">
      <img src="../images/dumbell.jpg" id="product4_img" class="product_img" />
      <div class="text">
        <div id="product4_name" class="product_name">Product Name</div>
        <div class="product_price" id="product4_price">Price: 5000 DA</div>
        <div class="product_description" id="product4_description">
          Description here
        </div>
        <input type="hidden" id="product4_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button4" data-product-number="4" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product5">
      <img src="../images/dumbell.jpg" id="product5_img" class="product_img" />
      <div class="text">
        <div id="product5_name" class="product_name">Product Name</div>
        <div class="product_price" id="product5_price">Price: 5000 DA</div>
        <div class="product_description" id="product5_description">
          Description here
        </div>
        <input type="hidden" id="product5_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button5" data-product-number="5" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product6">
      <img src="../images/dumbell.jpg" id="product6_img" class="product_img" />
      <div class="text">
        <div id="product6_name" class="product_name">Product Name</div>
        <div class="product_price" id="product6_price">Price: 5000 DA</div>
        <div class="product_description" id="product6_description">
          Description here
        </div>
        <input type="hidden" id="product6_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button6" data-product-number="6" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product7">
      <img src="../images/dumbell.jpg" id="product7_img" class="product_img" />
      <div class="text">
        <div id="product7_name" class="product_name">Product Name</div>
        <div class="product_price" id="product7_price">Price: 5000 DA</div>
        <div class="product_description" id="product7_description">
          Description here
        </div>
        <input type="hidden" id="product7_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button7" data-product-number="7" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product8">
      <img src="../images/dumbell.jpg" id="product8_img" class="product_img" />
      <div class="text">
        <div id="product8_name" class="product_name">Product Name</div>
        <div class="product_price" id="product8_price">Price: 5000 DA</div>
        <div class="product_description" id="product8_description">
          Description here
        </div>
        <input type="hidden" id="product8_link" name="product_link" value="noimg" />

        <input type="button" class="popup-button" id="popup-button8" data-product-number="   8" value="Show More..." />
      </div>
    </div>

    <div class="product" id="product9">
      <img src="../images/dumbell.jpg" id="product9_img" class="product_img" />
      <div class="text">
        <div id="product9_name" class="product_name">Product Name</div>
        <div class="product_price" id="product9_price">Price: 5000 DA</div>
        <div class="product_description" id="product9_description">
          Description here

        </div>
        <input type="hidden" id="product9_link" name="product_link" value="noimg" />
        <input type="button" class="popup-button" id="popup-button9" data-product-number="9" value="Show More..." />
      </div>
    </div>
  </div>

  <!-- ==================================================== HERE ENDS THE CODE OF THE ITEMS ==================================================== -->

  <!-- ==================================================== HERE STARTS THE CODE OF THE POPUPS ==================================================== -->

  <div class="popup" id="popup1">
    <div class="popup-content">
      <form method="post" action="#">
        <img src="../images/dumbell.jpg" id="product1_img" class="product_img" />
        <input type="hidden" id="product11_img" name="product_img" value="noimg" />
        <span class="close-btn" onclick="hidePopup()">&times;</span>
        <div class="text">

          <div id="product1_name" class="product_name">Product Name</div>
          <input type="hidden" id="product11_name" name="product_name" value="iheb" />
          <div id="product1_price" class="product_price">Price: 5000 DA</div>

          <div class="product_description" id="product1_description">
            Description here
          </div>
          <input type="hidden" id="product11_desc" name="product_desc" value="nothing here" />
          <div class="get-it-from-title">Get it from</div>
          <div class="link">
            <a class="links" href="https://www.hammer-fitness.at/at-en/hammer-kurzhantel-set-40kg-eisen.php">Iheb
              Boutique</a>
          </div>
          <input type="hidden" id="product11_link" name="product_link" value="iheb" />
          <div class="button-container">
            <input type="submit" class="popup-button" id="popup1-button1" data-product-number="1"
              value="Add to Savings" />
      </form>
    </div>
  </div>
  </div>
  </div>
  <!-- ==================================================== HERE ENDS THE CODE OF THE POPUPS ==================================================== -->

  <div class="product_navigation">
    <input type="button" class="nav" id="nav1" value="1" />
    <input type="button" class="nav" id="nav2" value="2" />
    <input type="button" class="nav" id="nav3" value="3" />
  </div>

  <footer>
    <div class="containerFooter">
      <div class="rowFooter">
        <div class="footerCol">
          <h4>UrGymBro</h4>
          <p>
            A website dedicated to helping you become your Best Form while
            providing you with the Right Diet, Products and even finding the
            Right Gym for you!
          </p>
        </div>
        <div class="footerCol">
          <h4>Useful links</h4>
          <ul>
            <li><a href="#">Log in</a></li>
            <li><a href="../html/maps.php">Maps</a></li>
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
              <input type="text" name="email" id="email" />
            </div>
          </div>
          <div class="wrapper">
            <div class="input-data">
              <label class="input_field" for="name">Message</label>
              <textarea name="Message" id="message" cols="pixel_to" rows="5"></textarea>
            </div>
          </div>
          <div class="submit">
            <input type="submit" id="submit" name="submit" value="Submit" />
          </div>
        </div>
      </div>
    </div>
    <div class="cr-con">Copyright &copy; 2023 | Made by UrGymBro TEAM</div>
  </footer>
</body>
<script src="../javascript/products.js"></script>
<script src="../javascript/navbar.js"></script>
<?php
class product
{
  public $product_name;
  public $product_price;
  public $product_type;
  public $product_description;
  public $product_img;
  public $product_link;
}
$my_products = array();


@$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database. Please try again later.';
  exit;
}
$query = "SELECT * FROM `products`";

$statement = $my_connection->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($id, $product_name1, $product_price1, $product_type1, $product_description1, $product_img1, $product_link1);
while ($statement->fetch()) {
  $myproduct = new product;
  $myproduct->product_name = $product_name1;
  $myproduct->product_price = $product_price1;
  $myproduct->product_type = $product_type1;
  $myproduct->product_description = $product_description1;
  $myproduct->product_img = $product_img1;
  $myproduct->product_link = $product_link1;
  $my_products[] = $myproduct;
}
$jsObject = json_encode($my_products);
// print_r($my_products);
//while($row = $statement->fetch()){

// add each row returned into an array
// $array[] = $row;

// OR just echo the data:
// echo $row['username']; // etc

//}
?>
<script>
  var my_products = <?php echo $jsObject; ?>;
  var cheap = [];
  var average = [];
  var expensive = [];

  var e_cheap = [];
  var e_average = [];
  var e_expensive = [];
  var s_cheap = [];
  var s_average = [];
  var s_expensive = [];
  var i = 0;
  while (i < my_products.length) {
    if (my_products[i].product_type == "equipment") {
      if (my_products[i].product_price <= 5000) {
        cheap.push(my_products[i]);
        e_cheap.push(my_products[i]);
        i++;
      } else if (my_products[i].product_price <= 10000) {
        e_average.push(my_products[i]);
        average.push(my_products[i]);
        i++;
      } else {
        e_expensive.push(my_products[i]);
        expensive.push(my_products[i]);
        i++;
      }
    } else {
      if (my_products[i].product_price <= 5000) {
        s_cheap.push(my_products[i]);
        cheap.push(my_products[i]);
        i++;
      } else if (my_products[i].product_price <= 10000) {
        s_average.push(my_products[i]);
        average.push(my_products[i]);
        i++;
      } else {
        s_expensive.push(my_products[i]);
        expensive.push(my_products[i]);
        i++;
      }
    }
  } document.addEventListener("DOMContentLoaded", function () { update_display(my_products, 1); });
  window.onload = hide_display(my_products, 1);
  var eq = e_cheap.concat(e_average).concat(e_expensive);
  var e = [eq, e_cheap, e_average, e_expensive];
  var sq = s_cheap.concat(s_average).concat(s_expensive);
  var s = [sq, s_cheap, s_average, s_expensive];
  var a = [my_products, cheap, average, expensive];
  var array = [a, e, s];
  function update_display(my_products, page) {
    if (my_products.length >= 9 * page) {
      i = 9 * (page - 1);
      k = 1;
      while (i < 9 * page) {

        let pn = document.getElementById("product" + (k) + "_name");
        pn.innerHTML = my_products[i].product_name;

        let pp = document.getElementById("product" + (k) + "_price");
        pp.innerHTML = "PRICE: " + my_products[i].product_price;

        let pl = document.getElementById("product" + (k) + "_link");
        pl.value = my_products[i].product_link;
        let pi = document.getElementById("product" + (k) + "_img");
        pi.src = my_products[i].product_img;
        let p = document.getElementById("product" + (k));
        let pd = document.getElementById("product" + (k) + "_description");
        pd.innerHTML = "Description: " + my_products[i].product_description;
        k++;
        i++;
      }
    } else {
      i = 9 * (page - 1);
      while (i < my_products.length) {
        let p = document.getElementById("product" + ((i % 9) + 1));
        let pd = document.getElementById(
          "product" + ((i % 9) + 1) + "_description"
        );
        pd.innerHTML = my_products[i].product_description;

        let pl = document.getElementById("product" + ((i % 9) + 1) + "_link");
        pl.value = my_products[i].product_link;

        let pn = document.getElementById("product" + ((i % 9) + 1) + "_name");
        pn.innerHTML = my_products[i].product_name;

        let pp = document.getElementById("product" + ((i % 9) + 1) + "_price");
        pp.innerHTML = "PRICE: " + my_products[i].product_price;

        let pi = document.getElementById("product" + ((i % 9) + 1) + "_img");
        pi.src = my_products[i].product_img;
        console.log(pi.src);
        i++;
      }
    }
  }

  function hide_display(my_products, page) {
    if (my_products.length < page * 9) {
      var k = my_products.length;

      while (k < 9 * page) {
        let product = document.getElementById("product" + ((k % 9) + 1));

        product.style.display = "none";
        k++;
      }
    }
  }
  function restore_display() {
    let count = 1;
    while (count < 10) {
      let product = document.getElementById("product" + count);

      product.style.display = "block";
      count++;
    }
  }

  price_ = document.getElementById("price_filters");
  type_ = document.getElementById("type_filters");
  type_.addEventListener("click", function () {
    restore_display();
    update_display(array[parseInt(type_.value)][eval(price_.value)], 1);
    hide_display(array[parseInt(type_.value)][eval(price_.value)], 1);
  });
  price_.addEventListener("click", function () {
    restore_display();
    update_display(array[parseInt(type_.value)][eval(price_.value)], 1);
    hide_display(array[parseInt(type_.value)][eval(price_.value)], 1);
  });
  price_ = document.getElementById("price_filters");
  button1 = document.getElementById("nav1");
  button2 = document.getElementById("nav2");
  button3 = document.getElementById("nav3");

  button1.addEventListener("click", function () {
    window.scrollTo(0, 0);
    updatebutton1();
  });

  button2.addEventListener("click", function () {
    updatebutton2();
  });
  button3.addEventListener("click", function () {
    window.scrollTo(0, 0);
    restore_display();
    update_display(
      array[parseInt(type_.value)][eval(price_.value)],
      button3.value
    );
    hide_display(array[eval(type_.value)][eval(price_.value)], button3.value);
    updatebutton3();
  });
  var my_page = 1;
  function updatebutton1() {
    window.scrollTo(0, 0);
    restore_display();

    update_display(
      array[parseInt(type_.value)][eval(price_.value)], button1.value);
    hide_display(array[eval(type_.value)][eval(price_.value)], button1.value);
    if (eval(button1.value) > 1) {

      button1.value = button1.value - 1;
      button2.value = button2.value - 1;
      button3.value = button3.value - 1;
    }
    else {
      button1.style.backgroundColor = "#676666";
      button2.style.backgroundColor = "#cbcbcb";
    }


  }
  function updatebutton2() {
    if (eval(button1.value) == 1) {
      window.scrollTo(0, 0);
      restore_display();
      update_display(array[parseInt(type_.value)][eval(price_.value)], 2);
      hide_display(array[eval(type_.value)][eval(price_.value)], 2);
      button2.style.backgroundColor = "#676666";
      button1.style.backgroundColor = "#cbcbcb";

    } else return;
  }
  function updatebutton3() {
    button1.value = eval(button1.value) + 1;
    button2.value = eval(button2.value) + 1;
    button3.value = eval(button3.value) + 1;
    button2.style.backgroundColor = "#676666";
    button1.style.backgroundColor = "#cbcbcb";
  }

  window.addEventListener('load', function () {
    button1.style.backgroundColor = "#676666";
  })



  var savings = document.getElementById("popup1-button1");
</script>
<script src="../javascript/text-limit.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<script src="../javascript/go_to_top.js"></script>

</html>

<?php
if (isset($_SESSION['alert'])) {
  echo "
<script>
  mydiv=document.getElementById('kk');
  mydiv.innerHTML='" . $_SESSION["alert"] . "';
</script>";
  unset($_SESSION['alert']);
}
?>