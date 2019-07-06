<?php
session_start();
include_once 'connection.php';
$userid = $_SESSION['phone'];
$id = $_GET['id'];
$pid = $_GET['opid'];
$rid = $_GET['dname'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Old Prescription Pic</title>
  </head>
  <body>

    <?php if ($_SESSION['userid']==true){?>
      <?php include_once 'pheader.php'; ?>


      <div class="">


        <hr style="border-top: 2px red solid;">
        <h3><b>Doctor Name :</b><?php echo $rid   ?> || <b>Old Prescription ID :</b><?php echo $pid  ?></h3>
        <hr style="border-top: 2px red solid;">
        <br>

        <hr>

        <img src="<?php echo $id  ?>" height='1200' width='1320'>
      </div>





<?php }else {
  header('location:index.php');
} ?>

  </body>
</html>
