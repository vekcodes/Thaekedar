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
<?php
    //password not matched error 
    if(isset($_GET['message'])){
      echo"<div id='messbx' style='margin: 0;position: absolute;left: 70%;top:30px'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
<h2 id='th-admin-head'>Manage Contacts</h2>
<div id="manage-placement">
<?php

$csql = 'select * from contacts'; 
$cresult=mysqli_query($conn,$csql);
while($xrow = mysqli_fetch_assoc($cresult)){
  if($xrow['status'] == 'approved'){
      echo'<div id="applicants-box">
        <p id="applicantheading">'.$xrow['name'].' - '. $xrow['designation'].'</p>
        <div id="remupd-flex">
        <button id="remove-btn" onclick =remove('.$xrow['c_id'].')>Remove</button>
        <button id="update-btn" onclick = update('.$xrow['c_id'].')>Update</button>
        </div>
        </div>
        ';
    }  }
?>
</div>
</body>
</html>
<script>  
function remove(c_id){
  var removebtn = document.querySelectorAll('#remove-btn');
  var removeresult = confirm("Are you sure you want to remove this contact?");
  if(removeresult){
    window.location.href = "removecontact.php?c_id="+c_id;
  }
}
function update(c_id){
  window.location.href = "updatecontact.php?c_id="+c_id;
}

setTimeout(function(){
    document.getElementById('messbx').style.display = 'none';
  }, 5000);
  window.onload = function() {
    // Get the message element
    var messageElement = document.getElementById("message");
    if (messageElement) {
      // Remove the element or hide it using CSS
      messageElement.remove();   // Remove the element
      // or
      messageElement.style.display = "none";  // Hide it
    }
  };
  
  function removeQueryParams() {
    var urlWithoutParams = window.location.origin + window.location.pathname;
    window.history.replaceState({}, document.title, urlWithoutParams);
} 
</script>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>