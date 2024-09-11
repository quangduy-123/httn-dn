<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/animate.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Tiểu My Market</title>
</head>
<body>
	
	<?php
		require 'mainMenu.php';
		require 'carousel.php';
		require 'jumbotron.php';
		require 'sanpham-moi.php';
		require 'sanpham_index.php';
		require 'taikhoan_index.php';
		require 'gioithieu.php';
		require 'lienhe.php';
		require 'footer.php';

	 ?>

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
						            <label for="username">
						            	<span class="glyphicon glyphicon-user"></span>
						            	 Tên đăng nhập
						            </label>
						            <input type="text" name="username" id="username-register" class="form-control" required="">
						        </div>
						    </div>
					    </div>
					    <div class="row">
				        	<div class="col">
						        <div class="form-group">
						            <label for="email">
						            	<span class="glyphicon glyphicon-user"></span>
						            	 Email
						            </label>
						            <input type="email" name="email" id="email-register" class="form-control" required="">
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
						        <input type="submit" id="btnDangKy" class="btn btn-primary float-right" onclick="return register()" value="Đăng ký">
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
									<label for="username">Tên đăng nhập hoặc email</label>
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

	<script>
		function login() {
			$("#username-login-feedback").hide()
			$("#password-login-feedback").hide()
			var username = document.getElementById('username-login')
			if(username.value == ""){
				$("#username-login-feedback").show()
				return false
			}
			var password = document.getElementById('password-login')
			if(password.value == ""){
				$("#password-login-feedback").show()
				return false
			}
		}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script>
    	new WOW().init();
    </script>
    <script>	
		var selector = '.navbar-nav li';

		$(selector).on('click', function(){
		    $(selector).removeClass('active');
		    $(this).addClass(' active');
		});


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

		$(document).ready(function(){
			// Add smooth scrolling to all links
			$("a").on('click', function(event) {

			    // Make sure this.hash has a value before overriding default behavior
			    if (this.hash !== "") {
				    // Prevent default anchor click behavior
				    event.preventDefault();

				    // Store hash
				    var hash = this.hash;

			      	// Using jQuery's animate() method to add smooth page scroll
				    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				    $('html, body').animate({
				        scrollTop: $(hash).offset().top
				    }, 800, function(){
		   
			        	// Add hash (#) to URL when done scrolling (default click behavior)
			        	window.location.hash = hash;
		      		});
		    	} // End if
	  		});
		});

		new WOW().init();

		// Modal đăng ký
		var modalDK = document.getElementById("modal-dangKy");

		// Get the button that opens the modal
		var btnDK = document.getElementById("openRegisterModal");

		// Get the <span> element that closes the modal
		var spanDK = document.getElementsByClassName("modal-close")[0];

		// When the user clicks the button, open the modal 
		btnDK.onclick = function() {

			modalDK.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		spanDK.onclick = function() {
		  modalDK.style.display = "none";
		}

		//Modal đăng nhập
		var modalLI = document.getElementById("modal-dangNhap");

		// Get the button that opens the modal
		var btnLI = document.getElementById("openLoginModal");

		// Get the <span> element that closes the modal
		var spanLI = document.getElementsByClassName("modal-closeLI")[0];

		// When the user clicks the button, open the modal 
		btnLI.onclick = function() {
		  modalLI.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		spanLI.onclick = function() {
		  modalLI.style.display = "none";
		}
	</script>
</body>
</html>