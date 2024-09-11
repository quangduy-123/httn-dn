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
	 								Thông tin sản phẩm cần nhập
	 							</div>
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col">
 								<form action="nhap-sanpham-pdf.php" method="post" accept-charset="utf-8">
 									<div class="row">
 										<div class="col">
 											<div class="form-group">
                                                <label for="masanpham">Mã sản phẩm</label>
                                                <input type="text" name="masanpham" id="masanpham" class="form-control">
 											</div>
 										</div>
 									</div>
                                     <div class="row">
 										<div class="col">
 											<div class="form-group">
                                                <label for="masanpham">Số lượng</label>
                                                <input type="text" name="soluong" id="soluong" class="form-control">
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col">
 											<button target="_blank" type="submit" class="btn btn-primary" onclick="return check()">Nhập thêm</button>
 										</div>
 									</div>
 								</form>
 							</div>
	 					</div>
		 				
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