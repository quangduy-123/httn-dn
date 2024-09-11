<div class="col-md-2">
	<div class="panel panel-success">
		<div class="panel-heading">
			<div class="panel-title">
				Tài Khoản
			</div>
		</div>
		<ul class="list-group">
			<?php 
				if($_SESSION['role']=="user"){
					echo '
 					<li class="list-group-item">
 						<a href="thongtin-canhan.php">Thông tin cá nhân</a>
 					</li>';
				}
				if(isset($_SESSION['macuahang']) and $_SESSION['hoatdong']=="true"){
					echo '
 					<li class="list-group-item">
 						<a href="thongtin-cuahang.php">Thông tin cửa hàng</a>
 					</li>';
				}
			 ?>
			<li class="list-group-item">
				<a href="matkhau.php">Mật khẩu</a>
			</li>
		</ul>
	</div>
	<?php 
		if($_SESSION['role']=="user"){
			echo '<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title">
						Giỏ hàng
					</div>
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="show-giohang.php">Giỏ hàng của bạn</a>
					</li>
				</ul>
			</div>';
		}
	 ?>
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="panel-title">
					Đơn hàng
				</div>
			</div>
			<ul class="list-group">
				<?php
					if(isset($_SESSION['macuahang']) and $_SESSION['hoatdong']=="true"){
				?>
					<li class="list-group-item">
						<a href="hoadon-nhanvien-all.php">Duyệt đơn hàng</a>
					</li>
				<?php } ?>
					<li class="list-group-item">
						<a href="hoadon-all.php">Đơn hàng của bạn</a>
					</li>
			</ul>
		</div>
	<?php 
		if(isset($_SESSION['macuahang']) and $_SESSION['hoatdong']=="true"){
				echo '<div class="panel panel-success">
					<div class="panel-heading">
						<div class="panel-title">
							Quản trị sản phẩm
						</div>
					</div>
					<ul class="list-group">
						<li class="list-group-item">
							<a href="sanpham-all.php">Toàn bộ sản phẩm</a>
						</li>
						<li class="list-group-item">
							<a href="sanpham-add.php">Thêm mới</a>
						</li>
						<li class="list-group-item">
							<a href="sanpham-edit.php">Sửa thông tin</a>
						</li>
						<li class="list-group-item">
							<a href="sanpham-nhapthem.php">Nhập sản phẩm</a>
						</li>
					</ul>
				</div>';
			}
		
		if($_SESSION['role']=="admin"){
			echo '<div class="panel panel-success">
 				<div class="panel-heading">
 					<div class="panel-title">
 						Tài khoản cửa hàng
 					</div>
 				</div>
 				<ul class="list-group">
 					<li class="list-group-item">
 						<a href="nhanvien-all.php">Toàn bộ tài khoản</a>
 					</li>
 					<li class="list-group-item">
 						<a href="nhanvien-add.php">Thêm mới</a>
 					</li>
 				</ul>
 			</div>
 			<div class="panel panel-success">
 				<div class="panel-heading">
 					<div class="panel-title">
 						Tài khoản khách
 					</div>
 				</div>
 				<ul class="list-group">
 					<li class="list-group-item">
 						<a href="khach-all.php">Toàn bộ tài khoản</a>
 					</li>
 				</ul>
			 </div>';
			echo '<div class="panel panel-success">
			<div class="panel-heading">
				<div class="panel-title">
					Sản phẩm
				</div>
			</div>
			<ul class="list-group">
				<li class="list-group-item">
					<a href="sanpham-all.php">Toàn bộ sản phẩm</a>
				</li>
			</ul>
			</div>';
		}
	 ?>		 			
</div>