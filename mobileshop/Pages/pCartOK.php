<div class="Cart">
 	<h2>Giỏ hàng của bạn</h2> <hr>
	<?php 
	if(isset($_SESSION["maSP"])){
		$tongTien = 0;
		$dem = 0;
		for($i = 0; $i < count($_SESSION["maSP"]); $i++) {
			$id = $_SESSION["maSP"][$i];

			$sql = "SELECT sp.ID, sp.TenSanPham, sp.Gia, sp.Img FROM `sanpham` sp WHERE sp.ID=$id";
			$result = DataProvider::ExecuteQuery($sql);
			$row = mysqli_fetch_array($result);
	?>
		<div class="hinhSP_Cart">
			<a href="index.php?a=2&idsp=<?php echo $id; ?>">		
				<img src="Images/<?php echo $row["Img"]; ?>" width="100" height="100" style="float: left;  margin-top: 20px;" />
			</a>
			<a href="Handling/XuLyXoaSanPhamGioHang.php?delete=<?php echo $i; ?>" style="border-radius: 25px; color: red; text-decoration: none; line-height: 50px; margin-left: 40px; text-align: center;">Xóa</a>
		</div>
		<div class="thongTinSP_Cart">
			 <h3><?php echo $row["TenSanPham"]; ?></h3>
			 > Tặng gói bảo hiểm rơi vỡ HOẶC Trả góp 0% với HSBC, CitiBank, Home Credit (đến 31/12) <br>
			 > Cơ hội trúng 1 trong 3 xe Liberty khi mua iPhone tại Hà Nội (đến 31/12) <br>
			 > Giảm ngay 5% khi Mua Laptop/ Tablet (đến 31/12)
		</div>
		<div class="gia_Cart">
			 <font style="color: red;"><?php echo number_format($row["Gia"], 0, '.', '.'); ?><ins>đ</ins></font>
			 <div class="congTru_Cart">
			 	<a href="Handling/XuLyUpdateMinusCart.php?idsp=<?php echo $id; ?>">-</a>
			 	<label class="lblSoLuongSP"><?php echo $_SESSION['soLuongSP'][$i]; ?></label>
			 	<a href="Handling/XuLyUpdatePlusCart.php?idsp=<?php echo $id; ?>">+</a>
			 </div>
		</div>
		<hr>
	<?php
			$tongTien += $_SESSION["soLuongSP"][$i] * $row["Gia"];
			$dem += $_SESSION["soLuongSP"][$i];
		}

		if(isset($_SESSION["maSP"]) == true && count($_SESSION["maSP"]) != 0){
	?>
			<div class="tongTien_Cart">
				<h2>Tổng tiền:</h2>
				<h3><font style="color: red;"><?php echo number_format($tongTien, 0, '.', '.'); ?><ins>đ</ins></font></h3>
			</div>
			<div class="gach">
				<hr>
			</div>
			<div id="divabtnDatHang">
				<a class="abtnDatHang" href="Handling/XuLyDatHang.php?tong=<?php echo $tongTien; ?>">Đặt hàng</a>
			</div>
	<?php
		}else{
			echo "Giỏ hàng rỗng!";
		}
	?>
	
<?php
	}else{
		echo "Giỏ hàng rỗng!";
	}
?>
</div>



 <style type="text/css">
.Cart{
	margin: auto;
	width: 700px; 
	min-height: 500px;
	background-color: white; 
	margin-top: -10px;
}

.hinhSP_Cart{
	float: left;
	width: 100px;
	height: 200px;
}

 .thongTinSP_Cart{
	 float: left;
	 width: 400px;
	 height: 200px;
	 margin: 0px 10px;
 }

 .gia_Cart{
	float: right;
	width: 180px;
	height: 200px;
}

.congTru_Cart{
	top: 100%;
	width: 180px;
	height: 40px;
	margin-top: 140px;
}

.congTru_Cart a{
	text-decoration: none;
	float: left;
	width: 50px;
	height: 40px;
	text-align: center;
	line-height: 40px;
	font-weight: bold;
	font-size: 25px;
	color: blue;
	box-shadow:  0 0 1px 1px #d9d9d9;
}

.congTru_Cart label{
	float: left;
	width: 50px;
	height: 40px;
	text-align: center;
	line-height: 40px;
	font-weight: bold;
	box-shadow:  0 0 1px 1px #d9d9d9;
}

.tongTien_Cart{
	float: left;
	width: 640px;
	margin-top: 10px;
	margin-left: 30px;
}

.tongTien_Cart h3{
	margin-top: -45px;
	float: right;
}

.gach{
	width: 100%;
	float: left;
}

#divabtnDatHang{
	margin-left: 20%;
}

#divabtnDatHang a{
	width: 400px;
	height: 50px;
	background-color: orange;
	color: white;
	text-decoration: none;
	display: table-cell;
	border-radius: 7px;
	text-align: center;
	line-height: 50px;
	font-size: 20px;
}


.abtnDatHang{
	width: 400px;
	height: 50px;
	background-color: orange;
	color: white;
	text-decoration: none;
	display: table-cell;
	border-radius: 7px;
	text-align: center;
	line-height: 50px;
	font-size: 20px;
}
 </style>

