<?php
session_start();
include_once 'connection.php';
$id = $_GET['id'];
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="">
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

    $sql = "SELECT * from `prescription` WHERE PatientID = $userid AND PrescriptionID= $id ";
    $result = mysqli_query($conn,$sql);

    ?>



         <?php

               while ($rows = mysqli_fetch_assoc($result))


               {
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
                        <li class="list-group-item list-group-item-dark">Prescription ID : <?php echo $rows['PrescriptionID'];?></li>
                        <li class="list-group-item list-group-item-success">Date : <?php echo $rows['Date'];?> <br>  Valid Till : <?php echo $rows['Validity'];?></li>
                        <li class="list-group-item list-group-item-warning">Disease : <br>  <?php echo $rows['Disease'];?></li>
                        <li class="list-group-item list-group-item-success">Test : <br>  <?php echo $rows['Test'];?></li>
                        <li class="list-group-item list-group-item-warning">Advice :<br> <?php echo $rows['Advice'];?></li>
                        <li class="list-group-item">Medicine : <br> <?php echo $rows['Medicine'];?></li>
                      </ul>
                    </div>
                  </div>






              </div>
            </div>
          </div>


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
