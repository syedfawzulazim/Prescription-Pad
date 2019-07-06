<?php
  session_start();
  include_once 'connection.php';
?>

<?php
$docname = $_SESSION['docname'];
$docid = $_SESSION['doctorid'];

if (isset($_POST['prescribe'])) {
  $patientid = mysqli_real_escape_string($conn,$_POST ['patientid']);
  $date = mysqli_real_escape_string($conn,$_POST ['date']);
  $disease = mysqli_real_escape_string($conn,$_POST ['disease']);
  $test  = mysqli_real_escape_string($conn,$_POST ['test']);
  $medicine = mysqli_real_escape_string($conn,$_POST ['medicine']);
  $advice  = mysqli_real_escape_string($conn,$_POST ['advice']);
  $validity  = mysqli_real_escape_string($conn,$_POST ['vdate']);




  $query = "SELECT * from `register` WHERE Phone ='$patientid'";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run)>0) {

    $query="INSERT INTO `prescription`(`DoctorName`,`DoctorID`,`PatientID`, `Date`, `Disease`, `Test`, `Medicine`, `Advice`,`Validity`)
    VALUES ('$docname','$docid','$patientid','$date','$disease','$test','$medicine','$advice','$validity')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
       echo '<script type="text/javascript"> alert("Successfully Prescribed...")</script>';

    }
    else {
      echo '<script type="text/javascript"> alert("Prescribtion Error")</script>';
      return false;

    }


  }
  else {
    echo '<script type="text/javascript"> alert("Patient Does Not Exist...")</script>';
    return false;

  }
}
else {

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Prescription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="d_prescription.css">
</head>


<body>
  <?php if ($_SESSION['doctorid'])
      {
     include_once 'dheader.php';

     ?>


<form class="" action="" method="post">
     <div class="container" style="background-image: url('img/bg11.jpg');">

         <div class="row">
             <div class="tab-content">
                 <div role="tabpanel" class="tab-pane active" id="step-1">

                     <div class="col-md-12">
                         <h3 style="text-align:center; color:White"><b>Prescription</b></h3>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Patient ID</label>
                                 <input name="patientid" style="background-color:#E4D9E8"  maxlength="50" type="text" required="required" class="form-control" placeholder="Enter ID"  />
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Date</label>
                                 <input name="date" style="background-color:#E4D9E8"  type="date"  class="form-control" placeholder="DD/MM/YYYY" />
                             </div>
                         </div>



                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Disease</label>

                                 <textarea name="disease"style="background-color:#E4D9E8" class="form-control" rows="7" id="comment"></textarea>
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Test</label>

                               <textarea name="test" style="background-color:#E4D9E8" class="form-control" rows="7" id="comment"></textarea>
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Medicine</label>

                             <textarea name="medicine" style="background-color:#E4D9E8" class="form-control" rows="7" id="comment"></textarea>
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Advice</label>

                             <textarea name="advice" style="background-color:#E4D9E8" class="form-control" rows="7" id="comment"></textarea>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label style=" color:white" class="control-label">Validity Till</label>
                                 <input name="vdate" style="background-color:#E4D9E8"  type="date"  class="form-control" placeholder="DD/MM/YYYY" />
                             </div>
                         </div>

                         <div class="col-md-3">
                             <div class="form-group">
                                 <button name="prescribe" style="background-color:#387CE8; padding:15px" id="step-1-next" class="btn btn-md btn-primary nextBtn pull-right">Prescribe</button>
                             </div>
                         </div>



                     </div>
                 </div>

             </div>

         </div>
     </div>



</form>











<?php
}
else
{
  header('location:index.php');
}
?>
</body>
</html>
