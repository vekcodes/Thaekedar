<?php
include ('./utils/db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$c_id = $_POST['c_id'];
$sql = "select user_type from users where user_id = '$user_id'";
$result = mysqli_query($conn,$sql);
$user_type = mysqli_fetch_assoc($result);
// echo $user_type['user_type'];
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
    //message after rating and comment
    if(isset($_POST['message'])){
      echo"<div id='messbx' style ='position:absolute;left:30%;z-index:999; margin-top:30px'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_POST['message']. " </p>
      </div>";
    }
  ?>
  <form action="./request/cnmtnrating.php" method="post">
<h1 id="th-admin-head">Feedback</h1>
<div class="form-fields" style="position: absolute;top: 100px;left: 30%;width:400px">
  <label>Comment</label><br>
  <input type="text" placeholder="Comment your views" name="comment" required style="width:400px;height:100px"><br>
</div>
<div class="form-fields" id="rating" style='position: absolute;
    top: 250px;
    left: 30%;'>
  <label>Rate: </label><br>
  <select id="selection" name="rate" required>
    <option value="">-----Rate the contact-----</option>
    <option value="1">1 star</option>
    <option value="2">2 star</option>
    <option value="3">3 star</option>
    <option value="4">4 star</option>
    <option value="5">5 star</option>
  </select>
  </div>
<input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
<button id="ca-submit" name="ratingncmntsubmit" style="width: 100px;
    border-radius: 9px; left: 30%; top:380px">Submit</button>
    </form>
</body>
</html>
<?php }
elseif($user_type['user_type']=='admin'){
 header("Location: th-admin.php"); 
}
else{
 header("Location: login.php"); 
}?>
<script>
setTimeout(function(){
    document.getElementById('messbx').style.display = 'none';
  }, 5000);
</script>