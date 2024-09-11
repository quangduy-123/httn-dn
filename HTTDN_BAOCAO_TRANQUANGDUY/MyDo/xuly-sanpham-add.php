<?php
	session_start();
	require 'ketnoi.php';
	$tensp=$_REQUEST['tensp'];
	$soluong=$_REQUEST['soluong'];
	$giatien=$_REQUEST['giatien'];
	$nsx=$_REQUEST['tennhasanxuat'];
	$mota=$_REQUEST['mota'];
	$url="sanpham/";
	$url=$url.basename($_FILES['hinhanh']['name']);
	$file=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($file, $url);

	$sql="insert into sanpham values ('','".$_SESSION['macuahang']."','".$tensp."','".$url."','".$mota."','".$giatien."','".$soluong."','".$nsx."')";
	mysqli_query($ketnoi,$sql);

	$sql="select * from sanpham where tensanpham='".$tensp."'";
	$result=mysqli_query($ketnoi,$sql);
	$row=mysqli_fetch_array($result);
	echo '<script>window.location="sanpham-edit.php?SP='.$row['masanpham'].'"</script>';
?>