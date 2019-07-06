<?php
  session_start();
  include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Home</title>
  </head>
  <body>
    <?php if($_SESSION['adminid']==true){?>
    <?php include_once 'aheader.php'; ?>









    <div id="mySidenav" class="sidenav">
      <a href="adminworks.php" id="adddoc">Add Dcotor</a>
      <a href="addphar.php" id="addphar">Add Pharmacy</a>
      <a href="addadmin.php" id="updoc">Add Admin</a>
      <a href="a_adminlist.php" id="upphar">Show Admins List</a>
      <a href="a_doclist.php" id="shdoc">Show Doctors List</a>
      <a href="a_pharmacylist.php" id="shphar">Show Pharmacy List</a>
    </div>

    <style>
    #mySidenav a {
      position: relative;

      margin-left: 58px;

      padding: 15px;
      width: 200px;
      height: 80px;
      text-decoration: underline;
      font-size: 17px;
      color: white;
      border-radius: 5px 5px 5px 5px;

    }



    #adddoc {
      top: 40px;
      background-color: #4CAF50;
    }

    #addphar {
      top: 100px;
      background-color: #2196F3;
    }

    #updoc {
      top: 160px;
      background-color: #f44336;
    }
    #upphar {
      top: 220px;
      background-color: #4B0082;
    }
    #shdoc {
      top: 280px;
      background-color: 	#B8860B;
    }
    #shphar {
      top: 340px;
      background-color: #8B0000;
    }

</style>




















<?php }else {
  header('location:index.php');
} ?>

  </body>
</html>
