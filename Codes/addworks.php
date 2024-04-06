<?php
include'./utils/db_connect.php';
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add works</title>
  <?php include'header.php'?>
</head>
<body>
<?php
    //password not matched error 
    if(isset($_GET['message'])){
      echo"<div id='messbx'style='position: absolute;left: 30%;'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
<h2 id="ag-heading"style="position:absolute;left:50%;">Add Works</h2>
<?php
include'usersidebar.php';
$sql="select * from contacts where user_id = $user_id";
$sql_run = mysqli_query($conn,$sql);
$check_contacts = mysqli_num_rows($sql_run)>0;
echo'<div id="contact-center-placement" style="left: 22%;top: 200px;">';
if($check_contacts){
while($row = mysqli_fetch_array($sql_run)){
  if($row['status']=='approved'){
    echo '<div id="contact-cards">
    <img src="./'.$row['photo'] .'" alt="agency-photo" id="contact-photo">
    <p id="contact-name">'.$row['name'].'</p>
    <p id="contact-location">'.$row['location'].'</p>
    <div id="get-contact">
    <form action="workpage.php" method="POST">
    <input type="hidden" name="c_id" value="'.$row['c_id'].'">
    <a class ="get-contact-form" href="workpage.php"><button>Add Works</button></a>
    </form>
    </div>
  </div>';
  }}}?>
</body>
</html>