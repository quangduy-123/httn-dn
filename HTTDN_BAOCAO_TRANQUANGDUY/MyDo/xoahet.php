<?php
	session_start();
	require 'ketnoi.php';
	$MaKH=$_REQUEST['makhachhang'];
	$MaSP=$_REQUEST['masanpham'];
	$sql="delete from giohang where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
	mysqli_query($ketnoi,$sql) or die(mysqli_error($ketnoi));
	echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
?>