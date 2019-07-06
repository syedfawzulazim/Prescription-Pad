<?php
session_start();
include_once 'connection.php';

$id = $_GET['id'];
$pid = $_GET['pid'];
$rid = $_GET['rid'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Report</title>
  </head>
  <body>

    <?php if ($_SESSION['doctorid'])
        {
       include_once 'dheader.php';
       ?>

      <div class="">
        <h3>Prescription ID :<?php echo $pid   ?> || Report ID :<?php echo $rid  ?></h3>
        <h3> </h3>

        <img src="<?php echo $id  ?>" height='1200' width='1320'>
      </div>





<?php }else {
  header('location:index.php');
} ?>

  </body>
</html>
