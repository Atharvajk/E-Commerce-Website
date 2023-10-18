<?php
include_once "../authguard.php";
include "navbar.html";

$pid =intval($_POST['pid']);
$pname =$_POST['pname'];
$userid="".$_SESSION['uid'];
$uid=intval($userid);
    echo $pid.$pname.$uid;
    
    function init_db(){
        $conn = new mysqli("localhost","root","","acemegrade_ecomerce");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        return $conn;
    }
    function end_db($conn){
        $conn->close();
    }
    function delete_prod($pid){
        
    }
    
    $conn=init_db();
    
    $sql = "INSERT INTO cart(user_id,product_id) VALUES ($uid,$pid)";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('Product Added to Cart!');history.go(-1);</script>";
  
//   header("Location: /acmegrade_ecommerce/index.html");



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
end_db($conn);



?>