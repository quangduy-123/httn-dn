<?php
	session_start();
	require 'ketnoi.php';
	$MaKH=$_REQUEST['makhachhang'];
	$MaSP=$_REQUEST['masanpham'];
	$sql="select * from giohang where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
	$result=mysqli_query($ketnoi,$sql);
	$giohang=mysqli_fetch_array($result);
	if($giohang['soluong']==1){
		$sql="delete from giohang where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
		mysqli_query($ketnoi,$sql);
		echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}else{
		$moi=$giohang['soluong']-1;
		$sql="update giohang set soluong='".$moi."' where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
		mysqli_query($ketnoi,$sql);
		echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}
?>