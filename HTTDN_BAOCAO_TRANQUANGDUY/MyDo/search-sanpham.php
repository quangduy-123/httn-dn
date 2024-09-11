<?php 
	require 'ketnoi.php';
	if(isset($_POST['maSP'])){
		$maSP=$_POST['maSP'];
	}else{
		$maSP=@$_REQUEST['SP'];
	}
	@$_SESSION['masanpham']="";
	$sql="select * from sanpham where masanpham='".$maSP."' and macuahang='".$_SESSION['macuahang']."'";
	$result=mysqli_query($ketnoi,$sql);
	if(mysqli_num_rows($result)!=0){
		$_SESSION['masanpham']=$maSP;
		$sql="select * from sanpham where masanpham='".$maSP."'";
		$result=mysqli_query($ketnoi,$sql);
		$row=mysqli_fetch_array($result);
		if(mysqli_num_rows($result)!=0){
			echo '<table border="1" align="center" width="100%" class="mt-4">';
				echo '<tr>';
					echo '<th style="text-align:center;">Mã</th>';
					echo '<th style="text-align:center;">Tên</th>';
					echo '<th style="text-align:center;">Số lượng</th>';
					echo '<th style="text-align:center;">Giá</th>';
					echo '<th style="text-align:center;">Hình ảnh</th>';
					echo '<th style="text-align:center;">Nhà sản xuất</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<td style="text-align:center;"><b>'.$row['masanpham'].'</b></td>';
					echo '<td>'.$row['tensanpham'].'</td>';
					echo '<td style="text-align:center;">'.$row['soluong'].'</td>';
					echo '<td style="text-align:right;">'.number_format($row['dongia'],0,',','.').'</td>';
					echo '<td style="text-align:center;">
						<img src="'.$row['hinhanh'].'" alt="" height="60" width="50">
					</td>';
					echo '<td style="text-align:center;">'.$row['tennhasanxuat'].'</td>';
				echo '</tr>';
			echo '</table>';
		}
	}
 ?>