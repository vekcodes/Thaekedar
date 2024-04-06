<?php
include 'db_connect.php';
session_start();

if(isset($_POST['ratingncmntsubmit'])){
  $rating = $_POST['rate'];
  $comment = $_POST['comment'];
  $user_id = $_SESSION['user_id'];
  $c_id = $_POST['c_id'];

  $sql = "insert into rating_comment(user_id,c_id,rating, comment) Values('$user_id','$c_id','$rating','$comment')"; 

  $r = mysqli_query($conn, $sql);

if($r){
  header('Location: index.php?message=successfully rated and commented');
}

}

?>