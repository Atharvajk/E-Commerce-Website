<?php
include_once "../authguard.php";
include "navbar.html";

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

$sid="".$_SESSION["uid"];
$sidint=intval($sid);
$conn=init_db();

//INSERT INTO Customers (CustomerName, City, Country) SELECT SupplierName, City, Country FROM Suppliers;
// sql to delete a record
$sql = "insert into myorder(product_id,user_id) select product_id,user_id from cart where user_id=$sidint" ;

if ($conn->query($sql) === TRUE) {
echo "Ordered!";
echo "<script type='text/javascript'>alert('Ordered!');history.go(-1);</script>";
} else {
echo "Error deleting record: " . $conn->error;
}



end_db($conn);

?>