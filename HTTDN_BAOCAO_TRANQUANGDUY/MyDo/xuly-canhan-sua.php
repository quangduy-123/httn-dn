<?php 
	session_start();
	include 'ketnoi.php';
	$hoten=$_POST['hoTen'];
	$gioitinh=$_POST['gioiTinh'];
	$sdt=$_POST['sdt'];
	$diachi=$_POST['diaChi'];
	$sql="update khachhang set tenkhachhang='".$hoten."', gioitinh='".$gioitinh."', sodienthoai='".$sdt."', diachi='".$diachi."' where makhachhang='".$_SESSION['makhachhang']."'";
	mysqli_query($ketnoi,$sql);
	echo '<script>
	window.location="thongtin-canhan.php"</script>';
 ?>