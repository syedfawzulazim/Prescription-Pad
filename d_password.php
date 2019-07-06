<?php
  session_start();
  include_once 'connection.php';
?>

<?php

$docid = $_SESSION['doctorid'];


if (isset($_POST['submit'])) {
  $dopass = mysqli_real_escape_string($conn,$_POST ['dopass']);
  $dnpass = mysqli_real_escape_string($conn,$_POST ['dnpass']);


  $hashedpassword = password_hash($dnpass, PASSWORD_DEFAULT);








  $query = "SELECT * from `doctorslist` WHERE DoctorID = '$docid'";
  $query_run = mysqli_query($conn,$query);


  if (mysqli_num_rows($query_run)==0) {

    echo '<script type="text/javascript"> alert("Wrong Old Password")</script>';
    return false;

  }
  else {
    $row = mysqli_fetch_array($query_run);
    $hashed = $row['Password'];

    if(password_verify($dopass,$hashed)){

    $query = "UPDATE `doctorslist` SET `Password`= '$hashedpassword' WHERE DoctorID ='$docid'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert("Password Updated")</script>';




    }
    else {
      echo '<script type="text/javascript"> alert("Error")</script>';
      return false;

    }

  }
  else {
    echo '<script type="text/javascript"> alert("Wrong Old Password")</script>';
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


    <form class="info" onsonsubmit="return subfun()" action="" method="post" >

    <div class="container">
      <h3>Change Your Password</h3><hr>


      <label for="occu">Enter Old Password:</label><br>
      <input type="password" name="dopass"><br>

      <label for="occu">Enter New Password:</label><br>
      <input id="p1" minlength="6" type="password" name="dnpass"><br>



      <button type="submit" name="submit">Change Password</button>
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
