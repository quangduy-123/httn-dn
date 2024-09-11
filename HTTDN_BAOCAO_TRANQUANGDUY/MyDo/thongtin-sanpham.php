<?php 
	session_start();
	require 'ketnoi.php';
	$MaSP=$_REQUEST['sp'];
	$sql="select * from sanpham where masanpham='".$MaSP."'";
	$result=mysqli_query($ketnoi, $sql);
	$row=mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo '<title>Máy ảnh '.$row['tensanpham'].'</title>'; ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="./css/sanpham.css">
</head>
<body>
	
	<?php 
		require 'mainMenu.php';
	 ?>

	 <div class="container text-center" style="margin-top: 30px;">
		<div class="row text-center">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-4 mb-4">
				<a href="sanpham.php?camera=sony">
					<img id="sony" src="./images/sony.png" alt="Sony">
				</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-4 mb-4">
				<a href="sanpham.php?camera=canon">
					<img id="canon" src="./images/canon.png" alt="Canon">
				</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-4 mb-4">
				<a  href="sanpham.php?camera=nikon">
					<img id="nikon" src="./images/nikon.png" alt="Nikon">
				</a>
			</div>
		</div>
	</div>

	<div class="modal fade show" id="modal-register">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Đăng ký</h3>
					<button type="button" class="close" data-dismiss="modal" data-target="#modal-register">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="xuly-dangky.php" method="post" id="formDangKy" accept-charset="utf-8">
				        <div class="row">
				        	<div class="col">
						        <div class="form-group">
						            <label for="username">Tên đăng nhập</label>
						            <input type="text" name="username" id="username-register" class="form-control" required="">
						        </div>
						    </div>
					    </div>
					    <div class="row">
					    	<div class="col">
						        <div class="form-group">
						            <label for="password">Mật khẩu</label>
						            <input type="password" name="password" id="password-register" class="form-control" required="">
						        </div>
						    </div>
					    </div>
					    <div class="row">
					    	<div class="col">
						        <div class="form-group">
						            <label for="confirmPassword">Nhập lại mật khẩu</label>
						            <input type="password" name="confirmPassword" id="confirmPassword-register" class="form-control" required="">
						            <div id="confirmPassword-nonMatch-feedback" class="invalid-feedback">✖&nbsp;Mật khẩu không trùng khớp.</div>
						        </div>
						    </div>
					    </div>
					    <div class="row">
							<div class="col">
								<p>Đã có tài khoản?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-login" style="color: blue;"> Đăng nhập ngay</a></p>
							</div>
						</div>				
				        <div class="row mt-2">
				        	<div class="col">
						        <button type="submit" id="btnDangKy" class="btn btn-primary float-right" onclick="return register()">Đăng ký</button>
						    </div>
				        </div>
				    </form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function register() {
			$("#confirmPassword-nonMatch-feedback").hide()
			var password = document.getElementById('password-register')
			var confirmPassword = document.getElementById('confirmPassword-register')
			if(confirmPassword.value !== password.value){
				$("#confirmPassword-nonMatch-feedback").show()
				return false
			}		
		}
	</script>

	<div class="modal fade show" id="modal-login">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Đăng nhập</h3>
					<button type="button" class="close" data-dismiss="modal" data-target="#modal-login">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="xuly-dangnhap.php" method="post" accept-charset="utf-8">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="username">Tên đăng nhập</label>
									<input type="text" name="username" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="password">Mật khẩu</label>
									<input type="password" name="password" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<p>Chưa có tài khoản?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-register" style="color: blue;"> Đăng ký ngay</a></p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<button type="submit" class="btn btn-success float-right">Đăng nhập</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid pb-4">
		<div class="row">
			<div class="container" style="background-color: white">
				<div class="row" style="background-color: orange">
					<p class="tenSP"><?php echo $row['tensanpham']; ?></p>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 mt-2">
						<?php echo '<img src="'.$row['hinhanh'].'" alt="" height="100%" width="100%" class="imgs card">'; ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 p-2 thongtin">
						<div class="container card pb-4">
							<div class="row mt-3">
								<div class="col">
									<b>Mã sản phẩm: <?php echo $row['masanpham']; ?></b>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									Tên sản phẩm: <?php echo $row['tensanpham']; ?>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									Số lượng: <?php echo $row['soluong']; ?>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									Nhà sản xuất: <?php echo $row['tennhasanxuat']; ?>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<p class="gia">Giá: <?php echo number_format($row['dongia'],'0',',','.'); ?> VNĐ</p>
								</div>
							</div>
							<div class="row mt-3 border border-primary ml-1 mr-1 pb-3 pt-3">
								<div class="container">
									<form action="" method="post" accept-charset="utf-8">
										<div class="row text-center">
											<div class="col">
												MUA NGAY
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-6">
												<?php
													if(isset($_SESSION['username'])){
														echo '<a href="buy-now.php?SP='.$MaSP.'" class="buy-now">Mua ngay</a>';
													}else{
														echo '<a href="#" class="btn btn-block buy-now button" data-toggle="modal" data-target="#modal-login">mua ngay</a>';
													}
												?>
											</div>
											<div class="col-6">
												<?php
													if(isset($_SESSION['username'])){
														echo '<a href="add-to-cart.php?SP='.$MaSP.'" class="add-to-cart">Thêm vào giỏ</a>';
													}else{
														echo '<a href="#"" class="btn btn-block add-to-cart button" data-toggle="modal" data-target="#modal-login">thêm vào giỏ</a>';
													}
												?>
											</div>
										</div>	
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container pt-4" style="background-color: white">
				<div class="title">
					Thông tin chi tiết
				</div>
				<div class="row">
					<div class="col">
						<div class="container card mb-4">
							<div class="content"><?php echo $row['mota']; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
	<style>
		.tenSP{
			font-size: 28px;
			padding-left: .5rem;
		}
		.imgs{
			padding: auto;
			margin: auto;
		}
		.thongtin{
			font-size: 18px;
		}
		.gia{
			font-size: 20px;
			color: red;
			text-transform: uppercase;
		}
		.title{
			font-size: 28px;
		}
		.content{
			font-size: 18px;
			padding-top: 3px;
			padding-bottom: 3px;
		}
		a,a:hover{
			text-decoration: none;
		}
	</style>

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