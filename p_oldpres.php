<?php
session_start();
include_once 'connection.php';
$userid = $_SESSION['phone'];
?>

<?php


 if (isset($_POST['submit'])) {



   $dname = mysqli_real_escape_string($conn,$_POST ['dname']);
   $file= $_FILES['ppic'];

   $filename = $_FILES['ppic']['name'];
   $tempname = $_FILES['ppic']['tmp_name'];

   $fileExt = explode('.',$filename);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg', 'jpeg', 'png');

   if (in_array($fileActualExt,$allowed)) {
     $filenameNew = uniqid('',true).".".$fileActualExt;
   }
   else {
       echo '<script type="text/javascript"> alert("Can not add this type of file")</script>';
   }

   $folder='presimg/'.$filenameNew;
   move_uploaded_file($tempname,$folder);



     $query="INSERT INTO `old_prescription`(`PatientID`,`DoctorName`,`ImageP`)
     VALUES ('$userid','$dname','$folder')";

     $query_run = mysqli_query($conn, $query);
     if ($query_run) {
       echo '<script type="text/javascript"> alert("Prescription Successfully Added")</script>';



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
    <title>Old Prescription</title>
  </head>
  <body>
    <?php
    if ($_SESSION['userid']==true) {
    ?>
    <?php include_once 'pheader.php'; ?>

    <div class="container">

   <form class="" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">

     <h3>Add Your Old Prescriptions</h3>
     <label for="report">Doctor Name :</label>
     <input type="text" name="dname" value="" required> <br>

     <label for="report">Your Prescription :</label>
     <input type="file" name="ppic" value="" required> <br>

     <button type="submit" name="submit">Add Prescription</button>
     <input type="reset">


   </form>

 </div>



 <hr style="border-top: 2px red solid;">

 <?php
   $sql = "SELECT * FROM `old_prescription` WHERE PatientID = '$userid'";
   $result = mysqli_query($conn, $sql);
    ?>

   <table id= "doctors"  align="center" border="1px" style="width:1200px; line-height:50px;" >

        <tr>
              <h1 style="background-color:#483D8B; color:white">Old Prescription List</h1>
        </tr>

        <t>
          <th>Doctor Name</th>
          <th>Old Prescription ID</th>
          <th>Prescription</th>
          <th>Delete</th>



        </t>

        <?php

              while ($rows = mysqli_fetch_assoc($result))


              {
         ?>

             <tr>

                   <td> <?php echo $rows['DoctorName'];      ?> </td>
                   <td> <?php echo $rows['OldPrescriptionID'];          ?> </td>

                   <td> <a href="oldprespic.php?id= <?php echo $rows['ImageP']?>&opid= <?php echo $rows['OldPrescriptionID']?>&dname= <?php echo $rows['DoctorName'];?>"> <?php echo  "<img src='".$rows['ImageP']."' height='80' width='80' />";             ?></a> </td>
                     <td> <a href="p_delete.php?id= <?php echo $rows['OldPrescriptionID']; ?>">Delete  </a></td>
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
