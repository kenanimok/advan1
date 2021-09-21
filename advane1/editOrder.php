<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $o_id = $_GET['o_id'];
 $order_status = $_GET['order_status']; 
 $sql = "Update orders SET order_status = '$order_status' WHERE o_id = $o_id";
 $rs = mysqli_query($conn, $sql);
 if($rs){
 echo"<script>alert('Update Successful'); window.location='ordersManagement.php';</script>";
 exit();
 }else{ echo"<script>alert('Can not Update'); window.location='ordersManagement.php';</script>";
 exit(); }
?>