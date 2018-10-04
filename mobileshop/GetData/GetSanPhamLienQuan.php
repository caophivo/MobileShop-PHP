<?php
require_once '../Libs/DataProvider.php';
	$id = $_GET['idgsplq'];
	//lấy loại sản phẩm
	$sql1 = "SELECT sp.Gia, sp.MaLoai FROM `sanpham` sp WHERE sp.ID=$id AND sp.DaXoa=0";
	$result1 = DataProvider::ExecuteQuery($sql1);
	while ($row1 = mysqli_fetch_array($result1)){
		$gia1 = $row1['Gia'];
		$loaisp = $row1['MaLoai'];
	}

	$sql = "SELECT sp.ID, sp.TenSanPham, sp.Gia, sp.ChiTiet, sp.Img FROM `sanpham` sp WHERE ABS($gia1-sp.Gia)<=1000000 AND sp.ID!=$id AND sp.MaLoai=$loaisp LIMIT 5";
	$result = DataProvider::ExecuteQuery($sql);
	$i = 1;
    while($row = mysqli_fetch_array($result)){
    	$idsplq = $row['ID'];
    	$tensp = $row['TenSanPham'];
	    $gia = number_format($row['Gia'], 0, '.', '.');
	    $img = $row['Img'];
	    $ChiTiet = $row['ChiTiet'];
	    echo '
	    	<a href="index.php?a=2&idsp='.$idsplq.'">
	    		<div id="splienquan">
	    			<img src="Images/'.$img.'" alt="">
					<div id="thongtinsplq">
						'.$tensp.' <br>
						<font style="color: red;">'.$gia.'<ins>đ</ins></font> <br>
						'.$ChiTiet.'
					</div>
	    		</div>
			</a>
	    ';
	}
 ?>