<?php 

		//Kết nối db
		$ketnoi=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($ketnoi,"shop");
		mysqli_query($ketnoi,"SET NAMES 'utf8'");
		$sql="select * from sanpham";
		$result=mysqli_query($ketnoi,$sql);
		$number_of_results=mysqli_num_rows($result);

		//Số sản phẩm trên một page
		$result_per_page=5;

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
			echo 'Somethings was wrong <br>';
			echo '<a href="index.php?page=1">Return first page</a>';
			echo '  or <a href="index.php?page='.$number_of_pages.'">goto last page.</a>';
		}else{

			//Định nghĩa cho hàm LIMIT của SQL
			$page_first_result=($page-1)*$result_per_page;
			$sql="select * from sanpham LIMIT ".$page_first_result.",".$result_per_page;
			$result=mysqli_query($ketnoi,$sql);

			echo '<table border="1" align="center">';
				echo '<tr>';
					echo '<th>MaSP</th>';
					echo '<th>TenSP</th>';
					echo '<th>SoLuong</th>';
					echo '<th>GiaTien</th>';
					echo '<th>DonViTinh</th>';
				echo '</tr>';
			//Hiển thị sản phẩm
			while($row=mysqli_fetch_array($result)){
				echo '<tr>';
					echo '<td>'.$row['MaSP'].'</td>';
					echo '<td>'.$row['TenSP'].'</td>';
					echo '<td>'.$row['SoLuong'].'</td>';
					echo '<td>'.$row['GiaTien'].'</td>';
					echo '<td>'.$row['DonViTinh'].'</td>';
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