<?php
session_start();
if($_SESSION['loginstatus']==true){

    // echo $_POST['pid'];
    $order_id =intval($_POST['order_id']);
    $status =$_POST['status'];
    
    
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
$sql = "update myorder set order_status ='$status' where order_id=$order_id ";

if ($conn->query($sql) === TRUE) {
  echo "Stautus Updated successfully";
  echo "<script type='text/javascript'> alert('Status Updated successfully!');history.go(-1);</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

end_db($conn);

}else{
    echo "You are not Authorized!";
}

?>