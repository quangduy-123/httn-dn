<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
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
					<form action="" method="post" accept-charset="utf-8">
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
								<button type="submit" class="btn btn-success float-right">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<button class="btn btn-primary" data-toggle="modal" data-target="#modal-login">open modal</button>


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
					<form action="#" method="post" id="formDangKy" accept-charset="utf-8">
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
						        <button type="submit" id="btnDangKy" class="btn btn-primary" onclick="return register()">Đăng ký</button>
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

	<button class="btn btn-primary" data-toggle="modal" data-target="#modal-register">open modal</button>

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>