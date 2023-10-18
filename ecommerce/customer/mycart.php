<?php
include_once "../authguard.php";
include "navbar.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $totalprice=0;
$sql = "SELECT cart_id,cart.product_id,product_name,product_desc,product_price,product_image_path FROM cart inner join product on cart.product_id=product.product_id where user_id=$sidint ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    // echo "<br> id: ". $row["user_type"]. " - Name: ". $row["username"]. " " . $row["password"] . "<br>";

    $pid=$row["product_id"];
    $prodname=$row["product_name"];
    $proddesc=$row["product_desc"];
    $prodprice=$row["product_price"];
    $cart_id=$row["cart_id"];
$imgpath=$row["product_image_path"];
$totalprice+=$prodprice;
     $str=$str."
     <li class='list-group-item d-flex justify-content-between align-items-start mb-3'>
     <div class='ms-2 me-auto'>
         <div class='fw-bold'>$prodname</div>
        <p>$proddesc</p>
        <form action='deletefromcart.php' method='post'>
        <input type='hidden' name='cart_id' value='$cart_id'>

        <button  class='btn btn-warning' onclick='submit'>Remove</button>
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
echo "
<div style='display: flex;background-color: #bebeff;justify-content: space-around;
            position: absolute;
    bottom: 0px;
    width: 100%;
    padding: 13px;'>
            <span style='display: flex;    '> <h3>Total :- $ </h3>
            <h3>$totalprice</h3>
        </span>
        <button  class='btn btn-primary' onclick='buynow()'>Buy Now</button>
    </div>
";

}
  
    ?>

</body>
<script>
    function buynow(){
        if(confirm("Do you want to buy all \n Products in your cart\?")==true){
            window.location=`buyfromcart.php`;
        }
    }
</script>
</html>