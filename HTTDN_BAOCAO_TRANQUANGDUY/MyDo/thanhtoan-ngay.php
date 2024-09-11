<?php 
	session_start();
	require 'ketnoi.php';
	$sql="select * from sanpham where masanpham='".$_SESSION['sanpham-mua']."'";
	$result=mysqli_query($ketnoi,$sql);
	$rest=mysqli_fetch_assoc($result);
	$hoten=$_POST['hoten'];
	$gioitinh=$_POST['gioitinh'];
	$hientai=$rest['soluong'];
	$sdt=$_POST['sdt'];
	$diachi=$_POST['diachi'];
	if($hientai>0){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$NGAYMUA=date('Y-m-d H:i:s');

		$tongdonhang=$_SESSION['dongia-mua'];
		$phivanchuyen=$tongdonhang*0.1;
		$thue=$tongdonhang*0.1;
		$tongthanhtoan=$tongdonhang+$phivanchuyen+$thue;
		//Create hoadon
		$sql="insert into hoadon values('','".$_SESSION['makhachhang']."','".$tongdonhang."','".$phivanchuyen."','".$thue."','".$tongthanhtoan."','".$NGAYMUA."','0')";
		mysqli_query($ketnoi,$sql);

		//GET mahoadon
		$sql="select * from hoadon where ngaytao='".$NGAYMUA."'";
		$result=mysqli_query($ketnoi,$sql);
		$donhang=mysqli_fetch_array($result);

		//CREATE chitiethoadon
		$MASP=$_SESSION['sanpham-mua'];
		$MADH=$donhang['mahoadon'];

		$sql="select * from sanpham where masanpham='".$MASP."'";
		$result=mysqli_query($ketnoi,$sql);
		$sanpham=mysqli_fetch_array($result);
		$DONGIA=$sanpham['dongia'];
		$THANHTIEN=$DONGIA;
		$sql="insert into chitiethoadon values('".$MADH."','".$MASP."','1','".$DONGIA."')";
		mysqli_query($ketnoi,$sql);

		//Add data for DONHANG
		// $sql="select * from giohang where MaDH='".$MADH."'";
		// $result=mysqli_query($ketnoi,$sql);
		// while($row=mysqli_fetch_array($result)){
		// 	@$TONGTT=$TONGTT+$row['ThanhTien'];
		// }

		$sql="update khachhang set tenkhachhang='".$hoten."', gioitinh='".$gioitinh."', sodienthoai='".$sdt."', diachi='".$diachi."'";
		mysqli_query($ketnoi,$sql);

		$sql="insert into deta values('".$MADH."','".$_SESSION['makhachhang']."','".$hoten."','".$gioitinh."','".$sdt."','".$diachi."')";
		mysqli_query($ketnoi,$sql);

		echo '<script>
			alert("Đặt hàng thành công! Vui lòng chờ cửa hàng liên hệ")
			window.location="'.$_SERVER['HTTP_REFERER'].'";
		</script>';
	}else{
		echo '<script>
		window.location="'.$_SERVER['HTTP_REFERER'].'"
		alert("Sản phẩm đã hết hàng")</script>';
	}
	
 ?>