<?php
session_start();
include_once 'connection.php';

$id=$_GET['id'];

$sql = "DELETE  from `old_prescription` WHERE OldPrescriptionID =$id";
mysqli_query($conn,$sql);
header('location:p_oldpres.php')




 ?>
