<?php
include ('../utils/db_connect.php');
session_start();
if(isset($_POST['get-btn'])){
$user_id = $_SESSION['user_id'];
$c_id = $_POST['get-btn'];

$check_exists_sql="SELECT * FROM views WHERE c_id = '$c_id' AND user_id = '$user_id'";
$check_exists_result = mysqli_query($conn, $check_exists_sql);

if(mysqli_num_rows($check_exists_result)==0){
  $sql = "INSERT INTO views (c_id, user_id,view) VALUES ('$c_id', '$user_id','1')";
  $result = mysqli_query($conn, $sql);
  if($result){
    header('Location: ../contactpages/agencies.php?c_id='.$c_id);
  }
}
else{
  header('Location: ../contactpages/agencies.php?c_id='.$c_id);
}
}
?>