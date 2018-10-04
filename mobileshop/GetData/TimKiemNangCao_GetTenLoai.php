<?php
	if (isset($_GET['id'])) {
		$idLoaiSP = $_GET['id'];
		$sql = "SELECT l.TenLoai  FROM `loai` l WHERE l.ID=$idLoaiSP AND l.DaXoa=0";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		$loaiSP = mysqli_fetch_array($result)['TenLoai'];
		echo '<div id="tenloaisanpham">
				'.$loaiSP.':
			</div>';
	}
 ?>

 <style type="text/css">
 #tenloaisanpham{
	height: 40px;
	float: left;
	line-height: 40px;
	margin-left: 20px;
 }
 </style>