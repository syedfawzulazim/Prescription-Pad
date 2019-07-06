<?php
session_start();
include_once 'connection.php';
?>


<?php  if (isset($_POST['signin'])) {
  $pharid = mysqli_real_escape_string($conn, $_POST ['pharid']);
  $pharpsw  = mysqli_real_escape_string($conn, $_POST ['pharpsw']);

  $query = "SELECT * from `pharmacy` WHERE PharmacyID ='$pharid'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    $row = mysqli_fetch_array($query_run);
    $hashed = $row['Password'];

    if(password_verify($pharpsw,$hashed)){

    echo '<script type="text/javascript"> alert("Successfully Signed In")</script>';
    $_SESSION['pharid'] =$pharid;
    header('location:pharmacyhome.php');

  }
  else {

    echo '<script type="text/javascript"> alert("Sign In Error: (pharmacy id/password is not correct) ")</script>';


    return false;
  }


}
}

else {

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Login</title>
    <link rel="stylesheet" type="text/css" href="pharmacylogin.css">
  </head>
  <body>


    <h2 align="center" style="color:white">Pharmacy Login</h2>

    <div id="id01" class="modal">

      <form method="post" class="modal-content animate" action="">

        <div class="container">

          <label for="doctorid" style="color:white"><b>Pharmacy ID</b></label>
          <input type="text" maxlength="11" name="pharid" required>
    <br>
          <label for="psw" style="color:white"><b>Password</b></label>
          <input type="password"  name="pharpsw" required>
          <br>

          <button type="submit" name="signin">Sign In</button>
    <br>


        </div>
      </form>
    </div>
</body>
</html>
