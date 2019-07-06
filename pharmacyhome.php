<?php
session_start();
include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="">
    <title>Pharmacy Home</title>
  </head>
  <body>


    <?php
    if ($_SESSION['pharid']==true) {
    include_once 'pharheader.php'; ?>



<form class="" action="" method="post">
  <label for="patientid">Patient ID</label>
  <input type="text" maxlength="50" name="pid"  required>
  <label for="patientid">Prescription ID</label>
  <input type="text" name="presid" required>

  <button type="submit" name="submit">Search</button>
  <input type="reset" name="" value="Reset">

</form>



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


              <h2 class="text-center"><b>Prescription</b></h2>


            <div class="card-body" style="width:500px;">
              <h5 class="card-title"></h5>
              <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item list-group-item-danger"><h4>Patient ID :<?php echo $rows['PatientID'];?> </h4></li>
              <li class="list-group-item list-group-item-dark"><b>Prescription ID :</b> <?php echo $rows['PrescriptionID'];?></li>
              <li class="list-group-item list-group-item-success"><b>Date :</b> <?php echo $rows['Date'];?> <br><b>Validity : </b><?php echo $rows['Validity'];?></li>
              <li class="list-group-item"><b>Medicine :</b> <br> <?php echo $rows['Medicine'];?></li>
            </ul>
          </div>
        </div>






    </div>
  </div>
</div>
</div>


  <?php
  }
}
  ?>















  <?php }else {
    header('location:index.php');

  } ?>

  </body>
</html>
