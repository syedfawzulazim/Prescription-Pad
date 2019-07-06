<?php
  session_start();
  include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Patient</title>
    <link rel="stylesheet" type="text/css" href="d_report.css">
  </head>

<style media="">

.container1{

   background-color: lightgrey;
   width: 800px;
   border: 15px solid black;
   padding: 25px;
   margin: 10px;
   border-radius: 25px;
}

h3{
  color:
}
</style>



  <body>
    <?php if ($_SESSION['doctorid'])
        {
       include_once 'dheader.php';
       ?>

<div class="container">

  <form class="" action="" method="post">
    <h3>Search For Old Prescription:</h3>
    <label for="patientid">Patient ID</label>
    <input type="text" maxlength="50" name="pid"  required>
    <label for="patientid">Old Prescription ID</label>
    <input type="text" name="presid" required>

    <button type="submit" name="submit">Search</button>
    <input type="reset" name="" value="Reset">

  </form>


</div>





       <?php

       if (isset($_POST['submit'])) {

        $pid = mysqli_real_escape_string($conn, $_POST ['pid']);
        $presid = mysqli_real_escape_string($conn, $_POST ['presid']);

        $sql = "SELECT * from `old_prescription` WHERE PatientID = '$pid' AND OldPrescriptionID = '$presid' ";
        $result = mysqli_query($conn,$sql);

       ?>

       <hr style="border-top: 2px red solid;">



         <table id= "doctors"  align="center" border="1px" style="width:1200px; line-height:50px;" >

              <tr>
                    <h1 style="background-color:#483D8B; color:white">Old Prescription List</h1>
              </tr>

              <t>
                <th>Doctor Name</th>
                <th>Old Prescription ID</th>
                <th>Prescription</th>




              </t>

              <?php

                    while ($rows = mysqli_fetch_assoc($result))


                    {
               ?>

                   <tr>

                         <td> <?php echo $rows['DoctorName'];      ?> </td>
                         <td> <?php echo $rows['OldPrescriptionID'];          ?> </td>

                         <td> <a href="d_oldprespic.php?id= <?php echo $rows['ImageP']?>&opid= <?php echo $rows['OldPrescriptionID']?>&dname= <?php echo $rows['DoctorName'];?>"> <?php echo  "<img src='".$rows['ImageP']."' height='80' width='80' />";             ?></a> </td>



                 <?php
                     }
                 ?>

         </table>




       <?php
       }

       ?>








<?php }
else {
  header('location:index.php');
} ?>

  </body>
</html>
