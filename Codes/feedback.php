<?php
include ('./utils/db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "select user_type from users where user_id = '$user_id'";
$result = mysqli_query($conn,$sql);
$user_type = mysqli_fetch_assoc($result);
// echo $user_type['user_type'];
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && $user_type['user_type'] == 'personal'){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'header.php'?>
  <title>User Dashboard</title>
</head>
<body>
  <?php
  include'usersidebar.php';
  ?>
  
</body>
</html>
<?php }
elseif($user_type['user_type']=='admin'){
 header("Location: th-admin.php"); 
}
else{
 header("Location: login.php"); 
}?>