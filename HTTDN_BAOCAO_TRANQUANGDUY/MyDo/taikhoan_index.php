
<?php 
	if(!isset($_SESSION['role'])){
		echo '<hr id="taikhoan" class="mt-4">
	<div class="container text-center mb-3">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="gold-man display-4 wow animate__bounceInUp" style="text-transform: uppercase;font-size: 250%; text-shadow: 1px 1px 20px;">Đăng ký hoặc đăng nhập</h1>
			</div>
		</div>
		<hr style="width: 10%;">
		<div class="row text-center wow animate__fadeInUp" data-wow-delay="0.5s" style="background-color: #000000; border-radius: 100px;">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 mb-5">
				<button data-toggle="modal" data-target="#modal-register" id="openRegisterModal" class="container btn btn-outline-primary wow animate__bounceIn" data-wow-delay="1s" style="border-radius: 20px; width: 60%;">
					<p class="auto-fill">Đăng ký một lần,<br>sử dụng mãi mãi.</p>
				</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 mb-5">
				<button data-toggle="modal" data-target="#modal-login" id="openLoginModal" class="container btn btn-outline-success wow animate__bounceIn" data-wow-delay="1.5s" style="border-radius: 20px; width: 60%;">
					<p class="auto-fill">Đăng nhập để<br>vào tài khoản của bạn.</p>
				</button>
			</div>
		</div>
	</div>';
	}
 ?>
