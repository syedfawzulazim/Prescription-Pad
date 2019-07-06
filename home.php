<?php
  session_start();
  include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php
  $uid=$_SESSION['userid'];

  $sql = "SELECT * from `register` WHERE Phone ='$uid'";
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);

  $id    = $row['ID'];
  $phone = $row['Phone'];
  $fname = $row['FirstName'];
  $lname = $row['LastName'];
  $email = $row['Email'];

  $_SESSION['id']=$id;
  $_SESSION['phone']=$phone;
  $_SESSION['fname']=$fname;
  $_SESSION['lname']=$lname;
  $_SESSION['email']=$email;


  $sql = "SELECT * from `p_profile` WHERE PatientID ='$uid'";
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);

  $gen    = $row['Gender'];
  $bld = $row['Blood'];
  $age = $row['Age'];
  $occu = $row['Occupation'];
  $addrs = $row['Address'];
  $phn = $row['Phone'];
  $img = $row['Picture'];




 ?>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Home</title>
  </head>


  <body>
    <?php
    if ($_SESSION['userid']==true) {
    ?>


    <?php include_once 'pheader.php'; ?>


    <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="card">

                       <div class="card-body">
                           <div class="card-title mb-4">
                               <div class="d-flex justify-content-start">
                                   <div class="image-container">
                                       <img src="<?php echo $img ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                                   </div>
                                   <div class="userData ml-3">
                                       <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href=""> <?php echo $fname," ",$lname ?></a></h2>
                                       <h6 class="d-block"> <?php echo $occu ?></h6>


                                   </div>

                               </div>
                           </div>

                           <div class="row">
                               <div class="col-12">
                                   <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                       <li class="nav-item">
                                           <a class="btn btn-primary" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Your Basic Info</a>
                                       </li>
                                       <li class="nav-item">
                                           <a href="p_profile.php" class="btn btn-info" role="button">Update Your Info</a><br>
                                       </li>
                                       <li class="nav-item">
                                           <a href="p_password.php" class="btn btn-warning" role="button">Change Password</a><br>

                                       </li>

                                   </ul>
                                   <div class="tab-content ml-1" id="myTabContent">
                                       <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

  <br>

                                      <div class="row">
                                        <div class="col-sm-3 col-md-2 col-9">
                                          <label style="font-weight:bold;">Patient ID</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                          <?php echo $phone ?>
                                        </div>
                                      </div>
                                      <hr />

                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-9">
                                                   <label style="font-weight:bold;">Full Name</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $fname," ",$lname ?>
                                               </div>
                                           </div>
                                           <hr />

                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Age</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $age ?>
                                               </div>
                                           </div>
                                           <hr />


                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Gender</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $gen ?>
                                               </div>
                                           </div>
                                           <hr />

                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Blood</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $bld?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Occupation</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $occu ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Phone Number</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $phn ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Email</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php  echo $email ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Address</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $addrs ?>
                                               </div>
                                           </div>

  <br>



                                       </div>

                                   </div>
                               </div>
                           </div>


                       </div>

                   </div>
               </div>
           </div>
       </div>






  <?php
  }
  else{
    header('location:index.php');
  }
  ?>
  </body>

</html>
