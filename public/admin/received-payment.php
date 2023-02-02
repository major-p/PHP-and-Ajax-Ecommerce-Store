<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();



if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];
	
$sql=mysqli_query($con,"UPDATE received_payment set
status='Payed' WHERE trx_id='$id' ");

 if($sql)
 {
 $msg="Payment Confirmed";
 echo "<script>window.location.href='payments.php';</script>";
 }

 }