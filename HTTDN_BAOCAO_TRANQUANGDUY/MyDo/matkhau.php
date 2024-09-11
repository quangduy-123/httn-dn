<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo '<title>Tường của '.$_SESSION['username'].'</title>'; ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="./css/trangcanhan.css">
</head>
<body>
	<?php 
		include 'mainMenu.php';
	 ?>
	  <div class="container-fluid">
		 <div class="container mainContainer">
		 	<div class="row">
		 		<?php require 'menu-canhan.php'; ?>
		 		<div class="col-md-10">
		 			<div class="main-content">		 				
						<div class="row">
						 	<div class="col-12">
							 	<div class="title-content">
							 		Đổi mật khẩu
							 	</div>
							 </div>
						 </div>
						 <div class="row">
						 	<div class="col-12">
						 		<form action="xuly-matkhau-sua.php" method="post" accept-charset="utf-8">
						 			<div class="row">
						 				<div class="col">
						 					<div class="form-group">
						 						<label for="currentPassword">Mật khẩu hiện tại</label>
									 			<input type="password" name="currentPassword" placeholder="Nhập mật khẩu hiện tại..." id="currentPasswordID" class="form-control">
									 			<div class="invalid-feedback" id="currentPassword-feedback">✖&nbsp;Vui lòng nhập mật khẩu hiện tại.</div>
									 			<div class="invalid-feedback" id="currentPassword-feedback-error">✖&nbsp;Mật khẩu không chính xác.</div>
						 					</div>
						 				</div>
						 			</div>
						 			<div class="row">
						 				<div class="col">
						 					<div class="form-group">
						 						<label for="newPassword" class="mt-4">Mật khẩu mới</label>
									 			<input type="password" name="newPassword" placeholder="Nhập mật khẩu mới..." id="newPasswordID" class="form-control">
									 			<div class="invalid-feedback" id="newPassword-feedback">✖&nbsp;Vui lòng nhập mật khẩu mới.</div>
						 					</div>
						 				</div>
						 			</div>
						 			<div class="row">
						 				<div class="col">
						 					<div class="form-group">
						 						<label for="confirmNewPassword" class="mt-4">Nhập lại mật khẩu</label>
									 			<input type="password" name="confirmNewPassword" placeholder="Nhập lại mật khẩu..." id="confirmNewPasswordID" class="form-control">
									 			<div class="invalid-feedback" id="confirmNewPassword-feedback">✖&nbsp;Vui lòng nhập lại mật khẩu.</div>
									 			<div class="invalid-feedback" id="confirmNewPassword-feedback-nonMatch">✖&nbsp;Mật khẩu không trùng khớp.</div>
						 					</div>
						 				</div>
						 			</div>
						 			<div class="row">
						 				<div class="col">
						 					<button type="submit" class="btn btn-primary mt-4" onclick="return changePassword()">Đổi mật khẩu</button>
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

	<?php require 'footer.php'; ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
    	<script>
		function changePassword() {
			$("#currentPassword-feedback").hide();
			$("#newPassword-feedback").hide();
			$("#confirmNewPassword-feedback").hide();
			$("#confirmNewPassword-feedback-nonMatch").hide();
			$("#currentPassword-feedback-error").hide();
			var currentPassword=document.getElementById('currentPasswordID');
			if(currentPassword.value===""){
				$("#currentPassword-feedback").show();
				return false;
			}
			var newPassword=document.getElementById('newPasswordID');
			if(newPassword.value===""){
				$("#newPassword-feedback").show();
				return false;
			}
			var confirmNewPassword=document.getElementById('confirmNewPasswordID');
			if(confirmNewPassword.value===""){
				$("#confirmNewPassword-feedback").show();
				return false;
			}
			if(newPassword.value!==confirmNewPassword.value){
				$("#confirmNewPassword-feedback-nonMatch").show();
				return false;
			}
		}
	</script>
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