<?php
include ('../utils/db_connect.php');
//data retrieve for contacts table
$sql="select * from contacts where designation = 'Engineer'";
$sql_run = mysqli_query($conn,$sql);
$check_engineer = mysqli_num_rows($sql_run)>0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php include '../header.php';?>
  <title>Thaekedar-Engineer</title>
</head>
<body>
<?php
require('../navbar.php'); ?>

<?php
    //message after rating and comment
    if(isset($_GET['message'])){
      echo"<div id='messbx'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
<h2 id="ag-heading">Find Engineer That <br>suits you</h2>
<div id="ag-highlight"></div>

<form action="" id="search-form">
  <input type="text" id="search-input" placeholder="Search here">
  <button id="search-button"><img src="../photo/Search.png" alt="search"></button>
</form>
</div>
<?php

echo'<div id="contact-center-placement">';
if($check_engineer ){
while($row = mysqli_fetch_array($sql_run)){
  if($row['status']=='approved'){
    echo '<div id="contact-cards">
    <img src="../'.$row['photo'] .'" alt="agency-photo" id="contact-photo">
    <img src="../photo/Group 25.png" id="top-rated">
    <p id="contact-name">'.$row['name'].'</p>
    <p id="contact-location">'.$row['location'].'</p>
    <div id="gtcn-rating">
    <div id="get-contact">
    <a class ="get-contact-form" onclick= " showcontactform('.$row['c_id'].')"><button>Get Contact</button></a>
    </div>
    <div id="ratings">
      <img src="../photo/Star.png" alt="rating">
      <p>5</p>
    </div>
    </div>
  </div>';
  }?>
<?php 
if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email']) ){
?>
<div class="contact-img" style="display:none" data-id="<?php echo $row['c_id']?>">
  <button id="close" onclick="hidecontactform(<?php echo $row['c_id']?>)"><img src="photo/Group 26.png" alt="cross"></button>
  <img src="<?php echo $row['photo']?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="photo/Location.png" alt="location" id="location-img">
      <p id="location"><?php echo $row['location'];?></p>
    </div>
    <p id="desc"><?php echo $row['description'];?></p>
    <div id="cn-email-phone">
      <p><span id="bold">Email: </span><?php echo $row['email'];?></p>
      <p><span id="bold">Phone no: </span><?php echo $row['phoneno'];?></p>
    </div>
    <div id="btns">
      <a href="<?php echo $row['iglink'];?>"><button class="cn-btn">Instagram</button></a>
      <a href="<?php echo $row['fblink'];?>"><button class="cn-btn">Facebook</button></a>
      <a href="<?php echo $row['weblink'];?>"><button class="cn-btn">Website</button></a>
    </div>
  </div>
  <div id="ratingnviewdisplay">
    <p style="margin: 0;">RATINGS :</p>
    <button id="ratingnumb">5 STAR</button>
    <p style="margin: 0;">Views :</p>
    <button id="ratingnumb">545</button>
  </div>
<div id="cmnt">
  <p id="cmnth">Comments :</p>
  <div id="cmnt-slide">
    <button class="cmnt-slide"><img src="photo/Group 27.png"></button>
    <button class="cmnt-slide"><img src="photo/Group 28.png"></button>
  </div>
  <div id="slide-comments">
    <p>The Quality of their work is exceptional, I had only worked twice with them still so much fullfiling </p>
  </div>
</div>
</div>
<?php }?>

<?php 
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) ){
?>
<div class="contact-img" style="display: none" data-id="<?php echo $row['c_id']?>" >
  <button id="close" onclick="hidecontactform(<?php echo $row['c_id']?>)"><img src="photo/Group 26.png" alt="cross"></button>
  <img src="<?php echo $row['photo']?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="photo/Location.png" alt="location" id="location-img">
      <p id="location"><?php echo $row['location'];?></p>
    </div>
    <p id="desc"><?php echo $row['description'];?></p>
    <div id="cn-email-phone">
      <p><span id="bold">Email: </span><?php echo $row['email'];?></p>
      <p><span id="bold">Phone no: </span><?php echo $row['phoneno'];?></p>
    </div>
    <div id="btns">
      <a href="<?php echo $row['iglink'];?>"><button class="cn-btn">Instagram</button></a>
      <a href="<?php echo $row['fblink'];?>"><button class="cn-btn">Facebook</button></a>
      <a href="<?php echo $row['weblink'];?>"><button class="cn-btn">Website</button></a>
    </div>
  </div>
  <form action="cnmtnrating.php" method="post">
    <input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
  <div id="ratingdisp">
    <p>RATE :</p>
    <select id="rate" required name="rate">
      <option value="">Rate</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <p style="margin: 0;">Views :</p>
    <button id="ratingnumb" style="width:40px;">545</button>
    </div>
    <div id="comment">
      <p>Comment :</p>
        <input type="text" id="comment-input" name="comment" required>
        <input type="submit" id="comment-submit" name="ratingncmntsubmit">
        <!-- <button id="comment-submit"><img src="photo/Email Send.png" alt=""></button> -->
      </form>
    </div>
<div id="cmnt">
  <p id="cmnth">Comments :</p>
  <div id="cmnt-slide">
    <button class="cmnt-slide"><img src="photo/Group 27.png"></button>
    <button class="cmnt-slide"><img src="photo/Group 28.png"></button>
  </div>
  <div id="slide-comments">
    <p>The Quality of their work is exceptional, I had only worked twice with them still so much fullfiling </p>
  </div>
</div>
</div>
<?php }}}?>
</div>
<script>

function showcontactform(id){
  console.log(id);
  var f= document.querySelectorAll(`.contact-img[data-id="${id}"]`)[0];
  // var f =document.getElementById("contact-img");
  f.style.display='block';
}
function hidecontactform(id){
  var f= document.querySelectorAll(`.contact-img[data-id="${id}"]`)[0];
  f.style.display='none';
  
}
</script>
</body>
</html>