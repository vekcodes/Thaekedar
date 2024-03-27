<?php
include 'db_connect.php';
?>
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
        <a href="managecn.php"><p>Manage contact</p></a>
    </div>
</div>
</div>
<h2>Applicants Contact</h2>
<div id="application-placement">
<?php
$approve = "select * from contacts where status='inprocess' OR 'decline'";
$check_approve = mysqli_query($conn,$approve);

while($row = mysqli_fetch_array($check_approve)){
    echo'<div id="applicants-box">
      <p id="applicantheading">'. $row['name'].' -'.$row['designation'].'</p>
      <form action="approvedecline.php" method=post>
      <input type="hidden" name="contact_id" value="' .$row['c_id'].'">
        <a href="approvedecline.php"><button id="view-application">View Application</button></a>
      </form>
      </div>';
  }
?>
</div>
</body>
</html>