<?php
include ('../utils/db_connect.php');
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  $email = $_POST['email'];
  $password = $_POST['password'];

  //checking if email exists in the database
  $check = "select * from admin where email = '$email'";
  $result = mysqli_query($conn, $check);
  if(mysqli_num_rows($result) === 0){
    header("Location: ../th-adminlogin.php?error=Incorrect Credentials");
    exit;
  }
  $user = mysqli_fetch_assoc($result);
  if(password_verify($password,$user['password'])){
    session_start();
    $_SESSION['user_id']= $user['admin_id'];
    $_SESSION['user_email']= $user['email'];
    header("Location: ../th-admin.php");
    exit;
  }else{
    header("Location: ../th-adminlogin.php?error=Incorrect Credentials");
    exit;
  }
}
?>