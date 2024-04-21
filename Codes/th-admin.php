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
<?php
include'adminsidebar.php';
?>
<h2 id='th-admin-head'>Admin DashBoard</h2>
<div id="report-placement">
<div id="report-block">
  <img src="photo/point-of-view.png" alt="">
    <label id="report-heading">Most Viewed Contact: </label>
    <p id="report-data">Triyani Construction</p>
</div>
<div id="report-block">
  <img src="photo/wrench.png" alt="">
    <label id="report-heading">Most Worked Contact: </label>
    <p id="report-data">Triyani Construction</p>
</div>
<div id="report-block">
  <img src="photo/star-rated.png" alt="">
    <label id="report-heading">Top Rated Contact: </label>
    <p id="report-data">Triyani Construction</p>
</div>
<div id="report-block">
  <img src="photo/profile-user.png" alt="">
    <label id="report-heading">Total Users Registered: </label>
    <p id="report-data">40</p>
</div>
</div>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>
