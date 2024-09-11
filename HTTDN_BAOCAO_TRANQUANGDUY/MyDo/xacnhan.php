<?php 
	session_start();
	require 'ketnoi.php';
	$MaDH=$_REQUEST['d'];

	$sql="select * from chitiethoadon where mahoadon='".$MaDH."'";
	$result=mysqli_query($ketnoi,$sql);
	$hoadon=mysqli_fetch_array($result);


	$sql="select * from sanpham where masanpham='".$hoadon['masanpham']."'";
	$result=mysqli_query($ketnoi,$sql);
	$sanpham=mysqli_fetch_assoc($result);
	$SoLuong=$sanpham['soluong'];

	if($SoLuong>0){
		$sql="update hoadon set XACNHAN='1' where mahoadon='".$MaDH."'";
		mysqli_query($ketnoi,$sql);

		$SoLuong=$SoLuong-1;

		$sql="update sanpham set soluong='".$SoLuong."' where masanpham='".$sanpham['masanpham']."'";
		mysqli_query($ketnoi,$sql);

		echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}else{
		echo '<script>
		Alert("Sản phẩm đã hết hàng!")
		window.location="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}

	
 ?>