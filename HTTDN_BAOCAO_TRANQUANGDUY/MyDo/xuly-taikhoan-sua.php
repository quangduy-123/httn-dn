<?php 
	session_start();
	include 'ketnoi.php';
	$tenHienThi=$_POST['tenHienThi'];
	if($_FILES['newAvatar']['name']!="" && $tenHienThi!=""){
		$url="HinhDaiDien/";
		$url=$url.basename($_FILES['newAvatar']['name']);
		$file=$_FILES['newAvatar']['tmp_name'];
		move_uploaded_file($file,$url);
		$sql="update taikhoan set TenHienThi='".$tenHienThi."', HinhDaiDien='".$url."' where TenDN='".$_SESSION['username']."'";
		mysqli_query($ketnoi,$sql);
		echo '<script>
		window.location="trangcanhan.php"</script>';
	}else if($_FILES['newAvatar']['name']=="" && $tenHienThi!=""){
		$sql="update taikhoan set TenHienThi='".$tenHienThi."' where TenDN='".$_SESSION['username']."'";
		mysqli_query($ketnoi,$sql);
		echo '<script>
		window.location="trangcanhan.php"</script>';
	}else if($_FILES['newAvatar']['name']!="" && $tenHienThi==""){
		$url="HinhDaiDien/";
		$url=$url.basename($_FILES['newAvatar']['name']);
		$file=$_FILES['newAvatar']['tmp_name'];
		move_uploaded_file($file,$url);
		$sql="update taikhoan set HinhDaiDien='".$url."' where TenDN='".$_SESSION['username']."'";
		mysqli_query($ketnoi,$sql);
		echo '<script>
		window.location="trangcanhan.php"</script>';
	}
 ?>