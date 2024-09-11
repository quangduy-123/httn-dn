<?php 
	session_start();
	require 'ketnoi.php';
	$mataikhoan=$_POST['TenDN'];
	$tencuahang=$_POST['tencuahang'];
	$sodienthoai=$_POST['sodienthoai'];
	$diachi=$_POST['diachi'];
	$sql="insert into cuahang values ('','".$mataikhoan."','".$tencuahang."','".$sodienthoai."','".$diachi."','1')";
	mysqli_query($ketnoi,$sql);
	echo '<script>
	alert("Thêm tài khoản thành công")
	window.location="nhanvien-add.php"</script>';
 ?>