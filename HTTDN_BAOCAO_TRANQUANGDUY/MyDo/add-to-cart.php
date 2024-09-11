<?php
session_start();
require 'ketnoi.php';
$MaSP = $_REQUEST['SP'];
$ID = $_SESSION['makhachhang'];
// $MaGH = $ID . $MaSP;

//Tìm xem giỏ hàng đã tồn tại chưa. Nếu chưa thì thêm mới, rồi thì cộng số lượng
$sql = "select * from giohang where makhachhang='" . $ID . "' and masanpham='" . $MaSP . "'";
$result = mysqli_query($ketnoi, $sql);

//Giỏ hàng đã tồn tại và chưa được thanh toán.
if (mysqli_num_rows($result) != 0) {
	$giohang = mysqli_fetch_assoc($result);
	$SoLuong = $giohang['soluong'];
	$SoLuong = $SoLuong + 1;

	$sql = "select * from sanpham where masanpham='" . $MaSP . "'";
	$result = mysqli_query($ketnoi, $sql);
	$sanpham = mysqli_fetch_array($result);
	$GiaTien = $sanpham['dongia'];

	$sql = "update giohang set soluong='" . $SoLuong . "', dongia='" . $GiaTien . "' where makhachhang='" . $ID . "' and masanpham='" . $MaSP . "'";
	mysqli_query($ketnoi, $sql);

	echo '<script>
			alert("Thêm sản phẩm vào giỏ hàng thành công!")
			window.location="' . $_SERVER['HTTP_REFERER'] . '";
		</script>';
} else {
	//Giỏ hàng chưa tồn tại
	$sql = "select * from sanpham where masanpham='" . $MaSP . "'";
	$result = mysqli_query($ketnoi, $sql);
	$sanpham = mysqli_fetch_array($result);
	$GiaTien = $sanpham['dongia'];

	$sql = "insert into giohang values('" . $ID . "','" . $MaSP . "','1','" . $sanpham['dongia'] . "')";
	mysqli_query($ketnoi, $sql);

	echo '<script>
			alert("Thêm sản phẩm vào giỏ hàng thành công!")
			window.location="' . $_SERVER['HTTP_REFERER'] . '";
		</script>';
}
