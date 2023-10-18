<?php
session_start();
$_SESSION['loginstatus']=false;
$_SESSION['username']="";
$_SESSION['uid']="";
$_SESSION['type']="";
header("Location: /acmegrade_ecommerce/index.html");
?>