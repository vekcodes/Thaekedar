<?php
include '../utils/db_connect.php';
session_start();
if(isset($_POST['accept'])){
  $c_id = $_POST['c_id'];
  $user_id = $_POST['user_id'];
  $sql = "UPDATE connected SET request_status = 'accepted', timestamp = CURRENT_DATE()  WHERE c_id = '$c_id' AND user_id = '$user_id'";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: ../notification.php?message=Accepted successfully");
  }
}
if(isset($_POST['cancel'])){
  $c_id = $_POST['c_id'];
  $user_id = $_POST['user_id'];
  $sql = "DELETE FROM connected WHERE user_id = $user_id AND c_id = $c_id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: ../notification.php?message=Declined successfully");
  }
}
if(isset($_POST['finished'])){
  $c_id = $_POST['c_id'];
  $user_id = $_POST['user_id'];
  $sql = "UPDATE connected SET enddate = CURRENT_DATE(),request_status ='finished' WHERE user_id = $user_id AND c_id = $c_id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: ../notification.php?message=Successfully Updated");
  }
}
?>