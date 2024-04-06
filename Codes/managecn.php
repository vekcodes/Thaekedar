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
  <!-- <link rel="stylesheet" href="th-admin.css"> -->
  <title>Thaekedar-applicants</title>
</head>
<body>
<?php
include'adminsidebar.php';
?>
<h2 id='th-admin-head'>Manage Contacts</h2>
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
        <div id="remupd-flex">
        <button id="remove-btn">Remove</button>
        <button id="update-btn">Update</button>
        </div>
        </div>
        ';
    }  
?>
</div>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>