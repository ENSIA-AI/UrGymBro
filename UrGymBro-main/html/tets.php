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
$my_products=array();


 @$my_connection=new mysqli('localhost','root','','urgymbro');
 if (mysqli_connect_errno()) 
 {
     echo 'Error: Could not connect to database. Please try again later.';
     exit;
 }
 $query="SELECT * FROM `products`";

 $statement=$my_connection->prepare($query);
 $statement->execute();
 $statement->store_result();
 $statement->bind_result($id,$product_name1,$product_price1,$product_type1,$product_description1,$product_img1,$product_link1);
 while($statement->fetch()){
$myproduct=new product;
$myproduct->product_name=$product_name1;
$myproduct->product_price=$product_price1;
$myproduct->product_type=$product_type1;
$myproduct->product_description=$product_description1;
$myproduct->product_img=$product_img1;
$myproduct->product_link=$product_link1;
$my_products[]=$myproduct;
 }
 print_r($my_products);
  //while($row = $statement->fetch()){

  // add each row returned into an array
 // $array[] = $row;

  // OR just echo the data:
 // echo $row['username']; // etc

//}
?>