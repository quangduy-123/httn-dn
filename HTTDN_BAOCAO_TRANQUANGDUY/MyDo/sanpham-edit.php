<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản trị sản phẩm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="./css/trangcanhan.css">
	<script src="https://cdn.tiny.cloud/1/st944udyma6a5rum96h8e3yentz9tdt6qrq5ao4hzoufhtnj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	
</head>
<body>
	<?php 
		require 'ketnoi.php';
		require 'mainMenu.php';
	 ?>
	 <div class="container-fluid">
	 	<div class="container mainContainer">
	 		<div class="row">
	 			<?php require 'menu-canhan.php'; ?>
	 			<div class="col-md-10">
	 				<div class="main-content">
	 					<div class="row">
	 						<div class="col-12">
	 							<div class="title-content">
	 								Chỉnh sửa thông tin sản phẩm
	 							</div>
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col">
	 							<?php echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" accept-charset="utf-8">';  ?>
	 								<div class="row">
	 									<div class="col">
	 										<div class="form-group">
	 											<label for="search-sanpham">Mã sản phẩm</label>
				 								<input type="text" name="maSP" placeholder="Nhập mã sản phẩm cần tìm..." class="form-control" id="maSPID" value="<?php echo @$_POST['maSP'] ?>">
				 								<div class="invalid-feedback" id="maSP-feedback">✖&nbsp;Vui lòng nhập mã sản phẩm.</div>
	 										</div>
	 									</div>
	 								</div>
	 							</form>
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col">
	 							<?php include 'search-sanpham.php'; ?>
	 						</div>
	 					</div>
	 					<?php if($_SESSION['masanpham']!=""){ 
	 						$sql="select * from sanpham where masanpham='".$_SESSION['masanpham']."'";
							$result=mysqli_query($ketnoi,$sql);
							if(mysqli_num_rows($result)!=0){
							$row=mysqli_fetch_array($result);
	 					?>
	 					<div class="row mt-4">
	 						<div class="col">
	 							<div class="title-content">
	 								Chỉnh sửa thông tin.
	 							</div>
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col">
 								<form action="xuly-sanpham-edit.php" method="post" accept-charset="utf-8">
 									<div class="row">
 										<div class="col">
 											<div class="form-group">
 												<label for="soluong">Số lượng</label>
 												<input readonly="" type="number" name="soluong" min="0" class="form-control" id="soluongID" required="" value="<?php echo $row['soluong']; ?>">
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col">
 											<div class="form-group">
 												<label for="gia">Giá</label>
			 									<input type="text" name="gia" id="giaID" class="form-control" required="" value="<?php echo $row['dongia']; ?>">
			 									<div class="invalid-feedback" id="gia-feedback">✖&nbsp; Giá tiền không hợp lệ.</div>
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col">
 											<div class="form-group">
 												<label for="mota">Mô tả</label>
 												<textarea id="editor" name="mota" class="form-control" id="chitietID" rows="30" required="">
 													<?php echo $row['mota']; ?>
 												</textarea>
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col">
 											<button type="submit" class="btn btn-primary" onclick="return check()">Lưu</button>
 										</div>
 									</div>
 								</form>
 							</div>
	 					</div>
		 				<?php
		 						}else{
		 							echo '<div class="row">
			 							<div class="col">
			 								<h1 class="title-content" style="color: red;">Không tìm thấy "'.@$_POST['maSP'].'".</h1>
			 							</div>
		 							</div>';
		 						}
		 					}
		 				?>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 <script>
		tinymce.init({
			selector: '#editor',
			plugins: 'image code',
			toolbar: 'undo redo | link image | code',
			// enable title field in the Image dialog
			image_title: true, 
			// enable automatic uploads of images represented by blob or data URIs
			automatic_uploads: true,
			// add custom filepicker only to Image dialog
			file_picker_types: 'image',
			file_picker_callback: function(cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				input.onchange = function() {
					var file = this.files[0];
					var reader = new FileReader();

					reader.onload = function () {
					var id = 'blobid' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var base64 = reader.result.split(',')[1];
					var blobInfo = blobCache.create(id, file, base64);
					blobCache.add(blobInfo);

					// call the callback and populate the Title field with the file name
					cb(blobInfo.blobUri(), { title: file.name });
					};
					reader.readAsDataURL(file);
				};
			input.click();
			}
		});
	</script>
<?php require 'footer.php'; ?>
	 <script>
	 	function check() {
	 		$("#gia-feedback").hide();
	 		var gia=document.getElementById('giaID');
			if(isNaN(gia.value)){
				$("#gia-feedback").show();
				return false;
			}
	 	}
	 </script>

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