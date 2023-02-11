<?php
 $hostName = "localhost";
 $userName = "root";
 $passWord = "root123456";
 $dbName = "clothdb";
 $conn = mysqli_connect($hostName, $userName, $passWord, $dbName);
 if(mysqli_connect_error()){
 echo "Connect falied : " .mysqli_connect_error();
 }else{
 //echo "Connect Successfully." ;
 }
?>
