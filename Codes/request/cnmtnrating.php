<?php
include '../utils/db_connect.php';
session_start();

if(isset($_POST['ratingncmntsubmit'])){
  $rating = $_POST['rate'];
  $comment = $_POST['comment'];
  $user_id = $_SESSION['user_id'];
  $c_id = $_POST['c_id'];

  
  
  $dsql = 'select * from rating_comment where c_id = '.$c_id.' and user_id = '.$user_id;
  $dsql_run = mysqli_query($conn,$dsql);
  $dsql_num = mysqli_num_rows($dsql_run);
  
  if($dsql_num>0){ ?>
   <form id="myForm" action="../feedback.php" method="post">
      <input type="hidden" name="message" value="Cannot rate and comment twice">
      <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
    </form>
    <script type="text/javascript">
      document.getElementById('myForm').submit();
    </script>
  <?php }
  else{
    
    $sql = "insert into rating_comment(user_id,c_id,rating, comment) Values('$user_id','$c_id','$rating','$comment')"; 
    $r = mysqli_query($conn, $sql);
    if($r){
      header('Location: ../index.php?message=successfully rated and commented');
    }
}
}
?>