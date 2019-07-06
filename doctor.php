<?php
session_start();
include_once 'connection.php';
?>


<?php  if (isset($_POST['signin'])) {
  $doctorid = mysqli_real_escape_string($conn, $_POST ['doctorid']);
  $doctorpsw  = mysqli_real_escape_string($conn, $_POST ['doctorpsw']);

  $query = "SELECT * from `doctorslist` WHERE DoctorID ='$doctorid'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    $row = mysqli_fetch_array($query_run);
    $hashed = $row['Password'];

    if(password_verify($doctorpsw,$hashed)){

    echo '<script type="text/javascript"> alert("Successfully Signed In")</script>';
    $_SESSION['doctorid'] =$doctorid;
    header('location:doctorhome.php');

  }
  else {

    echo '<script type="text/javascript"> alert("Sign In Error: (doctor id/password is not correct) ")</script>';


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel="stylesheet" type="text/css" href="doctor.css">
  </head>
  <body>


    <h2 align="center" style="color:white">Doctor Login</h2>

    <div id="id01" class="modal">

      <form method="post" class="modal-content animate" action="">

        <div class="container">

          <label for="doctorid"><b>Doctor ID</b></label>
          <input type="text" maxlength="15" name="doctorid" required>
    <br>
          <label for="psw"><b>Password</b></label>
          <input type="password"  name="doctorpsw" required>
          <br>

          <button type="submit" name="signin">Sign In</button>
    <br>


        </div>
      </form>
    </div>
</body>
</html>
