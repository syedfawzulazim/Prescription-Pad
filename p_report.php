<?php
session_start();
include_once 'connection.php';
$userid = $_SESSION['phone'];
?>

<?php


 if (isset($_POST['submit'])) {



   $pid = mysqli_real_escape_string($conn,$_POST ['pid']);
   $file= $_FILES['rpic'];

   $filename = $_FILES['rpic']['name'];
   $tempname = $_FILES['rpic']['tmp_name'];

   $fileExt = explode('.',$filename);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg', 'jpeg', 'png');

   if (in_array($fileActualExt,$allowed)) {
     $filenameNew = uniqid('',true).".".$fileActualExt;
   }
   else {
       echo '<script type="text/javascript"> alert("Can not add this type of file")</script>';
   }

   $folder='rimg/'.$filenameNew;
   move_uploaded_file($tempname,$folder);



     $query="INSERT INTO `report`(`PatientID`, `PrescriptionID`, `ImageR`)
     VALUES ('$userid','$pid','$folder')";

     $query_run = mysqli_query($conn, $query);
     if ($query_run) {
       echo '<script type="text/javascript"> alert("Report Successfully Added")</script>';



     }
     else {
       echo '<script type="text/javascript"> alert("Error")</script>';
       return false;

     }
   }


  ?>

</style>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="p_report.css">
    <title>Report</title>
  </head>
  <body>
    <?php
    if ($_SESSION['userid']==true) {
    ?>
    <?php include_once 'pheader.php'; ?>

    <div class="container">

   <form class="" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">

     <h3>Add Your Reports</h3>
     <label for="report">Prescription ID :</label>
     <input type="text" maxlength="10" name="pid" value="" required> <br>

     <label for="report">Your Report :</label>
     <input type="file" name="rpic" value="" required> <br>

     <button type="submit" name="submit">Add Report</button>
     <input type="reset">


   </form>

 </div>



 <hr style="border-top: 2px red solid;">

 <?php
   $sql = "SELECT * FROM `report` WHERE PatientID = '$userid'";
   $result = mysqli_query($conn, $sql);
    ?>

   <table id= "doctors"  align="center" border="1px" style="width:1200px; line-height:50px;" >

        <tr>
              <h1 style="background-color:#483D8B; color:white">Report List</h1>
        </tr>

        <t>
          <th>Prescription ID</th>
          <th>Report ID</th>
          <th>Report</th>
          <th>Delete</th>



        </t>

        <?php

              while ($rows = mysqli_fetch_assoc($result))


              {
         ?>

             <tr>

                   <td> <?php echo $rows['PrescriptionID'];      ?> </td>
                   <td> <?php echo $rows['ReportID'];          ?> </td>

                   <td> <a href="reportpic.php?id= <?php echo $rows['ImageR']?>&pid= <?php echo $rows['PrescriptionID']?>&rid= <?php echo $rows['ReportID'];?>"> <?php echo  "<img src='".$rows['ImageR']."' height='80' width='80' />";             ?></a> </td>
                     <td> <a href="r_delete.php?id= <?php echo $rows['ReportID']; ?>">Delete  </a></td>
             </tr>


           <?php
               }
           ?>

   </table>



   <?php
  }


   else {
     header('location:index.php');
   }
   ?>
  </body>
</html>
