<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mobile Shop</title>
	<link rel="stylesheet" type="text/css" href="Css/style.css">
	<script type="text/javascript" src="Js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//lấy sản phẩm theo loại sản phẩm
		var flag = 0;
		$.ajax({
			url: "GetData/GetDanhSachSanPham.php",
			type: "Get",
			data: {"offset": flag,
					"limit": 6,
					"idLoaiSP": <?php echo $_GET['id']; ?>
			},
			success: function(data){
				$(".a_listOfProduct123").append(data);
					flag += 6;
			}
		});

		$("#loadmore").click(function(event) {
			$.ajax({
				url: "GetData/GetDanhSachSanPham.php",
				type: "Get",
				data: {"offset": flag,
						"limit": 6,
						"idLoaiSP": <?php echo $_GET['id']; ?>
				},
				success: function(data){
					if(data.length > 0){
						$(".a_listOfProduct123").append(data);
						flag += 6;
					} else{
						$('.divloadmore').remove();
					}
				}
			});
		});
	});
</script>
</head>
<body>
	<div id="wrapper">
		<?php 
			include_once("Libs/DataProvider.php");
			include_once("Modules/mHeader.php");
			if(isset($_GET['id'])){
				include_once('Modules/mTimKiemNangCao.php');
			}
			if(isset($_GET['idsp']) == false){
				if(isset($_GET['a'])){
					if($_GET['a'] != 3)
						include_once('Modules/mQuangCao.php');
				}else{
					include_once('Modules/mQuangCao.php');
				}
			}
		 ?>
		 <div id="content">
		 	<?php 
		 		$a = 0;
				if(isset($_GET['a'])){
					$a = $_GET['a'];
				} 
				switch ($a) {
					case 0:
						include_once('Pages/pHome.php');
						break;
					case 1:
						include_once('Pages/pListOfProduct.php');
						break;
					case 2:
						include_once('Pages/pChiTietSanPham.php');
						break;
					case 3:
						include_once('Pages/pCartOK.php');
						break;
					case 4:
						include_once('Pages/pListOfProduct_NSX.php');
						break;
					case 5:
						include_once('Pages/pDatHangThanhCong.php');
						break;
					case 6:
						include_once('Pages/pSearchProduct.php');
						break;
					default:
						include_once('Pages/pError.php');
						break;
				}

				if(isset($_GET['id'])){
					include_once("Modules/mLoadMore.php");
					include_once("Handling/XuLyActiveKhiChonDanhMucSP.php");
				}
		 	 ?>
		</div>
		<div id="footer">
			<center>Design by 1461749</center>	
		</div>
		<?php 
			include_once("Modules/mMenuDangXuat.php");
		 ?>
	</div>
</body>
</html>