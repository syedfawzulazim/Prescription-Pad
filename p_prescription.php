<?php
session_start();
include_once 'connection.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="p_report.css">
    <title>Prescription</title>
  </head>
  <body>
    <?php
    if ($_SESSION['userid']==true) {
    ?>
    <?php include_once 'pheader.php';
    $userid = $_SESSION['userid'];
    ?>


<?php
    $sql = "SELECT * from `prescription` WHERE PatientID = $userid ";
    $result = mysqli_query($conn,$sql);

    ?>


    <table id= "doctors"  align="center" border="1px" style="width:1200px; line-height:50px;" >

         <tr>
               <h1 style="background-color:#483D8B; color:white">Prescription List</h1>
         </tr>

         <t>
           <th>Prescription ID</th>
           <th>Doctor Name</th>
           <th>Date</th>
           <th>View</th>



         </t>

         <?php

               while ($rows = mysqli_fetch_assoc($result))


               {
          ?>

              <tr>

                    <td> <?php echo $rows['PrescriptionID'];      ?> </td>
                    <td> <?php echo $rows['DoctorName'];      ?> </td>
                    <td> <?php echo $rows['Date'];          ?> </td>
                    <td> <a href="p_prescriptions.php?id= <?php echo $rows['PrescriptionID']?>">Show Details</a> </td>

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
