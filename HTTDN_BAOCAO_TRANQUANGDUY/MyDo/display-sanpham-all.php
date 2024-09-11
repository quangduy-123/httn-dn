<?php 
	require 'ketnoi.php';
	$sql=($_SESSION['role']=="admin")?"select * from sanpham":"select * from sanpham where macuahang='".$_SESSION['macuahang']."'";
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
					echo 'Không có sản phẩm nào<br>';
					// echo 'Có gì đó không ổn ở đây !<br>';
					// echo 'Thử ';
					// echo '<a href="'.$_SERVER['PHP_SELF'].'?&page=1">quay về đầu trang</a>';
					//   echo ' hoặc <a href="'.$_SERVER['PHP_SELF'].'?&page='.$number_of_pages.'">đi tới cuối trang.</a>';
					  echo '</h5>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}else{

		//Định nghĩa cho hàm LIMIT của SQL
		$page_first_result=($page-1)*$result_per_page;
		$sql=($_SESSION['role']=="admin")?"select * from sanpham LIMIT ".$page_first_result.",".$result_per_page:"select * from sanpham where macuahang='".@$_SESSION['macuahang']."' LIMIT ".$page_first_result.",".$result_per_page;
		$result=mysqli_query($ketnoi,$sql) or die(mysqli_error($ketnoi));

		echo '<table class="table table-hover table-responsive table-striped table-bordered" align="center" width="100%">';
			echo '<tr>';
				echo '<th style="text-align:center;">Mã</th>';
				echo '<th style="text-align:center;">Tên</th>';
				echo '<th style="text-align:center;">Số lượng</th>';
				echo '<th style="text-align:center;">Giá</th>';
				echo '<th style="text-align:center;">Hình ảnh</th>';
				echo '<th style="text-align:center;">Nhà sản xuất</th>';
				echo '<th style="text-align:center;">Chỉnh sửa</th>';
			echo '</tr>';
		//Hiển thị sản phẩm
		while($row=mysqli_fetch_array($result)){
			echo '<tr>';
				echo '<td style="text-align:center;"><b>'.$row['masanpham'].'</b></td>';
				echo '<td>'.$row['tensanpham'].'</td>';
				echo '<td style="text-align:center;">'.$row['soluong'].'</td>';
				echo '<td style="text-align:right;">'.number_format($row['dongia'],0,',','.').'</td>';
				echo '<td style="text-align:center;">
					<img src="'.$row['hinhanh'].'" alt="" height="60" width="50">
				</td>';
				echo '<td style="text-align:center;">'.$row['tennhasanxuat'].'</td>';
				echo '<td class="text-center"><a href="sanpham-edit.php?SP='.$row['masanpham'].'" class="btn btn-primary">Sửa</a></td>';
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