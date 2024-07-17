<?php
	require_once 'conn.php';
	if(ISSET($_POST['save'])){
		date_default_timezone_set("	Asia/Kolkata");
		$stud_no = $_POST['stud_no'];
		$nama = $_POST['nama'];
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files/".$stud_no."/".$file_name;
		$date = date("jS M, Y");
		if(move_uploaded_file($file_temp, '../files/'.$file_name)){
			mysqli_query($conn, "INSERT INTO `storage` VALUES('', '$nama', '$file_name', '$file_type', '$date', '$stud_no')") or die(mysqli_error());
			header('location: pegawai_profile.php');
		}
	}
?>