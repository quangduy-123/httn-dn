<?php 
	require 'ketnoi.php';
	$sql="select * from cuahang";
	$result=mysqli_query($ketnoi,$sql);
	$number_of_results=mysqli_num_rows($result);

	//Số sản phẩm trên một page
	$result_per_page=10;

	//Tổng số page
	$number_of_pages=ceil($number_of_results/$result_per_page);

	//Xác định page đang mở
	if(!isset($_GET['page'])){
		$page=1;
	}else{
		$page=$_GET['page'];
	}

	//In các nút chuyển page

	//Kiểm tra tín đúng đắng của page hiện hành
	if($page < 1 || $page > $number_of_pages || !is_numeric($page)){
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-12 text-center">';
					echo '<h5 class="display-4">';
					echo 'Wait một chút...<br>';
					echo 'Có gì đó không ổn ở đây !<br>';
					echo 'Thử ';
					echo '<a href="'.$_SERVER['PHP_SELF'].'?&page=1">quay về đầu trang</a>';
					  echo ' hoặc <a href="'.$_SERVER['PHP_SELF'].'?&page='.$number_of_pages.'">đi tới cuối trang.</a>';
					  echo '</h5>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}else{

		//Định nghĩa cho hàm LIMIT của SQL
		$page_first_result=($page-1)*$result_per_page;
		$sql="select * from cuahang LIMIT ".$page_first_result.",".$result_per_page;
		$result=mysqli_query($ketnoi,$sql);

		echo '<table align="center" width="100%" class="table table-hover table-responsive table-striped table-bordered">';
			echo '<tr>';
				echo '<th style="text-align:center;">Mã cửa hàng</th>';
				echo '<th style="text-align:center;">Tên cửa hàng</th>';
				echo '<th style="text-align:center;">Mã tài khoản</th>';
				echo '<th style="text-align:center;">Số điện thoại</th>';
				echo '<th style="text-align:center;">Tổng đơn hàng</th>';
				echo '<th style="text-align:center;">Đơn hàng đã duyệt</th>';
				echo '<th style="text-align:center;">Đơn hàng chưa duyệt</th>';
				echo '<th style="text-align:center;">Đơn hàng đã hủy</th>';
				echo '<th style="text-align:center;">Vô hiệu hóa</th>';
				echo '<th style="text-align:center;">Bỏ vô hiệu hóa</th>';
			echo '</tr>';
		//Hiển thị sản phẩm
		while($row=mysqli_fetch_array($result)){
			echo '<tr>';
				if($row['tinhtrang']=="1"){
					echo '<td><b>'.$row['macuahang'].'</b></td>';
					echo '<td><b>'.$row['tencuahang'].'</b></td>';
					echo '<td><b>'.$row['mataikhoan'].'</b></td>';
					echo '<td><b>'.$row['sodienthoai'].'</b></td>';

					//đã xác nhận là XACNHAN = 1, chưa là = 0, hủy là = 2
					//tổng đơn
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."'";
					$tong=mysqli_num_rows(mysqli_query($ketnoi,$sql));

					echo '<td><b>'.$tong.'</b></td>';

					//đã duyệt
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='1'";
					$duyet=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td><b>'.$duyet.'</b></td>';

					//chưa duyệt
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='0'";
					$chua=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td><b>'.$chua.'</b></td>';

					//đã hủy
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='2'";
					$huy=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td><b>'.$huy.'</b></td>';

					echo '<td style="text-align:center;"><a href="nhanvien-disabled.php?TenDN='.$row['macuahang'].'" class="btn btn-primary">Vô hiệu hóa</a></td>';
					echo '<td style="text-align:center;"><a href="nhanvien-undisabled.php?TenDN='.$row['macuahang'].'" class="btn btn-success disabled">Bỏ vô hiệu hóa</a></td>';
				}else{
					echo '<td style="background-color:#989898"><b>'.$row['macuahang'].'</b></td>';
					echo '<td style="background-color:#989898"><b>'.$row['tencuahang'].'</b></td>';
					echo '<td style="background-color:#989898"><b>'.$row['mataikhoan'].'</b></td>';
					echo '<td style="background-color:#989898"><b>'.$row['sodienthoai'].'</b></td>';

					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."'";
					$tong=mysqli_num_rows(mysqli_query($ketnoi,$sql));

					echo '<td style="background-color:#989898"><b>'.$tong.'</b></td>';

					//đã duyệt
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='1'";
					$duyet=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td style="background-color:#989898"><b>'.$duyet.'</b></td>';

					//chưa duyệt
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='0'";
					$chua=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td style="background-color:#989898"><b>'.$chua.'</b></td>';

					//đã hủy
					$sql="select hoadon.* from hoadon join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon join sanpham on sanpham.masanpham=chitiethoadon.masanpham join cuahang on cuahang.macuahang=sanpham.macuahang where cuahang.macuahang='".$row['macuahang']."' and hoadon.XACNHAN='2'";
					$huy=mysqli_num_rows(mysqli_query($ketnoi,$sql));
					echo '<td style="background-color:#989898"><b>'.$huy.'</b></td>';

					echo '<td style="text-align:center;background-color:#989898"><a href="nhanvien-disabled.php?TenDN='.$row['macuahang'].'" class="btn btn-primary disabled">Vô hiệu hóa</a></td>';
					echo '<td style="text-align:center;background-color:#989898"><a href="nhanvien-undisabled.php?TenDN='.$row['macuahang'].'" class="btn btn-success">Bỏ vô hiệu hóa</a></td>';

				}
			echo '</tr>';
		}
		echo '</table>';

		echo '<div class="row mt-5">';
		echo '<div class="col-12">';
		echo '<ul class="pagination justify-content-end">';


		//Hiển thị các nút chuyển page trước nút hiện hành
		$previous=$page-1;
		if($page>1){
			

			//Hiển thị nút chuyển đến page đầu
			echo '<li class="page-item">';
			
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page=1" class="page-link">Trang đầu</a>';
			echo '</li>';

			//Hiển thị nút Previous
			echo '<li class="page-item">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'" class="page-link">&larr;</a>';
			echo '</li>';
			

			//Hiển thị tối đa 4 nút trước nút hiện hành
			for($i=$page-4;$i<$page;$i++){
				if($i>0){
					echo '<li class="page-item">';
					
					echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'" class="page-link">'.$i.'</a>';
					echo '</li>';
				}
			}
		}else{
			//Hiển thị nút chuyển đến page đầu
			echo '<li class="page-item disabled">';
			
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page=1" class="page-link">Trang đầu</a>';
			echo '</li>';

			//Hiển thị nút Previous
			echo '<li class="page-item disabled">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'" class="page-link">&larr;</a>';
			echo '</li>';
			//Hiển thị tối đa 4 nút trước nút hiện hành
			for($i=$page-4;$i<$page;$i++){
				if($i>0){
					echo '<li class="page-item">';
					
					echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'" class="page-link">'.$i.'</a>';
					echo '</li>';
				}
			}
			
		}

		//Hiển thị nút chuyển page hiện hành
		echo '<li class="page-item active">';
		echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$page.'" class="page-link">'.$page.'</a>';
		echo '</li>';

		//Hiển thị các nút chuyển page
		for($i=$page+1;$i<=$number_of_pages;$i++){
			echo '<li class="page-item">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'" class="page-link">'.$i.'</a>';
			echo '</li>';

			//Hiển thị tối đa 4 nút chuyển page tính từ nút hiện hành
			if($i>=$page+4){
				break;
			}
		}

		//Hiển thị nút Next
		$next=$page+1;
		if($page!=$number_of_pages){
			
			//Hiển thị nút Next
			echo '<li class="page-item">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'" class="page-link">	&rarr;</a> ';
			echo '</li>';

			//Hiển thị nút chuyển đến page cuối
			echo '<li class="page-item">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$number_of_pages.'" class="page-link">Trang cuối</a>';
			echo '</li>';
		}else{
			//Hiển thị nút Next
			echo '<li class="page-item disabled">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'" class="page-link">	&rarr;</a> ';
			echo '</li>';

			//Hiển thị nút chuyển đến page cuối
			echo '<li class="page-item disabled">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$number_of_pages.'" class="page-link">Trang cuối</a>';
			echo '</li>';
		}
	}
	echo '</ul>';
	echo '</div>';
	echo '</div>';
 ?>