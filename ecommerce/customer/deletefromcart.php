<?php
include_once "../authguard.php";
include "navbar.html";

$cart_id =intval($_POST['cart_id']);


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




// sql to delete a record
$sql = "DELETE FROM cart WHERE cart_id =$cart_id";

if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully";
echo "<script type='text/javascript'>history.go(-1);</script>";
} else {
echo "Error deleting record: " . $conn->error;
}

end_db($conn);
?>