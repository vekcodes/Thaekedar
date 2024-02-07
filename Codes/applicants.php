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
<h2>Applicants Contact</h2>
<div id="application-placement">
<?php
  for($i=0;$i<=10;$i++){
    echo'<div id="applicants-box">
      <p id="applicantheading">Triyani Construction - Agency</p>
      <a href="approvedecline.php"><button id="view-application">View Application</button></a>
      </div>';
  }
?>
</div>
</body>
</html>