<?php
session_start();
require 'ketnoi.php';
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select * from taikhoan where tentaikhoan='" . $username . "'";
	$result = mysqli_query($ketnoi, $sql);
	if (mysqli_fetch_array($result)) {
		echo '<script>alert("Tên đăng nhập đã tồn tại")
			window.location="index.php"</script>';
	} else {
		$sql = "select * from taikhoan where email='" . $email . "'";
		$result = mysqli_query($ketnoi, $sql);
		if (mysqli_fetch_array($result)) {
			echo '<script>alert("Email đã tồn tại")
				window.location="index.php"</script>';
		}
		//
		else {
			$sql = "insert into taikhoan values('','" . $username . "','" . $email . "','" . $password . "',1)";
			mysqli_query($ketnoi, $sql);
			$sql = "select * from taikhoan where tentaikhoan='" . $username . "'";

			$result = mysqli_query($ketnoi, $sql);
			$row = mysqli_fetch_assoc($result);
			$id = $row['mataikhoan'];

			$sql = "insert into khachhang values('','" . $id . "',NULL,NULL,NULL,NULL)";
			mysqli_query($ketnoi, $sql);

			$sql = "select * from khachhang where mataikhoan='" . $id . "'";
			$row = mysqli_fetch_array(mysqli_query($ketnoi, $sql));

			$_SESSION['makhachhang']=$row['makhachhang'];
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "user";
			$_SESSION['id'] = $id;
			echo '<script>
				alert("Đăng ký thành công")
				window.location="thongtin-canhan.php"</script>';
		}
	}
} else {
	echo '<script>
		window.location="index.php"</script>';
}
