<?php 
	require 'ketnoi.php';
	$sql="select hoadon.* from hoadon
	join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon
	join sanpham on sanpham.masanpham=chitiethoadon.masanpham
	where sanpham.macuahang='".$_SESSION['macuahang']."'
	ORDER by hoadon.ngaytao DESC";
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
					echo 'Không có đơn hàng<br>';
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
		$sql="select hoadon.* from hoadon
		join chitiethoadon on chitiethoadon.mahoadon=hoadon.mahoadon
		join sanpham on sanpham.masanpham=chitiethoadon.masanpham
		where sanpham.macuahang='".$_SESSION['macuahang']."'
		ORDER by hoadon.ngaytao DESC LIMIT ".$page_first_result.",".$result_per_page;
		$result=mysqli_query($ketnoi,$sql);
		if(mysqli_num_rows($result)!=0){
			echo '<table class="table table-hover table-responsive table-striped table-bordered" align="center" width="100%">';
				echo '<tr>';
					echo '<th style="text-align:center;">Mã đơn hàng</th>';
					echo '<th style="text-align:center;">Ngày mua</th>';
					echo '<th style="text-align:center;">Tổng đơn hàng</th>';
					echo '<th style="text-align:center;">Tình trạng</th>';
					echo '<th style="text-align:center;">Chi tiết</th>';
					echo '<th style="text-align:center;">Xác nhận</th>';
					echo '<th style="text-align:center;">Hủy</th>';
				echo '</tr>';
			//Hiển thị sản phẩm
			while($row=mysqli_fetch_array($result)){
				echo '<tr>';
					echo '<td style="text-align:center;"><b>'.$row['mahoadon'].'</b></td>';
					echo '<td style="text-align:center;">'.$row['ngaytao'].'</td>';
					echo '<td style="text-align:right;">'.number_format($row['tongdonhang'],0,',','.').'</td>';
					if($row['XACNHAN']=='0'){
						echo '<td>&#x2754;Chưa xác nhận</td>';
					}else if($row['XACNHAN']=='1'){
						echo '<td style="color: green;">✔Đã xác nhận</td>';
					}else if($row['XACNHAN']=='2'){
						echo '<td style="color: red;">&#x274C;Hủy</td>';
					}
					echo '<td class="text-center"><a href="hoadon.php?d='.$row['mahoadon'].'" class="btn btn-primary" target="_blank">Xem</a></td>';
					if($row['XACNHAN']=='0'){
						echo '<td class="text-center"><a href="xacnhan.php?d='.$row['mahoadon'].'" class="btn btn-success">Xác nhận</a></td>';
						echo '<td class="text-center"><a href="huy.php?d='.$row['mahoadon'].'" class="btn btn-danger">Hủy</a></td>';
					}else{
						echo '<td class="text-center"><a href="xacnhan.php?d='.$row['mahoadon'].'" class="btn btn-success disabled">Xác nhận</a></td>';
						echo '<td class="text-center"><a href="huy.php?d='.$row['mahoadon'].'" class="btn btn-danger disabled">Hủy</a></td>';
					}
					
				echo '</tr>';
			}
			echo '</table>';
		}else{
			echo 'Đơn hàng trống';
		}

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