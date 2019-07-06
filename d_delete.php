<?php
session_start();
include_once 'connection.php';

$id=$_GET['id'];

$sql = "DELETE  from `doctorslist` WHERE DoctorID =$id";
mysqli_query($conn,$sql);
header('location:a_doclist.php')




 ?>
