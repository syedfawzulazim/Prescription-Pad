<?php
session_start();
include_once 'connection.php';

$id=$_GET['pid'];

$sql = "DELETE  from `pharmacy` WHERE PharmacyID =$id";
mysqli_query($conn,$sql);
header('location:a_pharmacylist.php')




 ?>
