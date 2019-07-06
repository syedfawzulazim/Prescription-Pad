<?php
  session_start();
  include_once 'connection.php';
?>

<?php

$docid = $_SESSION['doctorid'];


if (isset($_POST['submit'])) {
  $dgender = mysqli_real_escape_string($conn,$_POST ['dgender']);
  $dname = mysqli_real_escape_string($conn,$_POST ['dname']);
  $dage = mysqli_real_escape_string($conn,$_POST ['dage']);
  $dqua  = mysqli_real_escape_string($conn,$_POST ['dqua']);
  $demail = mysqli_real_escape_string($conn,$_POST ['demail']);
  $dphone = mysqli_real_escape_string($conn,$_POST ['dphone']);
  $file= $_FILES['dpic'];

  $filename = $_FILES['dpic']['name'];
  $tempname = $_FILES['dpic']['tmp_name'];

  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt,$allowed)) {
    $filenameNew = uniqid('',true).".".$fileActualExt;
  }
  else {
      echo "Can not upload this type of file.";
  }

  $folder='upimg/'.$filenameNew;
  move_uploaded_file($tempname,$folder);






  $query = "SELECT * from `doctorslist` WHERE DoctorID = '$docid'";
  $query_run = mysqli_query($conn,$query);


  if (mysqli_num_rows($query_run)==0) {

    echo '<script type="text/javascript"> alert("Doctor does not exists...")</script>';
    return false;

  }
  else {

    $query = "UPDATE `doctorslist` SET `Gender`= '$dgender',`DoctorName`='$dname',`Age`='$dage',`PhoneNumber`='$dphone',`Email`='$demail',`Qualification`='$dqua',`Image`='$folder' WHERE DoctorID ='$docid'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert("Info Updated")</script>';
      header('location:doctorhome.php');



    }
    else {
      echo '<script type="text/javascript"> alert("Error")</script>';
      return false;

    }

  }

}
 ?>

<style media="screen">
.pro .container{

  padding: 6px;
  text-align:left;


  width: 25%;
  padding: 12px 15px;
  margin: 30px 450px;
  display: inline-grid;
  border: 10px solid #ccc;
  box-sizing: content-box;
  background-position:center;
}




</style>






<!DOCTYPE html>
<html lang="en" dir="ltr">



  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="">
    <title>Profile</title>
  </head>



  <body>

    <?php if ($_SESSION['doctorid'])
    {
    ?>

    <div class="col-md-14 ">
      <?php include_once 'dheader.php'; ?>
    </div>


<div class="pro">


    <form class="info" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">

    <div class="container">
      <h3>Update Your Profile</h3><hr>


      <label for="occu">Full Name :</label><br>
      <input type="text" name="dname"><br>
      <label for="gender">Gender :</label><br>
      <select id="gender" name="dgender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br>

      <label for="age">Age :</label><br>
      <input type="number" name="dage"><br>



      <label for="email"><b>Phone Number :</b></label><br>
      <input type="text" maxlength="11" name="dphone"><br>

      <label for="email"><b>Email :</b></label><br>
      <input type="email" name="demail"><br>

      <label for="addr">Qualification & Speciality :</label><br>
      <textarea name="dqua" placeholder="Your Qualification and Speciality..." style="height:50px"></textarea><br>

      <label for="add">Your Picture :</label><br>
      <input type="file" name="dpic" value=""> <br>

      <button type="submit" name="submit">Add Info</button>
      <input type="reset">


    </div>

  </form>
</div>



<?php
  }
else {
  header('location:index.php');
}
?>
  </body>
</html>
