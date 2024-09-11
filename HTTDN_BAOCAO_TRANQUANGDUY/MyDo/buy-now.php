<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mua hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		require 'ketnoi.php';
		require 'mainMenu.php';
		$MaSP=$_REQUEST['SP'];
		$sql="select * from sanpham where masanpham='".$MaSP."'";
		$result=mysqli_query($ketnoi,$sql);
		$sanpham=mysqli_fetch_array($result);
		$_SESSION['sanpham-mua']=$MaSP;
		$_SESSION['dongia-mua']=$sanpham['dongia'];
		$sql="select * from khachhang where makhachhang='".$_SESSION['makhachhang']."'";
		$result=mysqli_query($ketnoi,$sql);
		$khachhang=mysqli_fetch_array($result);
		$gioitinh=$khachhang['gioitinh'];
	 ?>

	 <div class="container-fluid mt-5 pt-3 pb-3" style="background-color: white">
	 	<div class="container card">
	 		<div class="row">
	 			<div class="col">
	 				<div class="container pt-2">
	 					<div class="text-center">
				 			<h4>Xác nhận mua hàng</h4>	 				
				 		</div>
	 				</div>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="col">
			 		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alert-buynow">
					 	Xem tất cả các đơn hàng của bạn <a href="hoadon-all.php" class="alert-link" target="_blank">tại đây.</a>
					 	<button type="button" class="close" data-dismiss="alert">
					 		<span>&times;</span>
					 	</button>
					 </div>
				</div>
			</div>
	 		<div class="row p-4">
	 			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-3">
	 				<div class="container card">
	 					<div class="text-center mt-2">
	 						<h5>Thông tin sản phẩm</h5>
	 					</div>
	 					<div class="container card mt-3 mb-3">
	 						<?php 
		 						echo '<img src="'.$sanpham['hinhanh'].'" alt="" height="100%" width="100%">';
		 					 ?>
	 					</div>
	 					<div class="container mb-3">
	 						<table border="1" width="100%">
	 							<tr>
	 								<td>
	 									<b>Mã sản phẩm: </b>
	 								</td>
	 								<td>
	 									<b><?php echo $sanpham['masanpham']; ?></b>
	 								</td>
	 							</tr>
	 							<tr>
	 								<td>
	 									Tên sản phẩm: 
	 								</td>
	 								<td>
	 									<?php echo $sanpham['tensanpham']; ?>
	 								</td>
	 							</tr>
	 							<tr>
	 								<td>
	 									Số lượng mua: 
	 								</td>
	 								<td>
	 									1
	 								</td>
	 							</tr>
	 							<tr>
	 								<td>
	 									<p style="font-size: 130%; color: red;">Giá tiền: </p>
	 								</td>
	 								<td>
	 									<p style="font-size: 130%; color: red;"><?php echo number_format($sanpham['dongia'],'0',',','.'); ?></p>
	 								</td>
	 							</tr>
	 						</table>
	 					</div>
	 				</div>
	 			</div>
	 			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-3">
	 				<div class="container card">
	 					<div class="text-center mt-2">
	 						<h5>Thông tin của bạn</h5>
	 					</div>
	 					<form action="thanhtoan-ngay.php" method="post" accept-charset="utf-8" class="mb-2">
	 						<div class="row">
	 							<div class="col">
	 								<div class="form-group">
	 									<label for="hoten">Họ và tên</label>
	 									<input type="text" name="hoten" placeholder="Họ tên" required="" class="form-control" value="<?php echo $khachhang['tenkhachhang'] ?>">
	 								</div>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col">
	 								<div class="form-group">
	 									<label for="gioitinh">Giới tính</label>
	 									<div>
				 							<?php if($gioitinh=="Nữ"){ ?>
				 								<div>
				 									<input type="radio" name="gioitinh" value="Nam">
				 									<label for="gioitinh">Nam</label>
				 								</div>
				 								<div>
				 									<input type="radio" name="gioitinh" value="Nữ" checked="">
				 									<label for="gioitinh">Nữ</label>
				 								</div>
				 							<?php }else{ ?>
				 								<div>
				 									<input type="radio" name="gioitinh" value="Nam" checked="">
				 									<label for="gioitinh">Nam</label>
				 								</div>
				 								<div>
				 									<input type="radio" name="gioitinh" value="Nữ">
				 									<label for="gioitinh">Nữ</label>
				 								</div>
				 							<?php } ?>
		 								</div>
	 								</div>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col">
	 								<div class="form-group">
	 									<label for="sdt">Số điện thoại</label>
	 									<input type="text" name="sdt" placeholder="Số điện thoại" required="" id="sdtID" class="form-control" value="<?php echo $khachhang['sodienthoai'] ?>">
	 									<div class="invalid-feedback" id="sdt-feedback">✖&nbsp; Số điện thoại không hợp lệ.</div>
	 								</div>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col">
	 								<div class="form-group">
	 									<label for="diachi">Địa chỉ</label>
	 									<textarea name="diachi" required="" class="form-control" rows="5"><?php echo $khachhang['diachi']; ?></textarea>
	 								</div>
	 							</div>
	 						</div>
	 				</div>
	 						<div class="row mt-5">
	 							<div class="col text-center">
	 								<button type="submit" class="btn btn-primary" onclick="return checkData()">MUA NGAY</button>
	 							</div>
	 						</div>
	 					</form>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 
	 <script>
		function checkData() {
			$("#sdt-feedback").hide()
			var sdt=document.getElementById('sdtID');
			if(isNaN(sdt.value) || sdt.value.length!=10){
				$("#sdt-feedback").show();
				return false;
			}
		}
	</script>

	 <?php require 'footer.php'; ?>
	 
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
    	var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
				document.getElementById("navbar").style.top = "0";
			} else {
				document.getElementById("navbar").style.top = "-60px";
			}
			prevScrollpos = currentScrollPos;
		}
    </script>
</body>
</html>