<?php

include 'db_connect.php';

if(isset($_POST['ca_submit'])){
$designation = $_POST['designation'];
$cname = $_POST['name'];
$location = $_POST['location'];
$phoneno = $_POST['phoneno'];
$description = $_POST['description'];
$email = $_POST['email'];
$iglink = $_POST['iglink'];
$fblink = $_POST['fblink'];
$weblink = $_POST['weblink'];

//moving photo to folder and $dst to link in db process
$file = $_FILES['photo']['name'];
$dst ="./user_image/.$file";
$dst_db ="user_image/.$file";
move_uploaded_file($_FILES['photo']['tmp_name'],$dst);

//moving document to folder and $dst to link in db process
$file_docx = $_FILES['docx']['name'];
$dst_docx ="./user_docx/.$file_docx";
$dst_db_docx ="user_docx/.$file_docx";
move_uploaded_file($_FILES['docx']['tmp_name'],$dst_docx);

$sql = "insert into contacts(designation,name,location,phoneno,email,description,iglink,fblink,weblink,photo,document)values('$designation','$cname','$location','$phoneno','$email','$description','$iglink','$fblink','$weblink','$dst','$dst_docx')";

$result = mysqli_query($conn,$sql);

if($result){
	header("Location: contactregister.php?message=Successfully Submitted");
}else{
	header("Location: contactregister.php?message=Try Again");
}
}
?>