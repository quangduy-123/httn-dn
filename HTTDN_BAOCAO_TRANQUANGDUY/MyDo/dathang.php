<?php
	session_start();
	require 'ketnoi.php';
	$MaKH=$_REQUEST['makhachhang'];
	$MaSP=$_REQUEST['masanpham'];
	$soluong_giohang=$_REQUEST['soluong'];

	$sql="select * from giohang where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
	$result=mysqli_query($ketnoi,$sql);
	$giohang=mysqli_fetch_array($result);

	$sql="select * from sanpham where masanpham='".$giohang['masanpham']."'";
	$result=mysqli_query($ketnoi,$sql);
	$sanpham=mysqli_fetch_array($result);
	$soluong_sanpham=$sanpham['soluong'];

	if($soluong_sanpham<$soluong_giohang){
		echo '<script>
		alert("Số lượng sản phẩm còn lại ít hơn số lượng trong giỏ hàng. Vui lòng kiểm tra lại !")
		window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}else{
		$MaSP=$giohang['masanpham'];
		$DonGia=$giohang['dongia'];
		$SoLuong=$giohang['soluong'];
		$ThanhTien=$DonGia*$SoLuong;

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$NGAYMUA=date('Y-m-d H:i:s');

		//Create DONHANG
		$vanchuyen=$ThanhTien*0.1;
		$thue=$vanchuyen;
		$tongthanhtoan=$ThanhTien+$vanchuyen+$thue;

		$sql="insert into hoadon values('','".$MaKH."','".$ThanhTien."','".$vanchuyen."','".$thue."','".$tongthanhtoan."','".$NGAYMUA."','')";
		mysqli_query($ketnoi,$sql);

		//GET MADH
		$sql="select * from hoadon where ngaytao='".$NGAYMUA."'";
		$result=mysqli_query($ketnoi,$sql);
		$hoadon=mysqli_fetch_array($result);

		$sql="insert into chitiethoadon values('".$hoadon['mahoadon']."','".$MaSP."','".$SoLuong."','".$DonGia."')";
		mysqli_query($ketnoi,$sql);

		$sql="delete from giohang where makhachhang='".$MaKH."' and masanpham='".$MaSP."'";
		mysqli_query($ketnoi,$sql);

		// $MaGH.=$donhang['MaDH'];

		// $sql="insert into giohang values('".$MaGH."','".$_SESSION['id']."','".$donhang['MaDH']."','".$sanpham['MaSP']."','".$sanpham['GiaTien']."','".$SoLuong."','".$ThanhTien."')" or die(mysqli_error($ketnoi));
		// mysqli_query($ketnoi,$sql) or die(mysqli_error($ketnoi));

		$sql="select * from khachhang where makhachhang='".$_SESSION['makhachhang']."'";
		$result=mysqli_query($ketnoi,$sql);
		$khachhang=mysqli_fetch_array($result);

		$sql="insert into deta values('".$hoadon['mahoadon']."','".$_SESSION['makhachhang']."','".$khachhang['tenkhachhang']."','".$khachhang['gioitinh']."','".$khachhang['sodienthoai']."','".$khachhang['diachi']."')";
		mysqli_query($ketnoi,$sql);

		echo '<script>
			alert("Đặt hàng thành công! Vui lòng chờ cửa hàng liên hệ")
			window.location="'.$_SERVER['HTTP_REFERER'].'";
		</script>';
	}
?>