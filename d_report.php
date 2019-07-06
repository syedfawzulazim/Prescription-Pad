<?php
  session_start();
  include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="d_report.css">
    <title></title>
  </head>






  <body>
    <?php if ($_SESSION['doctorid'])
        {
       include_once 'dheader.php';
       ?>


       <div class="container">

         <form class="" action="" method="post">
           <h3>Search For Reports:</h3>
           <label for="patientid">Patient ID</label>
           <input type="text" maxlength="50" name="pid"  required>
           <label for="patientid">Prescription ID</label>
           <input type="text" name="presid" required>

           <button type="submit" name="submit">Search</button>
           <input type="reset" name="" value="Reset">

         </form>


       </div>





              <?php



               if (isset($_POST['submit'])) {

                 $pid = mysqli_real_escape_string($conn,$_POST ['pid']);
                 $presid = mysqli_real_escape_string($conn,$_POST ['presid']);

                $sql = "SELECT * FROM `report` WHERE PatientID = '$pid' AND PrescriptionID = '$presid'";
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



                     </t>

                     <?php

                           while ($rows = mysqli_fetch_assoc($result))


                           {
                      ?>

                          <tr>

                                <td> <?php echo $rows['PrescriptionID'];      ?> </td>
                                <td> <?php echo $rows['ReportID'];          ?> </td>

                                <td> <a href="d_reportpic.php?id= <?php echo $rows['ImageR']?>&pid= <?php echo $rows['PrescriptionID']?>&rid= <?php echo $rows['ReportID'];?>"> <?php echo  "<img src='".$rows['ImageR']."' height='80' width='80' />";             ?></a> </td>

                          </tr>


                        <?php
                            }
                        ?>

                </table>



<?php }
}

else {
  header('location:index.php');
} ?>

  </body>
</html>
