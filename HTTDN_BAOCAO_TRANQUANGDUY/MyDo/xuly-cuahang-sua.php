<?php 
	session_start();
	include 'ketnoi.php';
	$tencuahang=$_POST['tencuahang'];
	$sdt=$_POST['sdt'];
	$diachi=$_POST['diaChi'];
	$sql="update cuahang set tencuahang='".$tencuahang."', sodienthoai='".$sdt."', diachi='".$diachi."' where macuahang='".$_SESSION['macuahang']."'";
	mysqli_query($ketnoi,$sql);
	echo '<script>
	window.location="thongtin-cuahang.php"</script>';
 ?>