<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<body>
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
				<h2 style="text-align: center;">PHIẾU BÁO NHẬP SẢN PHẨM</h2>
			</td>
		</tr>
		<?php
            include 'ketnoi.php';
            $sql="select * from cuahang where macuahang='".$_SESSION['macuahang']."'";
            $result=mysqli_query($ketnoi,$sql);
            $cuahang=mysqli_fetch_array($result);
		?>
		<tr>
			<td colspan="3">Cửa hàng: <?php echo $cuahang['tencuahang']; ?></td>
			<td colspan="3">Số điện thoại: <?php echo $cuahang['sodienthoai']; ?></td>
		</tr>
        <tr>
            <td colspan="6">Địa chỉ: <?php echo $cuahang['diachi']; ?></td>
        </tr>
        <?php 
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaydat=date('Y-m-d H:i:s');
        ?>
        <tr>
            <td colspan="6">Ngày đặt: <?php echo $ngaydat; ?></td>
        </tr>
		<tr>
			<td colspan="6">
				<pre></pre>
			</td>
		</tr>
		<tr>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<!-- <th width="80">Đơn vị tính</th> -->
			<th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng đơn giá</th>
		</tr>
		<tr>
			<?php 
                $sql="select * from sanpham where masanpham='".$_REQUEST['masanpham']."'";
                $soluong=$_REQUEST['soluong'];
				$result=mysqli_query($ketnoi,$sql);
				while($sanpham=mysqli_fetch_array($result)){
					//số thứ tự
					//mã sản phẩm
					echo '<td style="text-align: center">'.$sanpham['masanpham'].'</td>';

					//tên sản phẩm
					echo '<td>'.$sanpham['tensanpham'].'</td>';

					// echo '<td style="text-align: center">'.$sanpham['DonViTinh'].'</td>';

					//số lượng
                    echo '<td style="text-align: center">'.$soluong.'</td>';
                    
                    //đơn giá
                    echo '<td style="text-align: center">'.number_format($sanpham['dongia'],'0',',','.').'</td>';

                    echo '<td style="text-align: center">'.number_format($soluong*$sanpham['dongia'],'0',',','.').'</td>';
				}
			 ?>
	</table>
    <button class="btn" type="button" onclick="savepdf()" style="margin-left: 50%; margin-top: 2rem;">Lưu PDF</button>
    <script>
		function savepdf() {
			const invoice = this.document.getElementById("pdf");
			console.log(invoice);
			console.log(window);
			var opt = {
				margin: 1,
				filename: "nhaphang-" + "-" +"<?php echo $_SESSION['macuahang']; ?>" + '.pdf',
				image: {type: 'jpeg', quality: 0.98},
				html2canvas: {scale: 2},
				jsPDF: {unit: 'in', format: 'letter', orientation: 'portrait'}
			};
			html2pdf().from(invoice).set(opt).save();
		}
	</script>
</body>
</html>