<?php
  session_start();
  include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php

  if (isset($_POST['submit'])){

    $dname          = mysqli_real_escape_string($conn,$_POST ['docname']);
    $dphone         = mysqli_real_escape_string($conn,$_POST ['docph']);
    $did            = mysqli_real_escape_string($conn,$_POST ['docid']);
    $docpsw         = mysqli_real_escape_string($conn,$_POST ['docpsw']);
    $dgender        = mysqli_real_escape_string($conn,$_POST ['docgender']);
    $dage           = mysqli_real_escape_string($conn,$_POST ['docage']);
    $demail         = mysqli_real_escape_string($conn,$_POST ['docemail']);
    $dqualification = mysqli_real_escape_string($conn,$_POST ['docqualification']);
    $file= $_FILES['docpic'];


    $hashedpassword = password_hash($docpsw, PASSWORD_DEFAULT);


    $filename = $_FILES['docpic']['name'];
    $tempname = $_FILES['docpic']['tmp_name'];

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






    $query = "SELECT * from `doctorslist` WHERE DoctorID = '$did'";
    $query_run = mysqli_query($conn,$query);


    if (mysqli_num_rows($query_run)>0) {

      echo '<script type="text/javascript"> alert("Doctor already exists..")</script>';
      return false;

    }
    else {
      $query="INSERT INTO `doctorslist`(`DoctorName`, `PhoneNumber`, `DoctorID`, `Password`, `Gender`, `Age`,`Email`, `Qualification`,`Image`)
      VALUES ('$dname','$dphone','$did','$hashedpassword','$dgender','$dage', '$demail','$dqualification','$folder')";

      $query_run = mysqli_query($conn, $query);
      if ($query_run) {

          echo '<script type="text/javascript"> alert("Doctor Registered")</script>';
          header('location:a_doclist.php');


      }
      else {
        echo '<script type="text/javascript"> alert("Registration Error")</script>';
        return false;

      }

    }

  }
  else{


  }
?>


  <style media="">
  .container {
      padding: 116px;
      text-align:left;



      width: 25%;
      padding: 22px 20px;
      margin: 25px 20px;
      display:  inline-grid;
      border: 7px solid #aaa;
      box-sizing: border-box;
      background-position:center;

  }

  </style>



  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminworks.css">

    <title>Admin Works</title>
 </head>



  <body>




<?php if($_SESSION['adminid']==true){?>
<?php include_once 'aheader.php'; ?>






<form class="" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">


<h2>Add New Doctors</h2>

          <div class="container">



          <label for="docname"><b>Doctor's Name</b></label>
          <input type="text" name="docname">
          <br>

          <label for="num"><b>Phone Number</b></label>
          <input type="tel" maxlength="11" name="docph">
          <br>

          <label for="docid"><b>Doctor's ID</b></label>
          <input type="text" maxlength="15" name="docid" required>
          <br>

          <label for="psw"><b>Password</b></label>
          <input type="text" minlength="5" name="docpsw" required>
          <br>

          <label for="gender"><b>Gender</b></label>
          <select id="gender" name="docgender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <br>

          <label for="age"><b>Age</b></label>
          <input type="number" maxlength="3" name="docage">
          <br>

          <label for="email"><b>Email</b></label>
          <input type="email" name="docemail">
          <br>

          <label for="qualification"><b>Qualification & Speciality</b></label><br>
          <textarea id="docqualification" name="docqualification" placeholder="doctor's qualification & Speciality..." style="height:50px"></textarea>
          <br>

          <input type="file" name="docpic" value=""> <br>





          <button type="submit" name="submit">Add To Database</button>
          <input type="reset">




</form>










<?php
}
else {
  echo '<script type="text/javascript"> alert("STOP DOING THIS")</script>';
  header('location:index.php');
}

?>








  </body>
</html>
