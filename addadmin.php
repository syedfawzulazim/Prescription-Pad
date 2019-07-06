<?php
  session_start();
  include_once 'connection.php';
?>
<?php
if (isset($_POST['submit'])){

  $adminid        = mysqli_real_escape_string($conn,$_POST ['adminid']);
  $adminpsw           = mysqli_real_escape_string($conn,$_POST ['adminpsw']);

  $hashedpassword = password_hash($adminpsw, PASSWORD_DEFAULT);


  $query = "SELECT * from `admin` WHERE adminid = '$adminid'";
  $query_run = mysqli_query($conn,$query);


  if (mysqli_num_rows($query_run)>0) {

    echo '<script type="text/javascript"> alert("Admin already exists..")</script>';
    return false;

  }
  else {
    $query="INSERT INTO `admin`(`adminid`, `password`)
    VALUES ('$adminid','$hashedpassword')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {

        echo '<script type="text/javascript"> alert("Admin Registered")</script>';



    }
    else {
      echo '<script type="text/javascript"> alert("Admin Registration Error")</script>';
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


    <h2>Add New Admin</h2>

              <div class="container">



              <label for="docname"><b>Admin ID</b></label>
              <input type="text" name="adminid" required>
              <br>

              <label for="psw"><b>Admin Password</b></label>
              <input type="text" minlength="5" name="adminpsw" required>
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
