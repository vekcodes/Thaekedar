<?php
include 'db_connect.php';
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="th-admin.css">
  <link rel="stylesheet" href="contactregister.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <title>Thaekedar-admin</title>
</head>
<body>
<?php
    //password not matched error 
    if(isset($_GET['message'])){
      echo"<div id='messbx'style='position:absolute;margin-left: 30%; margin-top: 2%;'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
    <div id="admin-sidebar">
        <img src="photo/thaekedarlogo.png" alt="logo" id="admin-logo">
        <h1>THAEKEDAR</h1>
    <div id="admin-menu">
        <div id="aprovedecline">
            <a href="applicants.php"><p>Approve/Decline Contact</p></a>
        </div>
        <div id="mgmtcn">
            <a href="managecn.php"><p>Manage contact</p></a>
        </div>
    </div>
    </div>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>
