<!DOCTYPE html>
<html lang="en" dir="ltr">


<style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }


    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>



  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Header</title>
  </head>


  <body>


    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Patient Home</a></li>
        <li><a href="p_prescription.php">Prescription</a></li>
        <li><a href="p_report.php">Report</a></li>
        <li><a href="p_oldpres.php">Old Prescription</a></li>
        <li><a href="p_doclist.php">Doctors List</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="">Name : <?php echo $_SESSION['fname']," ",$_SESSION['lname']," || PatientID : ",$_SESSION['phone']  ?></a></li>

        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
    </div>
  </div>
</nav>
</body>

</html>
