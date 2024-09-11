<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Duyệt đơn hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="./css/trangcanhan.css">
</head>
<body>
	<?php 
		require 'ketnoi.php';
		require 'mainMenu.php';
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
	 								Duyệt đơn hàng
	 							</div>
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col">
	 							<?php 
	 								require 'display-donhang-all.php';
	 							 ?>	
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