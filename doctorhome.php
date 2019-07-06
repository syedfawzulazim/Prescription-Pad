<?php
  session_start();
  include_once 'connection.php';
?>
<?php

$docid=$_SESSION['doctorid'];


$sql = "SELECT * from `doctorslist` WHERE DoctorID ='$docid'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$docname    = $row['DoctorName'];
$docnum    = $row['PhoneNumber'];
$docgender    = $row['Gender'];
$docage  = $row['Age'];
$docemail    = $row['Email'];
$docqua    = $row['Qualification'];
$docimg   = $row['Image'];
$docid  = $row['DoctorID'];

$_SESSION['docname']=$docname;
$_SESSION['docnum']=$docnum;
$_SESSION['docgender']=$docgender;
$_SESSION['docage']=$docage;
$_SESSION['docemail']=$docemail;
$_SESSION['docqua']=$docqua;
$_SESSION['docimg']=$docimg;
$_SESSION['docid'] = $docid;
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="docotorhome.css">
    <title>Doctor Home</title>
 </head>

<body>

  <?php
  if ($_SESSION['doctorid']==true) {
    include_once 'dheader.php'; ?>

    <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="card">

                       <div class="card-body">
                           <div class="card-title mb-4">
                               <div class="d-flex justify-content-start">
                                   <div class="image-container">
                                       <img src="<?php echo $_SESSION['docimg'] ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                                   </div>
                                   <div class="userData ml-3">
                                       <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="">DR. <?php echo $_SESSION['docname'] ?></a></h2>
                                       <h6 class="d-block"> <?php echo $_SESSION['docqua'] ?></h6>

                                   </div>

                               </div>

                           </div>

                           <div class="row">
                               <div class="col-12">
                                   <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                       <li class="nav-item">
                                           <a class="btn btn-info" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                       </li>
                                       <li class="nav-item">
                                             <a href="d_profile.php" class="btn btn-info" role="button">Update Your Info</a>
                                       </li>
                                       <li class="nav-item">
                                             <a href="d_password.php" class="btn btn-info" role="button">Change Password</a>
                                       </li>


                                   </ul>
                                   <div class="tab-content ml-1" id="myTabContent">
                                       <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

<br>
                                      <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                              <label style="font-weight:bold;">Doctor ID :</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              <?php echo $_SESSION['docid'] ?>
                                            </div>
                                          </div>
                                          <hr />

                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-9">
                                                   <label style="font-weight:bold;">Full Name</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $_SESSION['docname'] ?>
                                               </div>
                                           </div>
                                           <hr />

                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Age</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $_SESSION['docage'] ?>
                                               </div>
                                           </div>
                                           <hr />


                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Gender</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                   <?php echo $_SESSION['docgender'] ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Qualification & Speciality</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $_SESSION['docqua'] ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Phone Number</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $_SESSION['docnum'] ?>
                                               </div>
                                           </div>
                                           <hr />
                                           <div class="row">
                                               <div class="col-sm-3 col-md-2 col-5">
                                                   <label style="font-weight:bold;">Email</label>
                                               </div>
                                               <div class="col-md-8 col-6">
                                                  <?php echo $_SESSION['docemail'] ?>
                                               </div>
                                           </div>

<br>
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








<?php }
else {
  header('location:index.php');
} ?>

</body>
</html>
