<?php session_start(); @$search_content=$_POST['search']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Máy ảnh số</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/animate.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

	<?php require 'mainMenu.php'; ?>

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
								<p>Đã có tài khoản?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-login"> Đăng nhập ngay</a></p>
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
								<p>Chưa có tài khoản?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-register"> Đăng ký ngay</a></p>
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

	<?php 
		//Kết nối db
		$ketnoi=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($ketnoi,"mydo");
		mysqli_query($ketnoi,"SET NAMES 'utf8'");
		$sql="select * from sanpham where tensanpham like '%".$search_content."%'";
		$result=mysqli_query($ketnoi,$sql) or die (mysqli_error($ketnoi));
		$num=mysqli_num_rows($result) or die (mysqli_error($ketnoi));
		if($num!=0){
		//Số sản phẩm trên một page
		echo '<hr>';
			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col-12 text-center">';
						echo '<h1 class="display-4" style="font-size: 250%;">Tìm thấy '.$num.' kết quả cho "'.$search_content.'".</h1>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="container-fluid">';
				echo '<div class="container" style="background-color: white;">';
				echo '<div class="row pt-3">';

				//Định nghĩa cho hàm LIMIT của SQL
				$sql="select * from sanpham where tensanpham like '%".$search_content."%'";
				$result=mysqli_query($ketnoi,$sql);

				//Hiển thị sản phẩm
				while($row=mysqli_fetch_array($result)){
					echo '<div class="card block wow animate__fadeIn">';
						echo '<a href="thongtin-sanpham.php?sp='.$row['masanpham'].'">';
							echo '<div class="imgg">';
								echo '<img src="'.$row['hinhanh'].'" alt="" class="imggs">';
							echo '</div>';
							echo '<div class="namee">';
								echo $row['tensanpham'];
							echo '</div>';
							echo '<div class="price">';
								echo number_format($row['dongia'],'0',',','.');
							echo '</div>';
						echo '</a>';
						if(isset($_SESSION['username'])){
							echo '<div>';
								echo '<a href="buy-now.php?SP='.$row['masanpham'].'" class="btn btn-block buy-now button">mua ngay</a>';
							echo '</div>';
							echo '<div>';
								echo '<a href="add-to-cart.php?SP='.$row["masanpham"].'" class="btn btn-block add-to-cart button">thêm vào giỏ</a>';
							echo '</div>';
						}else{
							echo '<div>';
								echo '<a href="#" class="btn btn-block buy-now button" data-toggle="modal" data-target="#modal-login">mua ngay</a>';
							echo '</div>';
							echo '<div>';
								echo '<a href="#"" class="btn btn-block add-to-cart button" data-toggle="modal" data-target="#modal-login">thêm vào giỏ</a>';
							echo '</div>';
						}
					echo '</div>';			
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
		}else{
			echo '<div class="row">';
				echo '<div class="col-12 text-center">';
					echo '<h1 class="display-4" style="font-size: 250%;">Không tìm thấy kết quả nào cho "'.$search_content.'".</h1>';
				echo '</div>';
			echo '</div>';
		}
		
	 ?>

	<div class="modal fade show" id="modal-login">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Mua sản phẩm</h3>
					<button type="button" class="close" data-dismiss="modal" data-target="#modal-buy">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				</div>
			</div>
		</div>
	</div>

	
<?php require 'footer.php'; ?>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script>
    	new WOW().init();
    </script>
    
   <!-- 1440 -->
<style>
	@media only screen and (min-width: 1024px) and (max-width: 1440px){
		.block{
			display: block;
			width: 20%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
			border: 1px solid orange;
		}
		.imgg{
			width: 100%;
			height: 200px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 60%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 11%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 20px;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
<style>
	#sort{
		margin-left: .5rem;
	}
</style>

<style>
	@media only screen and (min-width: 1440px) and (max-width: 1920px){
		.block{
			display: block;
			width: 20%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
			border: 1px solid orange;
		}
		.imgg{
			width: 100%;
			height: 200px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 60%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 11%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 20px;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

    <!-- 1440 -->
<style>
	@media only screen and (min-width: 1024px) and (max-width: 1440px){
		.block{
			display: block;
			width: 20%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
			border: 1px solid orange;
		}
		.imgg{
			width: 100%;
			height: 200px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 60%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 11%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 20px;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 320 -->
<style>
	@media only screen and (min-width: 260px) and (max-width: 320px){
		.block{
			display: block;
			width: 40%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 1.125rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		/*a,a:hover{
			text-decoration: none;
			color: inherit;
		}*/
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 120px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 15px;
			margin-bottom: 150%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 15%;
			margin-bottom: 50%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 15px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 14px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 15%;
			bottom: 15%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 14px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 375 -->
<style>
	@media only screen and (min-width: 320px) and (max-width: 375px){
		.block{
			display: block;
			width: 42.5%;
			height: auto;
			margin: .7rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 120px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 15px;
			margin-bottom: 15%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 0;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 15px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 425 -->
<style>
	@media only screen and (min-width: 375px) and (max-width: 425px){
		.block{
			display: block;
			width: 40%;
			height: auto;
			margin: .7rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 150px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 16px;
			margin-bottom: 80%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 5%;
			margin-bottom: 50%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 18px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 768 -->
<style>
	@media only screen and (min-width: 425px) and (max-width: 768px){
		.block{
			display: block;
			width: 25%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: .7rem;
			margin-left: 1.5rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 150px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 100%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 10%;
			margin-bottom: 320%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size:20px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 1024 -->
<style>
	@media only screen and (min-width: 768px) and (max-width: 1024px){
		.block{
			display: block;
			width: 25%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3.5rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 220px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 24px;
			margin-bottom: 70%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 0;
			right: 5px;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 26px;
			bottom: 10%;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 8%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>
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