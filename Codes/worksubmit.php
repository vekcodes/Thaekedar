<?php
include './utils/db_connect.php';

if(isset($_POST['submit-work'])){
$c_id = $_POST['c_id'];
$user_id = $_POST['workedwith'];
$w_description = $_POST['w_description'];

//moving photo to folder and $dst to link in db process
$file = $_FILES['work_photo']['name'];
// echo "<pre>";
// 	print_r($_FILES);
// die();
$dst ="./work_img/.$file";
$dst_db ="work_img/.$file";
move_uploaded_file($_FILES['work_photo']['tmp_name'],$dst);

$check_sql = "SELECT * FROM works WHERE c_id = '$c_id' AND user_id = '$user_id'";
$check_result = mysqli_query($conn, $check_sql);
$num_rows = mysqli_num_rows($check_result);

if($num_rows > 0){
	header("Location: ./addworks.php?message=cannot add work twice");
}
else{
	$sql = "insert into works(user_id,c_id,work_desc,photo)values('$user_id','$c_id','$w_description','$dst')";
	$result = mysqli_query($conn,$sql);
	if($result){
		header("Location: ./addworks.php?message=Successfully added work");
	}else{
		header("Location: ./addworks.php?message=Try Again");
	}
}
}