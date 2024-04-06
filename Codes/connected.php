<?php
include ('./utils/db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "select user_type from users where user_id = '$user_id'";
$result = mysqli_query($conn,$sql);
$user_type = mysqli_fetch_assoc($result);
//fetch data

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
<?php
// echo $user_id;
$csql="SELECT c.*
FROM contacts c
WHERE c.c_id IN (
  SELECT c_id
  FROM connected
  WHERE EXISTS (
    SELECT 1
    FROM users
    WHERE user_id = c.user_id AND user_id = $user_id))";
$fetch_connected = mysqli_query($conn,$csql);
//fetch accepted from connected
$asql = "select request_status from connected where user_id = $user_id";
$check_request= mysqli_query($conn,$asql);
?>
<h2 id="th-admin-head">Contacts</h2>
<?php
echo '<div id="contact-center-placement" style="width: 70%; left: 21%;top: 80px;">';
if($fetch_connected){
while($row = mysqli_fetch_array($fetch_connected)){
  $c_row = mysqli_fetch_array($check_request);
  if($c_row && $c_row['request_status']=='accepted'){
    echo '<div id="contact-cards">
    <img src="./'.$row['photo'] .'" alt="agency-photo" id="contact-photo">
    <img src="./photo/Group 25.png" id="top-rated">
    <p id="contact-name">'.$row['name'].'</p>
    <p id="contact-location">'.$row['location'].'</p>
    <div id="gtcn-rating">
    <div id="get-contact">
    <a class ="get-contact-form" href="feedback.php"><button>Feedback</button></a>
    </div>
    <div id="ratings">
      <img src="./photo/Star.png" alt="rating">
      <p>5</p>
    </div>
    </div>
  </div>';
  }}}?>

<!-- Clients -->
<?php
// echo $user_id;
$csql="SELECT u.*, c.c_id 
FROM users u 
JOIN connected co ON u.user_id = co.user_id 
JOIN contacts c ON co.c_id = c.c_id 
WHERE c.user_id = $user_id";

$fetch_connected = mysqli_query($conn,$csql);
// $row = mysqli_fetch_array($fetch_connected);
// $row['user_id'];

//fetch accepted from connected
?>

<h2 id="th-admin-head" style="top: 350px;">Clients</h2>
<?php
echo '<div id="contact-center-placement" style="width: 70%;left: 0%;top: 450px;">';
if($fetch_connected){
while($row = mysqli_fetch_array($fetch_connected)){
  $asql = "select request_status from connected where user_id =".$row['user_id'];
  $check_request= mysqli_query($conn,$asql);

  $c_row = mysqli_fetch_array($check_request);
  if($c_row['request_status']=='accepted'){
    echo '<div id="contact-cards"style="height: 100px;padding: 5px;width: 180px;border-radius: 15px;">
    <p id="contact-name">'.$row['name'].'</p>
    <p id="contact-location">'.$row['email'].'</p>
    <p id="contact-location">'.$row['phone_number'].'</p>
    <form action="./request/workrequestresponse.php" method="post">
    <input type="hidden" name="c_id" value="'.$row['c_id'].'">
    <input type="hidden" name="user_id" value="'.$row['user_id'].'">
    <button id="notify-btn-cancel" style="margin: 5px 0 0 15px;" name="cancel">Remove</button>
    </form>
    </div>';
  }}}?>

</body>
</html>
<?php }
elseif($user_type['user_type']=='admin'){
 header("Location: th-admin.php"); 
}
else{
 header("Location: login.php"); 
}?>