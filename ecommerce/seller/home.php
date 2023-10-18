<?php
include_once "../authguard.php";
include "navbar.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>My Products</h1>
    <div style="display:flex;flex-wrap: wrap;
    justify-content: space-around;">
    

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
function delete_prod($pid){

}
    // session_start();
    $sid="".$_SESSION["uid"];
    $sidint=intval($sid);
    $conn=init_db();

    $str="";
$sql = "SELECT * FROM product where seller_id=$sidint";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    // echo "<br> id: ". $row["user_type"]. " - Name: ". $row["username"]. " " . $row["password"] . "<br>";

$imgpath=$row["product_image_path"];
$pid=$row["product_id"];
$prodname=$row["product_name"];
$prodprice=$row["product_price"];
$proddesc=$row["product_desc"];
     $str=$str."
     <div class='card m-3' style='width: 18rem;'>
     <center>
     <img src='$imgpath' class='card-img-top' style='max-height: 200px;object-fit: contain;'>
     <div class='card-body'>
     <h5 class='card-title'>$prodname</h5>
     <p class='card-text'>$proddesc</p>
     <h6 class='card-title'>$$prodprice</h6>
     <form action='deleteproduct.php' method='post'>
     <input type='hidden' name='pid' value='$pid'>
     <input type='hidden' name='pname' value='$prodname'>
     
     <button  class='btn btn-danger' onclick='submit'>Delete</button>
     </form>
     </div>
     </center>
     </div>";
}
echo $str;
}else{
    echo "<div style='display:flex;flex-wrap: nowrap;
    justify-content: space-evenly;
    flex-direction: column;
    
    align-items: flex-start;'><p>You haven't listed any products ! </p>
    
    <a href='addproduct.php'>Add Products</a>
    </div>";
    
}
    // for($i=0;$i<50;$i++){
    //     echo '
    //     <div class="card m-3" style="width: 18rem;">
    //     <img src="..." class="card-img-top" alt="...">
    //     <div class="card-body">
    //     <h5 class="card-title">Card title</h5>
    //     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    //     <a href="#" class="btn btn-primary">Go somewhere</a>
    //     </div>
    //     </div>';
    // }
    ?>
    </div>
</body>
</html>