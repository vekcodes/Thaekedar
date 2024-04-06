<?php
include ('../utils/db_connect.php');

if(isset($_POST['submit-work'])){
$c_id = $_POST['c_id'];
$user_id = $_POST['workedwith'];
$w_description = $_POST['w_description'];

//moving photo to folder and $dst to link in db process
$file = $_FILES['photo']['name'];
$dst ="./user_image/.$file";
$dst_db ="user_image/.$file";
move_uploaded_file($_FILES['photo']['tmp_name'],$dst);

$sql = "insert into works(user_id,c_id,work_desc,photo)values('$user_id','$c_id','$w_description','$dst')";

$result = mysqli_query($conn,$sql);


if($result){
	header("Location: ../addworks.php?message=Successfully added work");
}else{
	header("Location: ../addworks.php?message=Try Again");
}
}
?>