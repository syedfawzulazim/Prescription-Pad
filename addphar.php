<?php
  session_start();
  include_once 'connection.php';
?>
<?php
if (isset($_POST['submit'])){

  $phname          = mysqli_real_escape_string($conn,$_POST ['phname']);
  $phphone         = mysqli_real_escape_string($conn,$_POST ['phphone']);
  $phid            = mysqli_real_escape_string($conn,$_POST ['phid']);
  $phpsw           = mysqli_real_escape_string($conn,$_POST ['phpsw']);

  $hashedpassword = password_hash($phpsw, PASSWORD_DEFAULT);


  $query = "SELECT * from `pharmacy` WHERE PharmacyID = '$phid'";
  $query_run = mysqli_query($conn,$query);


  if (mysqli_num_rows($query_run)>0) {

    echo '<script type="text/javascript"> alert("Pharmacy already exists..")</script>';
    return false;

  }
  else {
    $query="INSERT INTO `pharmacy`(`PharmacyName`, `PharmacyPhone`, `PharmacyID`, `Password`)
    VALUES ('$phname','$phphone','$phid','$hashedpassword')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {

        echo '<script type="text/javascript"> alert("Pharmacy Registered")</script>';
      


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






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php if($_SESSION['adminid']==true){?>
    <?php include_once 'aheader.php'; ?>



    <form class="" onsonsubmit="return subfun()" action="" method="post" enctype="multipart/form-data">


    <h2>Add New Pharmacy</h2>

              <div class="container">



              <label for="docname"><b>Pharmacy Name</b></label>
              <input type="text" name="phname" required>
              <br>

              <label for="num"><b>Pharmacy Phone Number</b></label>
              <input type="tel" maxlength="11" name="phphone" required>
              <br>

              <label for="docid"><b>Pharmacy ID</b></label>
              <input type="text" maxlength="15" name="phid" required>
              <br>

              <label for="psw"><b>Password</b></label>
              <input type="text" minlength="5" name="phpsw" required>
              <br>





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
