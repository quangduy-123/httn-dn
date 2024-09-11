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
                                    Thêm sản phẩm mới
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="xuly-sanpham-add.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="tensp">Tên sản phẩm</label>
                                				<input type="text" name="tensp" placeholder="Nhập tên sản phẩm..." class="form-control" required="">
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="soluong">Số lượng</label>
                                				<input type="number" name="soluong" min="1" required="" class="form-control">
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="giatien">Giá tiền</label>
                                				<input type="text" name="giatien" placeholder="Nhập giá tiền cho sản phẩm..." class="form-control" required="" id="giatienID">
                                				<div class="invalid-feedback" id="giatien-feedback">✖&nbsp; Giá tiền không hợp lệ.</div>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="hinhanh">Hình ảnh</label>
                                				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                				<input type="file" name="hinhanh" id="hinhanhID">
                                				<div class="invalid-feedback" id="hinhanh-feedback">✖&nbsp; Vui lòng chọn ảnh đại diện cho sản phẩm.</div><br>
                                				<i>Lưu ý: ảnh minh họa cho sản phẩm sẽ không thể thay đổi được.</i>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="nsx">Nhà sản xuất</label>
                                				<input type="text" name="tennhasanxuat" id="nsx" required="" class="form-control" placeholder="Nhập tên nhà sản xuất">
                                				<i>Lưu ý: nhà sản xuất sẽ không thể thay đổi được.</i>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<div class="form-group">
                                				<label for="mota">Mô tả sản phẩm</label><br>
												<i>Lưu ý: hình ảnh trong phần mô tả phải có phần mở rộng là .jpg</i>
                                				<textarea id="editor" name="mota" class="form-control" rows="30"></textarea>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col">
                                			<input type="submit" class="btn btn-primary" onclick="return checkData()" value="Thêm mới">
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
    	function checkData() {
    		$("#giatien-feedback").hide();
    		var giatien=document.getElementById('giatienID');
			if(isNaN(giatien.value)){
				$("#giatien-feedback").show();
				alert("Dữ liệu không hợp lệ hoặc có thiếu sót");
				return false;
			}
			$("#hinhanh-feedback").hide();
			var hinhanh=document.getElementById('hinhanhID');
			if(hinhanh.value==""){
				$("#hinhanh-feedback").show();
				alert("Dữ liệu không hợp lệ hoặc có thiếu sót");
				return false;
			}
			$("#nsx-feedback").hide();
			var nsx=document.getElementById('nsxID');
			if(nsx.value==""){
				$("#nsx-feedback").show();
				alert("Dữ liệu không hợp lệ hoặc có thiếu sót");
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