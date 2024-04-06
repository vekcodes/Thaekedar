<?php
include ('./utils/db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "select user_type from users where user_id = '$user_id'";
$result = mysqli_query($conn,$sql);
$user_type = mysqli_fetch_assoc($result);
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])&& $user_type['user_type']=='admin'){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php include 'header.php';?>
  <title>Thaekedar-applicants</title>
</head>
<body>
<?php
include'adminsidebar.php';
?>
<h2 id='th-admin-head'>Applicants Contact</h2>
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
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>