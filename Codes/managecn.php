<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="th-admin.css">
  <title>Thaekedar-applicants</title>
</head>
<body>
  <div id="admin-sidebar">
    <img src="photo/thaekedarlogo.png" alt="logo" id="admin-logo">
    <h1>THAEKEDAR</h1>
<div id="admin-menu">
    <div id="aprovedecline">
        <a href="applicants.php"><p>Approve/Decline Contact</p></a>
    </div>
    <div id="mgmtcn">
        <a href="managecn.html"><p>Manage contact</p></a>
    </div>
</div>
</div>
<h2>Manage Contacts</h2>
<div id="addcn-placement">
<a href="contactregister.php"><div id="add-cn">
  <p>Add Contact</p>
  <img src="photo/Add.png" alt="adcn">
</div>
</a>
</div>
<div id="manage-placement">
<?php
    for($i=0;$i<=100;$i++){
      echo'<div id="applicants-box">
        <p id="applicantheading">Triyani Construction - Agency</p>
        <button id="remove-btn">Remove</button>
        </div>';
    }  
?>
</div>
</body>
</html>