<?php
session_start();
include ('./utils/db_connect.php');
if (isset($_GET['c_id'])) {
  $contact_id = $_GET['c_id'];
}
$sql = "SELECT * FROM contacts WHERE c_id = '$contact_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
//user == admin check
$user_id = $_SESSION['user_id'];
$csql = "select user_type from users where user_id = '$user_id'";
$cresult = mysqli_query($conn,$csql);
$user_type = mysqli_fetch_assoc($cresult);
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && $user_type['user_type']=='admin'){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include 'header.php';?>
    <title>Thaekedar-approve-decline</title>
</head>
<body>
<?php
include'adminsidebar.php';
?>
<form action="./request/updatecontactreq.php" method="post">
<h2 id='th-admin-head'>Update Contact</h2>
<div id="appdec-placement">
<div id="cn-grid">
  <div id="applicant-name">
    <p id="app-he">Name - Designation</p>
    <h3 id="app-data"><?php echo $row['name']?> - <?php echo $row['designation']?></h3>
  </div>
  <div id="applicant-location">
    <p id="app-he">Location</p>
    <input id="app-data" value ="<?php echo $row['location']?>" name='location'>
  </div>
  <div id="applicant-email">
    <p id="app-he">Email</p>
    <input id="app-data" value ="<?php echo $row['email']?>" name="email">
  </div>
  <div id="applicant-no">
    <p id="app-he">Phone no</p>
    <input id="app-data" value ="<?php echo $row['phoneno']?>" name="phoneno">
  </div>
  <div id="applicant-desc">
    <p id="app-he">Description</p>
    <input id="desc-box" style="font-size: 15px;" value ="<?php echo $row['description']?>" name="description">
  </div>
  <div id="applicant-links">
    <label>Instagram Link</label>
    <input id="app-data" value ="<?php echo $row['iglink']?>" name="iglink">
    <label>Facebook link</label>
    <input id="app-data" value ="<?php echo $row['fblink']?>"name="fblink">
    <label>Website link</label>
    <input id="app-data" value ="<?php echo $row['weblink']?>" name="weblink">
  </div>
</div>
<button id="update-btn" style='height:50px; width: 120px;font-size:15px' name='update-btn'>Update</button>
<input type="hidden" value='<?php echo $contact_id;?>' name="c_id">
</form>
<span style="margin: 100px;"></span>
</div>
<script>

</script>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>