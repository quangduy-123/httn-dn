<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" id="navbar">
	<div class="container-fluid">
		<a href="index.php" style="text-decoration: none; color: black;">
			<span>
				<img src="./logo.jpg" height="40" width="80" alt="">
			</span>
		</a>
		<form action="sanpham-elite.php" method="post" accept-charset="utf-8" class="ml-3">
			<span>
				<input type="text" name="search" placeholder="Tìm kiếm" id="searchID">
				<button type="submit" onclick="return check()">
					<i class="fa fa-search"></i>
				</button>
			</span>
		</form>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse text-center" id="navbarResponsive">
			<ul class="ml-auto navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Trang Chủ</a>
				</li>	
				<li class="nav-item">
					<a class="nav-link" href="index.php#gioithieu">Giới Thiệu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="sanpham.php">Sản Phẩm</a>
				</li>
				<?php 
					if(!isset($_SESSION['role'])){
						echo '<li class="nav-item">
						<a class="nav-link" href="index.php#taikhoan">Tài Khoản</a>
						</li>';
					}else if($_SESSION['role']=="user"){
						echo '<li class="nav-item">
						<a class="nav-link" href="show-giohang.php">&#x1f6d2;</a>
						</li>';
						echo '<li class="nav-item">
						<a class="nav-link" href="thongtin-canhan.php">'.$_SESSION['username'].'</a>
						</li>';
						echo '<li class="nav-item">
						<a class="nav-link" href="xuly-dangxuat.php"><i class="fa fa-sign-out" style="font-size: 24px;"></i></a>
						</li>';
					}else{
						echo '<li class="nav-item">
						<a class="nav-link" href="matkhau.php">'.$_SESSION['username'].'</a>
						</li>';
						echo '<li class="nav-item">
						<a class="nav-link" href="xuly-dangxuat.php"><i class="fa fa-sign-out" style="font-size: 24px;"></i></a>
						</li>';
					}
				 ?>
				 <!-- <li class="nav-item">
					<div class="row nav-link">
						<div class="col">
							<form action="sanpham-elite.php" method="post" accept-charset="utf-8">
									<input type="text" name="search" placeholder="Tìm kiếm" id="searchID">
									<button type="submit" onclick="return check()">
										<i class="fa fa-search"></i>
									</button>
							</form>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
	</div>
</nav>
<style>
	@media only screen and (max-width: 320px) {
		input{
			width: 100px;
		}
	}
	@media only screen and (min-width: 320px) and (max-width: 375px) {
		input{
			width: 100px;
		}
	}
	@media only screen and(min-width: 375px) and (max-width: 425px) {
		input{
			
		}
	}
	@media only screen and(min-width: 425px) and (max-width: 768px) {
		input{
			
		}
	}
	@media only screen and (min-width: 768px) and (max-width: 1024px) {
		input{
			
		}
	}
	@media only screen and (min-width: 2014px) and (max-width: 1440px) {
		input{
			
		}
	}
	button{
		background-color: transparent;
		border:none;
	}
	input{
		border: 1px;
	}
</style>

<script>
	function check() {
		var s=document.getElementById('searchID');
		if(s.value==="" || s.value===" "){
			alert("Không có gì để tìm");
			return false;
		}
	}
</script>