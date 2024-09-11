<?php 
	session_start();
	require 'ketnoi.php';
	$TenDN=$_REQUEST['TenDN'];
	$sql="update cuahang set tinhtrang='1' where macuahang='".$TenDN."'";
	mysqli_query($ketnoi,$sql);
	echo '<script>window.location="nhanvien-all.php"</script>';
 ?>