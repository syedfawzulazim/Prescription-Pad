<?php
session_start();
include_once 'connection.php';

$id=$_GET['aid'];

$sql = "DELETE  from `admin` WHERE adminid =$id";
mysqli_query($conn,$sql);
header('location:a_adminlist.php')
?>
