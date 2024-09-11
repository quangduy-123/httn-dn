<?php 
	session_start();
	include 'ketnoi.php';
	$soluong=$_REQUEST['soluong'];
	$gia=$_REQUEST['gia'];
	$mota=$_REQUEST['mota'];
	$sql="update sanpham set soluong='".$soluong."', dongia='".$gia."', mota='".$mota."' where masanpham='".$_SESSION['masanpham']."'";
	mysqli_query($ketnoi,$sql);
	echo '<script>alert("Thay đổi thành công")
	window.location="sanpham-edit.php?SP='.$_SESSION['masanpham'].'"</script>';
 ?>