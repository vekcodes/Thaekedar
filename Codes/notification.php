<?php
include './utils/db_connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications</title>
  <?php include'header.php';?>
</head>
<body>
<?php
include'usersidebar.php';
?>
<?php
    //message after rating and comment
    if(isset($_GET['message'])){
      echo"<div id='messbx' style ='position:absolute;left:30%;z-index:999; margin-top:30px'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
<?php
$sql= 'select * from contacts where user_id='.$_SESSION['user_id'];
$result = mysqli_query($conn,$sql);
?>
<h2 id="th-admin-head">Notifications</h2>
<div id="notification-center-placement">
<?php
while($row = mysqli_fetch_array($result)){
if($row['status'] == 'approved'){?>
<div id="notify">
  <p id="cn-notify"><span>Thaekedar says:</span><br> Your'e contact has been approved for <b><?php echo $row['designation']."</b> named as ". "<b>".$row['name']."</b>";?></p>
</div>
<?php }?>

<?php 
if($row['status'] == 'declined'){?>
  <div id="notify">
  <p id="cn-notify"><span>Thaekedar says:</span><br> Your'e contact has been declined for <b><?php echo $row['designation']."</b> named as ". "<b>".$row['name']."</b>";?>. Make sure your document and contacts are valid.</p>
</div>
<?php }?>
<?php if($row['status'] == 'inprocess'){?>
  <div id="notify">
  <p id="cn-notify"><span>Thaekedar says:</span><br> Your'e contact is pending for approval</p>
  </div>
<?php }}?>

<?php 
$consql="SELECT connected.* FROM connected 
JOIN contacts ON contacts.c_id = connected.c_id 
WHERE contacts.user_id =".$_SESSION['user_id'];
$conresult = mysqli_query($conn,$consql);

while($row = mysqli_fetch_array($conresult)){
  if($row['request_status']=='inprogress'){ 
    $c_id = $row['c_id'];
    $user_id = $row['user_id'];
    // echo $user_id;
    $usersql= 'select * from users where user_id='.$user_id;
    $userresult = mysqli_query($conn,$usersql);
    $uname = mysqli_fetch_array($userresult);
    ?>
<div id="notify">
  <p id="cn-notify"><span>Thaekedar says: </span><b><?php echo $uname['name']; ?></b> has sent you work request</p>
  <form action="./request/workrequestresponse.php" method="post">
  <input type="hidden" name= 'user_id' value="<?php echo $uname['user_id']; ?>">
  <input type="hidden" name="c_id" value="<?php echo $c_id;?>">
  <b>Message:</b>
  <p style="margin:0px; margin-top: 5px; margin-bottom:10px"><?php echo $row['work_message']?></p>
  <button id="notify-btn-accept"name='accept'>Accept</button>
  <button id="notify-btn-cancel" name="cancel">Cancel</button>
  </form>
</div>
<?php }}?>
</div>
<script>
  setTimeout(function(){
    document.getElementById('messbx').style.display = 'none';
  }, 5000);
</script>
</body>
</html>