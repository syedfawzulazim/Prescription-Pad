<?php
  session_start();
  include_once 'connection.php';
?>

<?php


$phone = $_SESSION['phone'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$uid =   $_SESSION['id'];



if (isset($_POST['submit'])) {
  $pgender = mysqli_real_escape_string($conn,$_POST ['pgender']);
  $bgroup = mysqli_real_escape_string($conn,$_POST ['bgroup']);
  $age = mysqli_real_escape_string($conn,$_POST ['age']);
  $occu  = mysqli_real_escape_string($conn,$_POST ['occu']);
  $phn  = mysqli_real_escape_string($conn,$_POST ['phn']);
  $addrs = mysqli_real_escape_string($conn,$_POST ['addr']);
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
      echo "Can not upload this type of file.";
  }

  $folder='pimg/'.$filenameNew;
  move_uploaded_file($tempname,$folder);






  $query = "SELECT * from `p_profile` WHERE PatientID= '$phone'";
  $query_run = mysqli_query($conn,$query);


  if (mysqli_num_rows($query_run)==0) {

    echo '<script type="text/javascript"> alert("Info already exist..")</script>';
    return false;

  }
  else {

    $query = "UPDATE `p_profile` SET `Gender`= '$pgender',`Blood`='$bgroup',`Age`='$age',`Phone` = '$phn',`Occupation`='$occu', `Address`='$addrs',`Picture`='$folder' WHERE PatientID ='$phone'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert("Info Updated")</script>';
      header('location:home.php');



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

    <?php if ($_SESSION['userid'])
    {
    ?>

    <div class="col-md-14 ">
      <?php include_once 'pheader.php'; ?>
    </div>


<div class="pro">


    <form class="info" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">

    <div class="container">
      <h3>Update Your Profile</h3><hr>
      <label for="gender">Gender :</label><br>
      <select id="gender" name="pgender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br>
      <label for="blood">Blood Group :</label><br>
      <select id="blood" name="bgroup">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select><br>
      <label for="age">Age :</label><br>
      <input type="number" name="age" required><br>

      <label for="occu">Occupation :</label><br>
      <input type="text" name="occu" required><br>

      <label for="occu">Phone Number :</label><br>
      <input type="text" maxlength="11" name="phn" required><br>


      <label for="addr">Address :</label><br>
      <textarea name="addr" placeholder="Your address..." style="height:50px" required></textarea><br>

      <label for="add">Your Picture :</label><br>
      <input type="file" name="ppic" value="" required> <br>

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
