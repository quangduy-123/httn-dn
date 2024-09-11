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

	<div class="row">
		<div class="title-content">
			Thông tin tài khoản
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<?php 
				$sql="select * from taikhoan where TenDN='".$_SESSION['username']."'";
				$result=mysqli_query($ketnoi,$sql) or die(mysqli_error($ketnoi));
				if($row=mysqli_fetch_array($result)){
					echo '<img src="'.$row['HinhDaiDien'].'" alt="" name="currentAvatar" height="140" width="160">';
				}
			 ?>
			 
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 ml-4">
			<div class="container card">
		<?php 
				$sql="select * from taikhoan where TenDN='".$_SESSION['username']."'";
				$result=mysqli_query($ketnoi,$sql);
				if($row=mysqli_fetch_array($result)){
					echo '<p><b>ID: '.$row['ID'].'</b></p>';
					$_SESSION['id']=$row['ID'];
					echo '<p>Tên đăng nhập: '.$row['TenDN'].'</p>';
					echo '<p>Tên hiển thị: '.$row['TenHienThi'].'</p>';
				}
				 ?>
			 </div>
		 </div>
	</div>
	
	<div class="row mt-4">
		<div class="title-content">
			Đổi thông tin tài khoản
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="container card pb-2">
				<form action="xuly-taikhoan-sua.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<label for="tenHienThi">Tên hiển thị</label>
					<input type="text" name="tenHienThi" placeholder="Nhập tên hiển thị mới..." class="form-control">
					<label for="newAvatar" class="mt-4">Ảnh đại diện</label>
					<br>
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<input type="file" name="newAvatar">
					<br>
					<button type="submit" name="capnhat" class="btn btn-primary float-right mt-4">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>

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