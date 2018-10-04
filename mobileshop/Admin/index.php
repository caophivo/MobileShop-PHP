<?php 
session_start();
	if(isset($_SESSION['admin']) == false){
		header('location: ../');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<link rel="stylesheet" href="">
	<script type="text/javascript" src="../Js/jquery.js"></script>
	
<script type="text/javascript">
	$(document).ready(function() {

		//sự kiện chọn bộ lọc
		$('#boLocNSX').change(function(event) {
			var nsx = $(this).val();
			var loaisp = $('#boLocLoai').val();
			var p = "<?php echo $_GET['p']; ?>";
			$.get("GetData/BoLoc/BoLoc_GetDanhSachSanPham.php",{'b-nsx':nsx, 'b-loaisp':loaisp, 'p':p}, function(data) {
				$("#content_admin").html(data);
			});
		});

		//sự kiện chọn bộ lọc
		$('#boLocLoai').change(function(event) {
			var nsx = $('#boLocNSX').val();
			var loaisp = $(this).val();
			var p = "<?php echo $_GET['p']; ?>";
			$.get("GetData/BoLoc/BoLoc_GetDanhSachSanPham.php",{'b-nsx':nsx, 'b-loaisp':loaisp, 'p':p}, function(data) {
				$("#content_admin").html(data);
			});
		});

	});
</script>

<style type="text/css">

#wrapper_main{
	min-width: 900px;
	margin: 0px;
	padding: 0px;
}

h1{
	background-color: #F6DD0E;
	text-align: center;
	height: 50px;
	margin: 0px;
}

ul{
	padding: 0px;
	overflow: hidden;
	margin: auto;
}

#boloc{
	float: right;
	list-style: none;
	padding: 10px;
	background-color: #333;
	border: 1px solid #ccc;
}

#boloc02{
	float: right;
	list-style: none;
	padding: 10px;
	background-color: #333;
	border: 1px solid #ccc;
}

li{
	float: left;
	list-style: none;
	padding: 10px;
	background-color: #333;
	border: 1px solid #ccc;
}

li a{
	color: white;
	font-family: arial;
	text-decoration: none;
}

#wrapper_admin{
	width: 100%;
	min-height: 500px;
	background-color: #ccc;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
}

#user_admin{
	float: right;
	margin-right: 30px;
}

#bntInsert{
	float: right;
	list-style: none;
	padding: 10px;
	background-color: #333;
	border: 1px solid #ccc;
}

#bntInsert a{
	color: white;
	font-family: arial;
	text-decoration: none;
}

</style>
</head>
<body>
<div id="wrapper_main">
	<h1>
		TRANG QUẢN LÝ
		<a href="#" id="user_admin">
			<img src="../Images/Icons/user.png" alt="">
		</a>
	</h1>
	<ul id="tabs">
		<li id="loai-san-pham"><a href="index.php?p=loai-san-pham" name="loai">LOẠI SẢN PHẨM</a></li>
		<li id="nha-san-xuat"><a href="index.php?p=nha-san-xuat" name="nha-san-xuat">NHÀ SẢN XUẤT</a></li>
		<li id="tai-khoan"><a href="index.php?p=tai-khoan" name="tai-khoan">TÀI KHOẢN</a></li>
		<li id="don-dat-hang"><a href="index.php?p=don-dat-hang" name="don-dat-hang">ĐƠN ĐẶT HÀNG</a></li>
		<li id="san-pham"><a href="index.php?p=san-pham" name="san-pham">SẢN PHẨM</a></li>
		<li id="bntInsert"><a href="Modules/Insert/<?php
		 if( isset($_GET['p'])){
		 	echo $_GET['p'];
		 }else{
		 	echo 'loai-san-pham';
		 }
		 ?>.php" name="">Insert</a></li>
		<?php 
			if(isset($_GET['p'])){
				if($_GET['p'] == 'san-pham'){
					include_once("Modules/mBoLocSanPham.php");
				}
			}
		 ?>
	</ul>
	<div id="wrapper_admin">
		<div id="content_admin">
			<?php
				$p = '';
				if(isset($_GET['p'])){
					$p = $_GET['p'];
				} 
				switch ($p) {
					case '':
						include_once("GetData/getDanhSachLoaiSanPham.php");
						break;
					case 'san-pham':
						include_once("GetData/getDanhSachSanPham.php");
						break;
					case 'loai-san-pham':
						include_once("GetData/getDanhSachLoaiSanPham.php");
						break;
					case 'nha-san-xuat':
						include_once("GetData/getDanhSachNhaSanXuat.php");
						break;
					case 'tai-khoan':
						include_once("GetData/getDanhSachTaiKhoan.php");
						break;
					case 'don-dat-hang':
						include_once("GetData/getDanhSachDonDatHang.php");
						break;
					default:
						include_once("GetData/getDanhSachLoaiSanPham.php");
						break;
					}
			 ?>
		</div>
	</div>
	<?php
		include_once("Modules/MenuDangXuat.php");
		include_once("Handling/Admin_XuLyActiveKhiChonDanhMuc.php");
	 ?>
</div>
</body>
</html>