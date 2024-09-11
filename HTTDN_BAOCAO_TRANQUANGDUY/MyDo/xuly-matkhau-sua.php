<?php 
	session_start();
	include 'ketnoi.php';
	$currentP=$_POST['currentPassword'];
	$confirm=$_POST['confirmNewPassword'];
	if($_SESSION['role']=="user"){
		$sql="select matkhau from taikhoan where tentaikhoan='".$_SESSION['username']."'";
		$result=mysqli_query($ketnoi,$sql);
		$row=mysqli_fetch_assoc($result);
		$pasFromDB=$row['matkhau'];
		if($currentP===$pasFromDB){
			$sql="update taikhoan set matkhau='".$confirm."' where tentaikhoan='".$_SESSION['username']."'";
			mysqli_query($ketnoi,$sql);
			echo '<script>
			alert("Đổi mật khẩu thành công")
			window.location="matkhau.php"</script>';
		}else{
			echo '<script>
			alert("Mật khẩu hiện tại không chính xác")
			window.location="matkhau.php"</script>';
		}
	}else if($_SESSION['role']=="admin"){
		$sql="select passadmin from admin where useradmin='".$_SESSION['username']."'";
		$result=mysqli_query($ketnoi,$sql);
		$row=mysqli_fetch_assoc($result);
		$pasFromDB=$row['passadmin'];
		if($currentP==$pasFromDB){
			$sql="update admin set passadmin='".$confirm."' where useradmin='".$_SESSION['username']."'";
			mysqli_query($ketnoi,$sql);
			echo '<script>
			alert("Đổi mật khẩu thành công")
			window.location="matkhau.php"</script>';
		}else{
			echo '<script>
			alert("Mật khẩu hiện tại không chính xác")
			window.location="matkhau.php"</script>';
		}
	}
		// else if($_SESSION['role']="nhanvien"){
	// 	$sql="select MatKhau from nhanvien where TenDN='".$_SESSION['username']."'";
	// 	$result=mysqli_query($ketnoi,$sql);
	// 	$row=mysqli_fetch_assoc($result);
	// 	$pasFromDB=$row['MatKhau'];
	// 	if($currentP===$pasFromDB){
	// 		$sql="update nhanvien set MatKhau='".$confirm."' where TenDN='".$_SESSION['username']."'";
	// 		mysqli_query($ketnoi,$sql);
	// 		echo '<script>
	// 		alert("Đổi mật khẩu thành công")
	// 		window.location="matkhau.php"</script>';
	// 	}else{
	// 		echo '<script>
	// 		alert("Mật khẩu hiện tại không chính xác")
	// 		window.location="matkhau.php"</script>';
	// 	}
		
	// }
	

 ?>