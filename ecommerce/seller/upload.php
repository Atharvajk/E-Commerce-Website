<?php
session_start();
// print_r($_POST);
// echo "<br>";
// print_r($_FILES);
// echo "<br>";
// $nn=$_SESSION["loginstatus"];
// echo "ID is  ".$_SESSION["uid"];
// $imgname=$_FILES['imgfile']['name'];
$destpath="../product_images/".$_FILES['imgfile']['name'];
move_uploaded_file($_FILES['imgfile']['tmp_name'],$destpath);

$sid="".$_SESSION["uid"];
$name=$_POST["tittle"];
$desc=$_POST["desc"];
$price=$_POST["price"];

 $conn = new mysqli("localhost","root","","acemegrade_ecomerce");

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


    $sql = "INSERT INTO product(seller_id, product_name, product_desc, product_price, product_image_path) VALUES ($sid,'$name','$desc',$price,'$destpath')";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('Product Added!');history.go(-1);</script>";
  
//   header("Location: /acmegrade_ecommerce/index.html");



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>