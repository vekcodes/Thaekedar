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
//most worked contact
$sql = "SELECT contacts.name, COUNT(connected.c_id) as count
        FROM connected
        JOIN contacts ON connected.c_id = contacts.c_id
        WHERE connected.request_status = 'accepted'
        GROUP BY connected.c_id, contacts.name
        ORDER BY count DESC
        LIMIT 1";

$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $mostConnectedName = $row['name'];
// Top rated Contact
$trsql = "SELECT contacts.name, SUM(rating_comment.rating) as total_rating
        FROM rating_comment
        JOIN contacts ON rating_comment.c_id = contacts.c_id
        GROUP BY rating_comment.c_id, contacts.name
        ORDER BY total_rating DESC
        LIMIT 1";

$trresult = mysqli_query($conn, $trsql);
$trrow = mysqli_fetch_assoc($trresult);
$highestRatedName = $trrow['name'];
// total user registered

$tursql = "SELECT COUNT(*) as personal_count FROM users WHERE user_type = 'personal'";

$turresult = mysqli_query($conn, $tursql);
$turrow = mysqli_fetch_assoc($turresult);
$personalCount = $turrow['personal_count'];

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
    <label id="report-heading">Most Working Contact: </label>
    <p id="report-data"><?php echo $mostConnectedName; ?></p>
</div>
<div id="report-block">
  <img src="photo/star-rated.png" alt="">
    <label id="report-heading">Top Rated Contact: </label>
    <p id="report-data"><?php echo $highestRatedName; ?></p>
</div>
<div id="report-block">
  <img src="photo/profile-user.png" alt="">
    <label id="report-heading">Total Users Registered: </label>
    <p id="report-data"><?php echo $personalCount; ?></p>
</div>
</div>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>
