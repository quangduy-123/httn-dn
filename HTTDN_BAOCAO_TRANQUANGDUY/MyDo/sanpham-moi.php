<hr>
<!-- <link rel="stylesheet" href="./css/laptop-1440.css" media="screen and (min-device-width: 1024px) and (max-device-width: 1440px)"> -->
<div class="container mt-4 mb-2">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="gold-man display-4 wow animate__bounceInUp" style="text-transform: uppercase;font-size: 250%; text-shadow: 1px 1px 20px;">Sản phẩm mới</h1>
		</div>
	</div>
	<hr style="width: 10%">
	<!-- <div class="row mt-4 text-justify" style="background-color: yellow"> -->
		<div class="container p-4" style="background-color: white; position: relative;">
			<!-- <div class="row float-right" style="background-color: red; position: absolute; right: 0;">
			 	<a href="sanpham-moi-all.php">Xem thêm</a>
			</div> -->
			<a href="sanpham-moi-all.php" style="position: absolute; right: 0; top: 0; margin-top: 10px; margin-left: 10px; margin-right: 10px;">Xem thêm</a>
			<div class="row justify-content-center">
				<?php 
					require 'ketnoi.php';
					$sql="select * from sanpham order by masanpham DESC limit 4";
					$result=mysqli_query($ketnoi,$sql);
					$count=0;
					while($row=mysqli_fetch_array($result)){
						echo '<div class="card block wow animate__fadeIn">';
							echo '<a href="thongtin-sanpham.php?sp='.$row['masanpham'].'">';
								echo '<div class="imgg">';
									echo '<img src="'.$row['hinhanh'].'" alt="" class="imggs">';
								echo '</div>';
								echo '<div class="namee">';
									echo $row['tensanpham'];
								echo '</div>';
								echo '<div class="price">';
									echo number_format($row['dongia'],'0',',','.');
								echo '</div>';
							echo '</a>';
						echo '</div>';
					}
				 ?>
			 </div>

			<!-- <div class="row justify-content-center">
				<div class="card block">
					<a href="#">
						<div class="imgg">
							
						</div>
						<div class="namee">
							
						</div>
						<div class="price">
							
						</div>
					</a>
				</div>
			</div> -->
		</div>
	<!-- </div> -->
</div>

<style>
	#sort{
		margin-left: .5rem;
	}
</style>

<style>
	@media only screen and (min-width: 1440px) and (max-width: 1920px){
		.block{
			display: block;
			width: 20%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
			border: 1px solid orange;
		}
		.imgg{
			width: 100%;
			height: 200px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 60%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 11%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 20px;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

    <!-- 1440 -->
<style>
	@media only screen and (min-width: 1024px) and (max-width: 1440px){
		.block{
			display: block;
			width: 20%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
			border: 1px solid orange;
		}
		.imgg{
			width: 100%;
			height: 200px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 60%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 11%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 20px;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 320 -->
<style>
	@media only screen and (min-width: 260px) and (max-width: 320px){
		.block{
			display: block;
			width: 40%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 1.125rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		/*a,a:hover{
			text-decoration: none;
			color: inherit;
		}*/
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 120px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 15px;
			margin-bottom: 150%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 15%;
			margin-bottom: 50%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 15px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 14px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 15%;
			bottom: 15%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 14px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 375 -->
<style>
	@media only screen and (min-width: 320px) and (max-width: 375px){
		.block{
			display: block;
			width: 42.5%;
			height: auto;
			margin: .7rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 120px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 15px;
			margin-bottom: 15%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 0;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 15px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 425 -->
<style>
	@media only screen and (min-width: 375px) and (max-width: 425px){
		.block{
			display: block;
			width: 40%;
			height: auto;
			margin: .7rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 150px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 16px;
			margin-bottom: 80%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 5%;
			margin-bottom: 50%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 18px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 768 -->
<style>
	@media only screen and (min-width: 425px) and (max-width: 768px){
		.block{
			display: block;
			width: 25%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: .7rem;
			margin-left: 1.5rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 150px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 18px;
			margin-bottom: 100%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 10%;
			margin-bottom: 320%;
			right: 0;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size:20px;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 10%;
			bottom: 10%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>

<!-- 1024 -->
<style>
	@media only screen and (min-width: 768px) and (max-width: 1024px){
		.block{
			display: block;
			width: 25%;
			height: auto;
			margin-top: .7rem;
			margin-bottom: 1.5rem;
			margin-left: 3.5rem;
			padding: .5rem;
			background-color: transparent;
			vertical-align: middle;
			overflow: visible;
			border-radius: 1rem;
			transition: scale(1);
			text-decoration: none;
			position: relative;
		}
		a,a:hover{
			text-decoration: none;
			color: inherit;
		}
		.block:hover{
			transform: scale(1.1);
		}
		.imgg{
			width: 100%;
			height: 220px;
			top: 0;
			left: 0;
			/*bottom: 0;*/
			vertical-align: middle;
		}
		.imggs{
			width: 100%;
			height: 100%;
			border-radius: 1rem;
			vertical-align: middle;
			position: relative;
		}
		.namee{
			background-color: transparent;
			vertical-align: middle;
			position: relative;
			overflow: hidden;
			display: inline-block;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			font-size: 24px;
			margin-bottom: 70%;
		}
		.price{
			display: block;
			position: absolute;
			bottom: 0;
			right: 5px;
			margin-right: .5rem;
			overflow: hidden;
			color: red;
			font-weight: bold;
			text-align: right;
			font-size: 26px;
			bottom: 10%;
			margin-bottom: 25%;
		}
		.add-to-cart {
			display: block;
			position: absolute;
			width: 90%;
			margin-top: 5%;
			bottom: 0;
			margin-bottom: 5%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #09a4a4;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#09a4a4), to(#077E7E));
			background: -webkit-linear-gradient(top, #077E7E, #09a4a4);
			background: -moz-linear-gradient(top, #077E7E, #09a4a4);
			background: -ms-linear-gradient(top, #077E7E, #09a4a4);
			background: -o-linear-gradient(top, #077E7E, #09a4a4);
		}

		.add-to-cart:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
		.buy-now {
			display: block;
			position: absolute;
			width: 90%;
			margin-bottom: 8%;
			bottom: 8%;

			overflow: hidden;
			padding: 7px 0;
			border-radius: 4px;
			font-size: 16px;
			line-height: normal;
			text-transform: uppercase;
			color: #fff;
			text-align: center;
			background: #fd6e1d;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
			background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
			background: -moz-linear-gradient(top, #f59000, #fd6e1d);
			background: -ms-linear-gradient(top, #f59000, #fd6e1d);
			background: -o-linear-gradient(top, #f59000, #fd6e1d);
		}

		.buy-now:hover {
			box-shadow: 0 0.0625rem 20px 0 rgba(0, 0, 0, .05);
			-webkit-transform: translateY(-.0625rem);
			transform: translateY(-.0625rem);
			z-index: 1;
			z-index: 2;
			overflow: visible;
		}
	}
</style>