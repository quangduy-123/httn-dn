<?php 
	require 'ketnoi.php';
	$sql="select * from giohang where makhachhang='".$_SESSION['makhachhang']."'";
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
	if($number_of_results!=0){
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
			$sql="select * from giohang where makhachhang='".$_SESSION['makhachhang']."' LIMIT ".$page_first_result.",".$result_per_page;
			$resultG=mysqli_query($ketnoi,$sql);

			echo '<table align="center" width="100%" class="table table-hover table-responsive table-striped table-bordered">';
				echo '<tr>';
					echo '<th style="text-align:center;">STT</th>';
					echo '<th style="text-align:center;">Tên sản phẩm</th>';
					echo '<th style="text-align:center;">Số lượng</th>';
					echo '<th style="text-align:center;">Đơn giá</th>';
					echo '<th style="text-align:center;">Thành tiền</th>';
					echo '<th style="text-align:center;">Đặt hàng</th>';
					echo '<th style="text-align:center;">Xóa một sản phẩm</th>';
					echo '<th style="text-align:center;">Xóa tất cả sản phẩm</th>';
				echo '</tr>';
			//Hiển thị sản phẩm
			$i=1;
			while($row=mysqli_fetch_array($resultG)){
				echo '<tr>';
					echo '<td style="text-align:center;">'.$i.'</td>';
					$i+=1;
					$sql="select * from sanpham where masanpham='".$row['masanpham']."'";
					$result=mysqli_query($ketnoi,$sql);
					$sanpham=mysqli_fetch_array($result);
					echo '<td>'.$sanpham['tensanpham'].'</td>';
					echo '<td style="text-align:center;">'.$row['soluong'].'</td>';
					echo '<td style="text-align:center;">'.number_format($sanpham['dongia'],'0',',','.').'</td>';
					$ThanhTien=$sanpham['dongia']*$row['soluong'];
					echo '<td style="text-align:center;">'.number_format($ThanhTien,'0',',','.').'</td>';

						//xem lại phần đặt hàng khi sản phẩm trong giỏ hàng lớn > sản phẩm trong kho




						///
						echo '<td style="text-align:center;">
								<a href="dathang.php?makhachhang='.$row['makhachhang'].'&masanpham='.$row['masanpham'].'&soluong='.$row['soluong'].'" class="btn btn-primary">Đặt hàng</a>
							</td>';
						echo '<td style="text-align: center;">
							<a href="xoa1.php?makhachhang='.$row['makhachhang'].'&masanpham='.$row['masanpham'].'" class="btn btn-danger">Xóa 1</a>
						</td>';
						echo '<td style="text-align: center;">
							<a href="xoahet.php?makhachhang='.$row['makhachhang'].'&masanpham='.$row['masanpham'].'" class="btn btn-danger">Xóa tất cả</a>
						</td>';
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
	}else{
		echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col-12 text-center">';
						echo '<h5 class="display-4">';
							echo 'Giỏ hàng trống';
						echo '</h5>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
	}
