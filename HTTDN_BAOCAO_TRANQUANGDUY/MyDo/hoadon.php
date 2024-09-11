<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hóa đơn</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<body>
	<?php require 'ketnoi.php'; ?>
	<?php 
		$MADH=$_REQUEST['d'];
		$sql="select * from deta where mahoadon='".$MADH."'";
		$result=mysqli_query($ketnoi,$sql) or die(mysqli_error($ketnoi));
		$khachhang=mysqli_fetch_array($result);

		$sql="select * from hoadon where mahoadon='".$MADH."'";
		$result=mysqli_query($ketnoi,$sql);
		$donhang=mysqli_fetch_array($result);

		$sql="select * from chitiethoadon where mahoadon='".$MADH."'";
		$resultG=mysqli_query($ketnoi,$sql);
		$giohang=mysqli_fetch_array($resultG);

		$masanpham=$giohang['masanpham'];
		$sql="select * from sanpham where masanpham='".$masanpham."'";
		$result=mysqli_query($ketnoi,$sql);
		$sanpham=mysqli_fetch_array($result);

		$macuahang=$sanpham['macuahang'];
		$sql="select * from cuahang where macuahang='".$macuahang."'";
		$result=mysqli_query($ketnoi,$sql);
		$cuahang=mysqli_fetch_array($result);
	 ?>

	 <?php 
	 	class docso{
			function convert_number_to_words($number) {
				$hyphen      = ' ';
				$conjunction = '  ';
				$separator   = ' ';
				$negative    = 'âm ';
				$decimal     = ' phẩy ';
				$dictionary  = array(
				0                   => 'không',
				1                   => 'một',
				2                   => 'hai',
				3                   => 'ba',
				4                   => 'bốn',
				5                   => 'năm',
				6                   => 'sáu',
				7                   => 'bảy',
				8                   => 'tám',
				9                   => 'chín',
				10                  => 'mười',
				11                  => 'mười một',
				12                  => 'mười hai',
				13                  => 'mười ba',
				14                  => 'mười bốn',
				15                  => 'mười năm',
				16                  => 'mười sáu',
				17                  => 'mười bảy',
				18                  => 'mười tám',
				19                  => 'mười chín',
				20                  => 'hai mươi',
				30                  => 'ba mươi',
				40                  => 'bốn mươi',
				50                  => 'năm mươi',
				60                  => 'sáu mươi',
				70                  => 'bảy mươi',
				80                  => 'tám mươi',
				90                  => 'chín mươi',
				100                 => 'trăm',
				1000                => 'nghìn',
				1000000             => 'triệu',
				1000000000          => 'tỷ',
				1000000000000       => 'nghìn tỷ',
				1000000000000000    => 'nghìn triệu triệu',
				1000000000000000000 => 'tỷ tỷ'
				);
				if (!is_numeric($number)) {
					return false;
				}
				if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
					// overflow
					trigger_error(
					'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
					E_USER_WARNING
					);
					return false;
				}
				if ($number < 0) {
					return $negative . convert_number_to_words(abs($number));
				}
				$string = $fraction = null;
					if (strpos($number, '.') !== false) {
					list($number, $fraction) = explode('.', $number);
				}
				switch (true) {
				case $number < 21:
					$string = $dictionary[$number];
				break;
				case $number < 100:
					$tens   = ((int) ($number / 10)) * 10;
					$units  = $number % 10;
					$string = $dictionary[$tens];
					if ($units) {
						$string .= $hyphen . $dictionary[$units];
					}
				break;
				case $number < 1000:
					$hundreds  = $number / 100;
					$remainder = $number % 100;
					$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
					if ($remainder) {
						$string .= $conjunction . $this->convert_number_to_words($remainder);
					}
				break;
				default:
					$baseUnit = pow(1000, floor(log($number, 1000)));
					$numBaseUnits = (int) ($number / $baseUnit);
					$remainder = $number % $baseUnit;
					$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
					if ($remainder) {
						$string .= $remainder < 100 ? $conjunction : $separator;
						$string .= $this->convert_number_to_words($remainder);
					}
					break;
				}
				if (null !== $fraction && is_numeric($fraction)) {
					$string .= $decimal;
					$words = array();
					foreach (str_split((string) $fraction) as $number) {
						$words[] = $dictionary[$number];
					}
					$string .= implode(' ', $words);
				}
					return $string;
			}
 
	 	}
	  ?>

	<table border="1" align="center" id="pdf">
		<tr>
			<td colspan="6" width="1000">
				<div>
					<div>
						<b>Chợ Điện Tử Tiểu My</b>
					</div>
					<div>
						<b>Địa chỉ: số abc, đường abc, quận abc, TP.Hồ Chí Minh.</b>
					</div>
					<div>
						<b>Hostline: 0123 123 123</b>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<h2 style="text-align: center;">HÓA ĐƠN BÁN HÀNG</h2>
			</td>
		</tr>
		<?php

		?>
		<tr>
			<td colspan="3">Cửa hàng: <?php echo $cuahang['tencuahang']; ?></td>
			<td colspan="3">Số điện thoại: <?php echo $cuahang['sodienthoai']; ?></td>
		</tr>
		<tr>
			<td colspan="6">Địa chỉ: <?php echo $cuahang['diachi']; ?></td>
		</tr>
		<tr>
			<td colspan="3">
				Họ và tên khách hàng: <?php echo $khachhang['tenkhachhang']; ?>
			</td>
			<td colspan="3">
				Giới tính: <?php echo $khachhang['gioitinh']; ?>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				Số điện thoại: <?php echo $khachhang['sodienthoai']; ?>
			</td>
			<!-- <td colspan="3">
				Năm sinh: <?php //echo $khachhang['NAMSINH']; ?>
			</td> -->
		</tr>
		<tr>
			<td colspan="6">
				Địa chỉ: <?php echo $khachhang['diachi']; ?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Mã đơn hàng: <?php echo $donhang['mahoadon']; ?></b>
			</td>
			<td colspan="3">
				Ngày mua: <?php echo $donhang['ngaytao']; ?>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<b style="font-size: 130%;">Tình trạng đơn hàng: 
					<?php 
						if($donhang['XACNHAN']=='0'){
							echo 'chưa xác nhận';
						}else if($donhang['XACNHAN']=='1'){
							echo 'đã xác nhận';
						}else if($donhang['XACNHAN']=='2'){
							echo 'hủy';
						}
					 ?>
				</b>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<pre></pre>
			</td>
		</tr>
		<tr>
			<th width="40">STT</th>
			<th width="100">Mã sản phẩm</th>
			<th width="300">Tên sản phẩm</th>
			<!-- <th width="80">Đơn vị tính</th> -->
			<th width="70">Số lượng</th>
			<th width="205">Đơn giá</th>
			<th width="205">Thành tiền</th>
		</tr>
		<tr>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<!-- <th>4</th> -->
			<th>4</th>
			<th>5</th>
			<th>6=4x5</th>
		</tr>
		<tr>
			<?php 
				$i=1;
				$sql="select * from chitiethoadon where mahoadon='".$MADH."'";
				$result=mysqli_query($ketnoi,$sql);
				while($giohang=mysqli_fetch_array($result)){
					//số thứ tự
					echo '<td style="text-align: center">'.$i.'</td>';
					//mã sản phẩm
					echo '<td style="text-align: center">'.$giohang['masanpham'].'</td>';

					$sql="select * from sanpham where masanpham='".$giohang['masanpham']."'";
					$result=mysqli_query($ketnoi,$sql);
					$sanpham=mysqli_fetch_array($result);
					
					//tên sản phẩm
					echo '<td>'.$sanpham['tensanpham'].'</td>';

					// echo '<td style="text-align: center">'.$sanpham['DonViTinh'].'</td>';

					//số lượng
					echo '<td style="text-align: center">'.$giohang['soluong'].'</td>';

					//đơn giá
					echo '<td style="text-align: center">'.number_format($giohang['dongia'],'0',',','.').'</td>';

					//thành tiền
					$thanhtoan=$giohang['soluong']*$giohang['dongia'];
					echo '<td style="text-align: center">'.number_format($thanhtoan,'0',',','.').'</td>';
					
					$i++;
				}
			 ?>
		</tr>
		<tr>
			<td colspan="5">
				<b>Phí vận chuyển:</b>
			</td>
			<td style="text-align: center">
				<?php echo number_format($thanhtoan*0.1,'0',',','.'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="5">
				<b>Thuế:</b>
			</td>
			<td style="text-align: center">
				<?php echo number_format($thanhtoan*0.1,'0',',','.'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="5">
				<b>Tổng thanh toán:</b>
			</td>
			<td style="text-align: center">
				<b><?php echo number_format($donhang['tongthanhtoan'],'0',',','.'); ?></b>
			</td>
		</tr>
		<tr height="50">
			<td colspan="6" valign="top">
				<b>Bằng chữ: 
					<?php
						$docso=new docso();
						echo $docso->convert_number_to_words($donhang['tongthanhtoan']);
					?>
					 đồng.
				</b>
			</td>
		</tr>
	</table>
	<button class="btn" type="button" onclick="savepdf()" style="margin-left: 50%; margin-top: 2rem;">Lưu PDF</button>
	<script>
		function savepdf() {
			const invoice = this.document.getElementById("pdf");
			console.log(invoice);
			console.log(window);
			var opt = {
				margin: 1,
				filename: "don-hang-" + "<?php echo $donhang['mahoadon'] ?>" + '.pdf',
				image: {type: 'jpeg', quality: 0.98},
				html2canvas: {scale: 2},
				jsPDF: {unit: 'in', format: 'letter', orientation: 'portrait'}
			};
			html2pdf().from(invoice).set(opt).save();
		}
	</script>
	<style>
		table,tr,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</body>
</html>