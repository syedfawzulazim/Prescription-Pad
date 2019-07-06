<?php
session_start();
include_once 'connection.php';


if (isset($_POST['submit'])) {
  $phone = mysqli_real_escape_string($conn,$_POST ['phone']);
  $fname = mysqli_real_escape_string($conn,$_POST ['fstname']);
  $lname = mysqli_real_escape_string($conn,$_POST ['lstname']);
  $email = mysqli_real_escape_string($conn,$_POST ['email']);
  $pasw  = mysqli_real_escape_string($conn,$_POST ['psw']);

  $hashedpassword = password_hash($pasw, PASSWORD_DEFAULT);


  $query = "SELECT * from `register` WHERE Phone ='$phone'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    echo '<script type="text/javascript"> alert("User already exists..")</script>';
    return false;
  }
  else {
    $query="INSERT INTO `register`(`Phone`, `FirstName`, `LastName`, `Email`, `Password`)
    VALUES ('$phone','$fname','$lname','$email','$hashedpassword')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {

      $query="INSERT INTO `p_profile` (`PatientID`)
      VALUES ('$phone')";
      $query_run = mysqli_query($conn, $query);

       echo '<script type="text/javascript"> alert("Patient Registered Now Sign In To Continue...")</script>';

    }
    else {
      echo '<script type="text/javascript"> alert("Registration Error")</script>';
      return false;

    }

  }
}
else {

}

?>



<?php
if (isset($_POST['signin'])){

  $userid = mysqli_real_escape_string($conn, $_POST ['userid']);
  $inpsw  = mysqli_real_escape_string($conn, $_POST ['inpsw']);

  $query = "SELECT * from `register` WHERE Phone ='$userid'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    $row = mysqli_fetch_array($query_run);
    $hashed = $row['Password'];

    if(password_verify($inpsw,$hashed))
      {


        echo '<script type="text/javascript"> alert("Successfully Signed In")</script>';
        $_SESSION['userid']=$userid;
        header('location:home.php');

      }

      else
      {
      echo '<script type="text/javascript"> alert("Sign In Error: (user id/password is not correct) ")</script>';
      return false;
      }

  }

  else
  {
    echo '<script type="text/javascript"> alert("Sign In Error: (user id/password is not correct) ")</script>';
    return false;
  }


}
else {

}



 ?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="prescription and reports">
    <meta name="keywords" content="prescription,pad,online,Medicine,Doctor,patient">
    <meta name="author" content="Adnan Syed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prescription Pad</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body >



  <h1 class="h1">Combined Military Hospital(CMH)</h1>
<br>



<!--password checked and NID checked-->

<script>
function subfun(){
  var a = document.getElementById("p1").value;
  var b = document.getElementById("p2").value;

  if (a.length < 5) {
    document.getElementById("msg1").innerHTML="**Password length minimum 5";
    return false;
  }
  if(a!=b){
    document.getElementById("msg2").innerHTML="**Password did not match";
    return false;
  }
}
</script>





<div class="container">


      <div class="container1">


        <div class="signin">
          <p class="p1">Already have an account? <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign In</button></p>
        </div>

    <form method="post" onsubmit="return subfun()" action="" >

      <h3>Register</h3>
      <p>Please fill in this form to create an account.</p>

  <hr>

      <label for="fstname"><b>First Name</b></label>
      <input type="text" placeholder="First name" name="fstname" required>
  <br>
      <label for="lstname"><b>Last Name</b></label>
      <input type="text" placeholder="Last name" name="lstname" required>
  <br>

      <label for="phone"><b>NID No./Birth C. No.</b></label>
      <input id="n1" type="tel" maxlength="50"  placeholder="Enter NID/Birth Certificate No." name="phone" required>
<br>


        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
  <br>
      <label for="psw"><b>Password</b></label>
      <input id="p1" type="password"  placeholder="Enter Password" name="psw" value="" required>
  <br>
      <span class="sp1" style="color:red" id="msg1"></span>
  <br>
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input id="p2" type="password" placeholder="Repeat Password" name="rpsw" required>
  <br>
      <span style="color:red" id="msg2"> </span>

      <hr>


      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <button type="submit" name="submit" class="registerbtn">Register</button>

    </form>

  </div>


</div>





  <div id="id01" class="modal">

    <form method="post" class="modal-content animate" action="">


      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="img/dc11.jpg" alt="Avatar" class="avatar">
      </div>



      <div class="container2">

        <label for="userid"><b>NID/Birth C. No.</b></label>
        <input type="tel" maxlength="50" placeholder="Enter NID/Birth C. No." name="userid" required>
<br>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="inpsw" required>

        <button type="submit" name="signin">Sign In</button>
<br>

        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
<br>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>



      </div>
    </form>
  </div>




<!--cancel-->

  <script>

  var modal = document.getElementById('id01');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }

  </script>



<h3> All your Prescriptions & Medical Reports are in one place...</h3>



<hr>

  <div class="outerbox">

    <div class="sliderbox">



      <div id="mySidenav" class="sidenav">
        <a href="doclist.php" id="doc">Doctors List</a>
        <a href="about.php" id="about">About</a>
        <a href="doctor.php" id="doctor">Doctor</a>
        <a href="pharmacylogin.php" id="pharmacy">Pharmacy</a>
      </div>

      <style>
      #mySidenav a {
        position: fixed;
        left: -70px;
        transition: 0.3s;
        padding: 15px;
        width: 120px;
        text-decoration: none;
        font-size: 17px;
        color: white;
        border-radius: 0 5px 5px 0;

      }

      #mySidenav a:hover {
        left: 0;
      }



      #doc {
        top: 200px;
        background-color: #2196F3;
      }

      #about {
        top: 260px;
        background-color: #f44336;
      }
      #doctor {
        top: 320px;
        background-color: #4B0082;
      }
      #pharmacy {
        top: 380px;
        background-color: #8B0000;
      }

      </style>
        <img src="img/dc2.jpg" >
        <img src="img/dc4.jpg" >
        <img src="img/dc3.jpg" >
        <img src="img/dc7.jpg" >
        <img src="img/dc6.jpg" >
      </div>



  </div>

  </body>

</html>
