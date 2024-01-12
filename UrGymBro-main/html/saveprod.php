
<?php
session_start();
  if(!isset($_COOKIE['user'])){
    $_SESSION['msg']= "<div class='subtitle'>You need to have an account in order to save products</div>";
    header( "refresh:1;url=/UrGymBro-main/html/Login_Page_webdev.php" );
  }
  else{
    @$my_connection=new mysqli('localhost','root','','urgymbro');
    if (mysqli_connect_errno()) 
    {
        $mydisplay= 'Error: Could not connect to database. Please try again later.';
        
    }
$query="SELECT User_id  FROM `users` WHERE `token`=?";
$verif=$my_connection->prepare($query);
$verif->bind_param('s',$_COOKIE["user"]);
$verif->execute();
$verif->store_result();
if($verif->num_rows==0)
{
  $_SESSION['msg']= "<div class='subtitle'>You need to have an account in order to save products</div>";
  header( "refresh:1;url=/UrGymBro-main/html/Login_Page_webdev.php" );
}
else if($verif->num_rows==1){
$verif->bind_result($username);
($verif->fetch());}
$prod_name=$_POST['product_name'];
$prod_img=$_POST['product_img'];
$prod_desc=$_POST['product_desc'];
$prod_link=$_POST['product_link'];
$query="SELECT Product_id,Product_description,Product_img,Product_link FROM `products` WHERE `Product_Name`='$prod_name'";
$verif=$my_connection->prepare($query);
//$verif->bind_param('sss',$prod_name,$prod_desc,$prod_img);
$verif->execute();
$verif->store_result();
if($verif->num_rows==0)
{ 
 echo"<h1>Item not found</h1>";
 header( "refresh:1;url=/UrGymBro-main/html/products.php" );
}
else {
    $verif->bind_result($prod_id,$prod_desc1,$prod_img1,$prod_link1);
while($verif->fetch()){
    if($prod_desc==$prod_desc1 && $prod_img=$prod_img1 &&$prod_link==$prod_link1)
    break;
}
$query="INSERT INTO `product_savings` Values(?,?)";
$verif=$my_connection->prepare($query);
$verif->bind_param('si',$username,$prod_id);
try {
$result=$verif->execute();
 } catch (Exception $e) {
    $_SESSION['alert']="product Already saved";
    header( "refresh:0;url=/UrGymBro-main/html/products.php" );
    exit();
 }

    $_SESSION['alert']="product successfully saved";
    header( "refresh:0;url=/UrGymBro-main/html/products.php" );
}


}
  ?>