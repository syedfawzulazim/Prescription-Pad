<?php
  session_start();

  include_once 'connection.php';

?>

<?php


  if (isset($_POST['submit'])){


  $adminid = mysqli_real_escape_string($conn, $_POST ['adminid']);
  $adminpsw  = mysqli_real_escape_string($conn, $_POST ['adminpsw']);

  $query = "SELECT * from `admin` WHERE adminid ='$adminid'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    $row = mysqli_fetch_array($query_run);
    $hashed = $row['password'];

    if(password_verify($adminpsw,$hashed)){

    echo '<script type="text/javascript"> alert("Successfully Signed In")</script>';
    $_SESSION['adminid'] =$adminid;
    header('location:adminhome.php');

  }
  else {

    echo '<script type="text/javascript"> alert("Sign In Error: (admin id/password is not correct) ")</script>';


    return false;
  }


}

}

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <body>




    <div id="id01" class="modal">

      <form method="post" class="modal-content animate" action="">






        <div class="container">

          <label for="adminid"><b>Admin ID</b></label>
          <input type="text" name="adminid" required>
    <br>
          <label for="psw"><b>Password</b></label>
          <input type="password"  name="adminpsw" required>
          <br>

          <button type="submit" name="submit">Sign In</button>
    <br>


        </div>
      </form>
    </div>















  </body>

</html>
