<?php

include 'db_connect.php';

if($_SERVER['REQUEST_METHOD']=== 'POST'){
$designation = $_POST['designation'];
$name = $_POST['name'];
$location = $_POST['location'];
$phoneno = $_POST['phoneno'];
$description = $_POST['description'];
$email = $_POST['email'];
$iglink = $_POST['iglink'];
$fblink = $_POST['fblink'];
$weblink = $_POST['weblink'];

// //photo upload
// echo "<pre>";
// 	print_r($_FILES['photo']);
// 	echo "</pre>";

	$img_name = $_FILES['photo']['name'];
	$img_size = $_FILES['photo']['size'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$error = $_FILES['photo']['error'];

			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'user_image/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO contacts(photo,designation,name,location,phoneno,email,description,iglink,fblink,weblink) VALUES('$new_img_name',$designation,$name,$location,$phoneno,$email,$description,$iglink,$fblink,$weblink)";
				$result = mysqli_query($conn, $sql);
        if($result){
				header("Location: index.php");
        }
			}
}
?>