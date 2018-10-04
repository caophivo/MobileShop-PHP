<?php
require_once '../Libs/DataProvider.php';
	if(isset($_GET['offset']) && isset($_GET['limit']) && isset($_GET['idLoaiSP'])){
		$offset = $_GET['offset'];
		$limit = $_GET['limit'];
		$idLoaiSP = $_GET['idLoaiSP'];
		$strQuery = "";
		$strQuery = "SELECT sp.ID, sp.TenSanPham, sp.Gia, sp.ChiTiet, sp.Img FROM `sanpham` sp WHERE sp.Maloai=$idLoaiSP AND sp.DaXoa=0";
		$sql = "$strQuery ORDER BY sp.ID DESC LIMIT {$limit} offset {$offset};";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;

    	while($row = mysqli_fetch_array($result)){
    		$idsp = $row['ID'];
    		$tensp = $row['TenSanPham'];
	        $gia = number_format($row['Gia'], 0, '.', '.');
	        $img = $row['Img'];
	        $ChiTiet = $row['ChiTiet'];
		echo 
		'<ul class="homeproduct">
			<li>
				<a class="bginfo_02" href="index.php?a=2&idsp='.$idsp.'">
					<img src="Images/'.$img.'" width="200" height="150" style="float: left; " />
					<div style="width: 190px; height: 150px; float: left; padding-top: 30px;">
						<p><font style="color: red; font-size: 14px;">Khuyến mãi:</font> <br></p>
						<p>>Trả góp 0%</p>
						<p>>Rút thăm trúng thưởng 1000 chỉ vàng</p>
						<p>>Tặng voucher 200.000đ</p>
					</div>
					<h3>'.$tensp.'</h3>
					<strong>'.$gia.'<ins>đ</ins></font></strong>
					<label>>Trả góp 0%</label>
				</a>
				<a class="bginfo" href="index.php?a=2&idsp='.$idsp.'">
					<div style="width: 100%;">
						<h2>'.$tensp.'</h2>
						<strong>'.$gia.'<ins>đ</ins></font></strong>
						<div>
							'.$ChiTiet.' <br>
							<font style="color: red;">Khuyến mãi:</font> <br>
							> Trả góp 0% <br>
							> Đế sạc cao cấp
						</div>
					</div>
		        </a>
			</li>
		</ul>';
 		$i++;
    }
}
?>


<style type="text/css">

.homeproduct{
	background-color: red;
	width: 100%;
	margin-left: -35px;
}

.homeproduct li{
	float: left;
    position: relative;
    width: 33.33%;
    height: 250px;
    margin: 0 0 10px;
    overflow: hidden;
    cursor: pointer;
}

.homeproduct li .bginfo_02{
	color: black;
	font-weight: bold;
}

.homeproduct li .bginfo_02 h3{
   margin: 0 0 0 10px;
   width: 100%;
   display: block;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
}

.homeproduct li .bginfo_02 strong{
	float: left;
    font-size: 14px;
    color: red;
   	margin: 20px 0 0 10px;
}

.homeproduct li .bginfo_02 label{
	margin: 20px 10px 0 0;
    background-color: orange;
    border-radius: 25px 10px 10px 25px;
    float: right;
}

.homeproduct li .bginfo_02 div p{
   margin: 5px;
}

.homeproduct li a{
	display: block;
    overflow: hidden;
    width: 97.5%;
    height: 100%;
    background: #fff;
    cursor: pointer;
    font-size: 80%;
    text-decoration: none;
}

.homeproduct li .bginfo {
    background: #fff;
    width: 97.5%;
    height: 100%;
    color: #000;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    transition-duration: 1s;
    opacity: 0;
}

.homeproduct li .bginfo:hover{
	transition-duration: 1s;
	opacity: 1;
}

.bginfo div h2{
	color: blue;
	margin: 10px;
	margin-bottom: 0px;
	width: 240px;
	float: left;
}

.homeproduct li .bginfo strong{
    font-size: 18px;
    color: red;
    margin: 10px;
    margin-left: 0px;
    float: right;
}

.homeproduct li .bginfo div div{
	width: 100%;
	margin-top: 10px;
    padding-top: 10px;
    font-size: 15px;
	border-top: 2px solid #ddd;
	float: left;
	margin-left: 10px;
}

</style>