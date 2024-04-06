<?php
include '../utils/db_connect.php';
session_start();
$user_id =$_SESSION['user_id'];
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  $c_id = $_POST['c_id'];
  $sql = "INSERT INTO connected(user_id, c_id, request_status)VALUES ($user_id, $c_id, 'inprogress')";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: ../index.php?message=Request Submitted successfully");
  }
  else{
    header("Location: ../index.php?message=Request not submitted");
  }
}

?>