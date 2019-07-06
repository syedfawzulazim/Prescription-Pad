<?php
session_start();
include_once 'connection.php';

$id=$_GET['id'];

$sql = "DELETE  from `report` WHERE ReportID =$id";
mysqli_query($conn,$sql);
header('location:p_report.php')




 ?>
