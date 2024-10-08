<?php
include ('../utils/db_connect.php');
//data retrieve for contacts table
$sql="select * from contacts where designation = 'Interior Designer'";
$sql_run = mysqli_query($conn,$sql);
$check_agency = mysqli_num_rows($sql_run)>0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php include '../header.php';?>
  <title>Thaekedar-Interior Designer</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<h2 id="ag-heading">Find Interior Designer That <br>suits you</h2>
<div id="ag-highlight"></div>

<form action="interiordesigner.php" id="search-form" method="get">
  <input type="text" id="search-input" placeholder="Search here" name='search'>
  <button id="search-button"><img src="../photo/Search.png" alt="search" name="searchbutton"></button>
</form>
</div>
<?php
if(isset($_GET['search'])){
$searchTerm = $_GET['search'];
$searchsql = "SELECT * FROM contacts WHERE designation = 'Interior Designer' and location LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%'";
$searchresult = mysqli_query($conn, $searchsql);
}
echo'<div id="contact-center-placement">';
if($check_agency){
  while($row = mysqli_fetch_array(isset($_GET['search']) ? $searchresult : $sql_run)){
    if($row['status']=='approved'){
      //rating fetch
      $ratingsql = 'SELECT AVG(rating) as average_rating FROM rating_comment WHERE c_id = '.$row['c_id'];
      $ratingresult = mysqli_query($conn, $ratingsql);
      $ratingrow = mysqli_fetch_array($ratingresult);
      $average_rating = round($ratingrow['average_rating'], 1);
      //card display
      echo '<div id="contact-cards">
      <img src="../'.$row['photo'] .'" alt="agency-photo" id="contact-photo">
      <p id="contact-name">'.$row['name'].'</p>
      <p id="contact-location">'.$row['location'].'</p>
      <div id="gtcn-rating">
      <div id="get-contact">
      <form action="../request/insert_view.php" method= "post">
      <a class ="get-contact-form" name="get-btn" value="'.$row['c_id'].'" onclick="showcontactform('.$row['c_id'].')"><button>Get Contact</button></a> 
      </form>
      </div>
      <div id="ratings">
        <img src="../photo/Star.png" alt="rating">
        
        <p>'.$average_rating.'</p>
      </div>
      </div>
    </div>';
    }?>
<?php 
if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email']) ){
?>
<div class="contact-img" style="display:none" data-id="<?php echo $row['c_id']?>">
  <button id="close" onclick="hidecontactform(<?php echo $row['c_id']?>)"><img src="../photo/Group 26.png" alt="cross"></button>
  <img src="<?php echo '../'.$row['photo'];?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="../photo/Location.png" alt="location" id="location-img">
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
  <?php 
  //rating fetch
  $ratingsql = 'SELECT AVG(rating) as average_rating FROM rating_comment WHERE c_id = '.$row['c_id'];
  $ratingresult = mysqli_query($conn, $ratingsql);
  $ratingrow = mysqli_fetch_array($ratingresult);
  $average_rating = round($ratingrow['average_rating'], 1);
  //view fetch
  $viewsql = "SELECT SUM(view) as total_views FROM views WHERE c_id =". $row['c_id'];
  $viewresult = mysqli_query($conn, $viewsql);
  $viewrow = mysqli_fetch_assoc($viewresult);
  $total_views = $viewrow['total_views'];
  ?>
  <div id="ratingnviewdisplay" style="margin-top: 50px;">
    <p style="margin: 0;">RATINGS:</p>
    <button id="ratingnumb"><?php echo $average_rating; ?> STAR</button>
    <p style="margin: 0;">Views:</p>
    <button id="ratingnumb"><?php echo $total_views; ?></button>
  </div>
<div id="cmnt">
  <p id="cmnth">Comments :</p><form action="../works.php"><button class="cn-btn" style="position: absolute;left: 500px;top: 360px;">Show works</button> <input type="hidden" value="<?php echo $row['c_id']?>" name='c_id'></form>
  <div id="slide-comments">
  <?php 
  $cnmtsql= 'select comment from rating_comment where c_id = '.$row['c_id'];
  $cnmtresult= mysqli_query($conn,$cnmtsql);

  if(mysqli_num_rows($cnmtresult)>0){ 
    $cnmtrow = mysqli_fetch_array($cnmtresult); ?>
    <p><?php echo $cnmtrow['comment']; ?></p>
  <?php }
  else{
    echo '<p>No comments yet</p>';
  } ?>
  </div>
</div>
</div>
<?php }?>

<?php 
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) ){
?>
<div class="contact-img" style="display:none" data-id="<?php echo $row['c_id']?>">
  <button id="close" onclick="hidecontactform(<?php echo $row['c_id']?>)"><img src="../photo/Group 26.png" alt="cross"></button>
  <img src="<?php echo '../'.$row['photo'];?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="../photo/Location.png" alt="location" id="location-img">
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
  <?php 
  $ratingsql = 'SELECT AVG(rating) as average_rating FROM rating_comment WHERE c_id = '.$row['c_id'];
  $ratingresult = mysqli_query($conn, $ratingsql);
  $ratingrow = mysqli_fetch_array($ratingresult);
  $average_rating = round($ratingrow['average_rating'], 1);
  //view fetch
  $viewsql = "SELECT SUM(view) as total_views FROM views WHERE c_id =". $row['c_id'];
  $viewresult = mysqli_query($conn, $viewsql);
  $viewrow = mysqli_fetch_assoc($viewresult);
  $total_views = $viewrow['total_views'];
  ?>
  <div id="ratingnviewdisplay">
    <p style="margin: 0;">RATINGS:</p>
    <button id="ratingnumb"><?php echo $average_rating; ?> STAR</button>
    <p style="margin: 0;">Views:</p>
    <button id="ratingnumb"><?php echo $total_views; ?></button>
  </div>
  <form id="workreq" action="../request/workrequest.php" method="post">
    <input type="hidden" value="<?php echo $row['c_id']?>" name='c_id'>
    <p>Send Work Request:</p>
    <?php 
    $srsql= 'select * from connected where user_id = '.$_SESSION['user_id'].' and c_id = '.$row['c_id'];
    $sresult= mysqli_query($conn,$srsql);
    if(mysqli_num_rows($sresult) === 0){
    ?>
    <button id="req"> Send Request</button>
    <?php }
    else{ ?>
    <button id="req" disabled>Requested....</button>
    <?php }?>

  </form>
<div id="cmnt">
  <p id="cmnth">Comments :</p><form action="../works.php"><button class="cn-btn" style="position: absolute;left: 500px;top: 360px;">Show works</button> <input type="hidden" value="<?php echo $row['c_id']?>" name='c_id'></form>
  <div id="slide-comments">
  <?php 
  $cnmtsql= 'select comment from rating_comment where c_id = '.$row['c_id'];
  $cnmtresult= mysqli_query($conn,$cnmtsql);

  if(mysqli_num_rows($cnmtresult)>0){ 
    $cnmtrow = mysqli_fetch_array($cnmtresult); ?>
    <p><?php echo $cnmtrow['comment']; ?></p>
  <?php }
  else{
    echo '<p>No comments yet</p>';
  } ?>
  </div>
</div>
</div>
<?php }}}?>
<script>
  setTimeout(function(){
    document.getElementById('messbx').style.display = 'none';
  }, 5000);
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
window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var c_id = urlParams.get('c_id');
    if (c_id) {
        showcontactform(c_id);
    }
};
//ajax to insert view asyncronously
$(document).ready(function(){
    $('.get-contact-form').click(function(e){
        e.preventDefault();
        var c_id = $(this).attr('value');
        $.ajax({
            url: '../request/insert_view.php',
            type: 'post',
            data: {
                'get-btn': c_id
            },
            success: function(response) {
                // Handle response from the server
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.error(textStatus, errorThrown);
            }
        });
    });
});
</script>
</body>
</html>