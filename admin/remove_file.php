<?php
	require_once 'conn.php';
	$store_id = $_GET['store_id'];
	$cekid = $conn->query("SELECT * FROM storage WHERE store_id='$store_id'");
    if($cekid->num_rows >= 1){
        $remove_file = $conn->query("DELETE FROM storage WHERE store_id='$store_id'");
        if($remove_file){
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>location = 'pegawai_profile.php';</script>";
        }else{
            echo "<script>alert('Data gagal terhapus!');</script>";
            echo "<script>location = 'pegawai_profile.php';</script>";
        }
    }
?>