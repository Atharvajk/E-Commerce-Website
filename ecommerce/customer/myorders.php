<?php
include_once "../authguard.php";
include "navbar.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
    

    

<div style="display: flex;justify-content: space-around; ">

    <ol class="list-group list-group-numbered" style="width: 800px;">
        
        
    

<?php
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

    // session_start();
    $sid="".$_SESSION["uid"];
    $sidint=intval($sid);
    $conn=init_db();

    $str="";
    
$sql = "SELECT order_id,product_name,product_price,product_image_path,order_date,order_status FROM myorder inner join product on myorder.product_id=product.product_id where user_id=$sidint ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    // echo "<br> id: ". $row["user_type"]. " - Name: ". $row["username"]. " " . $row["password"] . "<br>";

    $order_id=$row["order_id"];
    $prodname=$row["product_name"];
    $prodprice=$row["product_price"];
    $imgpath=$row["product_image_path"];
    $order_date=$row["order_date"];
    $order_status=$row["order_status"];
    $date = date("d m Y", strtotime($order_date));

$str=$str."
<li class='list-group-item d-flex justify-content-between align-items-start mb-3'>
<div class='ms-2 me-auto'>
    <div class='fw-bold'><p>$prodname</p></div>
    
    <span style='display: flex;align-items: center;'>
    <p>Order ID:-   </p>
    <p>$order_id</p>
    </span>
    <span style='display: flex;align-items: center;'>
    <p>Order Date:-   </p>
    <p>  $date</p>
    </span>
    <span style='display: flex;align-items: center;'>
    <p>Order Status:-   </p>
    <p>  $order_status</p>
    
    </span>
    
   
   

    </div>
    </form>
    
<span class='badge  rounded-pill' style='display: flex;align-items: center;'>
   <h5  style='color:black;margin-right:40px'>$ $prodprice</h5>
    <img src='$imgpath' class='card-img-top' style='max-height: 100px;object-fit: contain;'>
</span>

</li>
";
}
echo $str;
echo "</ol>
</div>";


}
  
    ?>

</body>

</html>