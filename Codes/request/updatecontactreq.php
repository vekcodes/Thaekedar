<?php
session_start();
include ('../utils/db_connect.php');
if(isset($_POST['update-btn'])){
$c_id = $_POST['c_id'];
$location = $_POST['location'];
$email= $_POST['email'];
$phoneno = $_POST['phoneno'];
$description = $_POST['description'];
$iglink = $_POST['iglink'];
$fblink = $_POST['fblink'];
$weblink = $_POST['weblink'];
$updatesql = "UPDATE contacts SET email = '$email', location = '$location', phoneno = '$phoneno', description = '$description', iglink = '$iglink', fblink = '$fblink', weblink = '$weblink' WHERE c_id = $c_id";
$updateresult = mysqli_query($conn,$updatesql);
if($updateresult){
  header("Location: ../managecn.php?message=Update successful");
}else{
  header("Location: ../managecn.php?message=Update failed");
}}
?>