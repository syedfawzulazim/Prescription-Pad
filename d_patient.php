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
    <link rel="stylesheet" type="text/css" href="d_patient.css">
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
    <h3>Search For Prescription:</h3>
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

        $pid = mysqli_real_escape_string($conn, $_POST ['pid']);
        $presid = mysqli_real_escape_string($conn, $_POST ['presid']);

        $sql = "SELECT * from `prescription` WHERE PatientID = '$pid' AND PrescriptionID = '$presid' ";
        $result = mysqli_query($conn,$sql);
        while ($rows = mysqli_fetch_assoc($result)){
       ?>

<div class="col-md-9" style="left:300px;">
  <div class="widget">

    <div class="row">




        <div class="col-md-9 margin-top-20">
          <div class="card bg-warning text-black">


              <h2 class="text-center">Prescription</h2>


            <div class="card-body" style="width:500px;">
              <h5 class="card-title"></h5>
              <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item list-group-item-danger" style="color:black;"><h4> <b>Doctor Name :</b> <?php echo $rows['DoctorName'];?>     <br><b>Date : </b><?php echo $rows['Date'];?> <br><b>Validity : </b><?php echo $rows['Validity'];?></h4></li>
              <li class="list-group-item list-group-item-danger"><h4> <b>Patient ID :</b> <?php echo $rows['PatientID'];?> <b>Prescription ID :</b> <?php echo $rows['PrescriptionID'];?> </h4></li>
              <li class="list-group-item list-group-item-warning"><b>Disease : </b><br>  <?php echo $rows['Disease'];?></li>
              <li class="list-group-item list-group-item-success"><b>Test : </b><br>  <?php echo $rows['Test'];?></li>
              <li class="list-group-item list-group-item-warning"><b>Advice :</b><br> <?php echo $rows['Advice'];?></li>
              <li class="list-group-item"><b>Medicine :</b> <br> <?php echo $rows['Medicine'];?></li>

            </ul>
          </div>
        </div>






    </div>
  </div>
</div>



       <?php
       }
     }
       ?>








<?php }
else {
  header('location:index.php');
} ?>

  </body>
</html>
