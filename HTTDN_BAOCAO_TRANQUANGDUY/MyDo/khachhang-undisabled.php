<?php 
	session_start();
	require 'ketnoi.php';
	$ID=$_REQUEST['ID'];
	$sql="update taikhoan set TinhTrang='1' where ID='".$ID."'";
	mysqli_query($ketnoi,$sql);
	echo '<script>window.location="khach-all.php"</script>';
 ?>