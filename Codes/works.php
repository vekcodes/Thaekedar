<?php
include './utils/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Works</title>
  <?php include 'header.php';?>
</head>
<body>
  <?php
  $c_id = $_GET['c_id']; 
  $sql = "select * from contacts where c_id =". $c_id;
  $sql_run = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($sql_run);
  ?>
  <div id='work-block' style="color:#FFCC00;">
    <img src="<?php echo './'.$row['photo'];?>" alt="cn-img" id="cn-img" style="margin: 20px 10px 0 20%;">
    <div id='works-contacts' style="position: absolute;left: 50%;top: 70px;">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>

      <img src="./photo/Location.png" alt="location" id="location-img">
      <p id="location" style='color:#FFCC00'><?php echo $row['location'];?></p>
    
    <p id="desc"><?php echo $row['description'];?></p>
    
      <p><span id="bold" style='color:#FFCC00'>Email: </span><?php echo $row['email'];?></p>
      <p><span id="bold"style='color:#FFCC00'>Phone no: </span><?php echo $row['phoneno'];?></p>
    
    
      <a href="<?php echo $row['iglink'];?>"><button class="cn-btn">Instagram</button></a>
      <a href="<?php echo $row['fblink'];?>"><button class="cn-btn">Facebook</button></a>
      <a href="<?php echo $row['weblink'];?>"><button class="cn-btn">Website</button></a>
      </div>
      </div>
<h2 id="ag-heading" style="left: 47%;">Works</h2>
<div id='work-center-placement'>
<?php
$wsql = "SELECT works.*, users.name FROM works 
JOIN users ON works.user_id = users.user_id 
WHERE works.c_id = '$c_id'";
$wsql_run = mysqli_query($conn, $wsql);
 
while($wrow = mysqli_fetch_array($wsql_run)){ 
?>
  <div id='work-content'>
    <img src="<?php echo $wrow['photo'];?>" alt="cn-img" id="cn-img" style="margin:0;">
    <div style="width:650px;">
    <h3 id="workedwith">Worked with: <?php echo $wrow['name'];?></h3>
    <h3>Description: <?php echo $wrow['work_desc']?></h3>
    <?php
    $c_id = $wrow['c_id'];
    $user_id = $wrow['user_id'];
    $ratesql = 'select * from rating_comment where c_id = '.$c_id.' and user_id = '.$user_id;
    $rateresult = mysqli_query($conn,$ratesql);
    $rate = mysqli_fetch_assoc($rateresult);
    if($rate && isset($rate['rating']) && isset($rate['comment'])){ ?>
    <h3>Rated: <?php echo $rate['rating']; ?> Star</h3>
    <h3>Comment: <?php echo $rate['comment'];?></h3>
   <?php }else{ ?>
      <h3>Rated: Not Rated By Client</h3>
      <h3>Comment: No Comment By Client</h3>
   <?php }
   $c_id = $wrow['c_id'];
   $user_id = $wrow['user_id'];
   $datesql = 'select * from connected where c_id = '.$c_id.' and user_id = '.$user_id;
   $dateresult = mysqli_query($conn,$datesql);
   $date = mysqli_fetch_assoc($dateresult);
   if($date && isset($date['timestamp']) && isset($date['enddate'])){
    ?>
     <h3>Startdate:<?php echo $date['timestamp'];?> </h3>
     <h3>Enddate: <?php echo $date['enddate'];?> </h3>
   <?php } else{ ?>
      <h3>Startdate:<?php echo $date['timestamp'];?> </h3>
      <h3>Enddate: Inprocess</h3>     
    <?php }?>
  </div>
  </div>
<?php } ?>
</div> 
  <style>
#work-block{
  background-color: #003366;
  padding: 50px;
}
#workedwith{
display: inline-block;
margin: 0;
}
#work-center-placement{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 150px;
}
#work-content{
  background-color: #FFCC00;
  width: 1000px;
  border-radius: 14px;
  height: auto;
  padding: 20px;
  display: flex;
  gap: 70px;
  font-family: 'montserrat';
  margin-top: 20px;
  color: #003366;
}
  </style>
</body>
</html>