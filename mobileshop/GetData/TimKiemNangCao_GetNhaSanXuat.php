<?php
	if (isset($_GET['id'])) {
		$idLoaiSP = $_GET['id'];
		$sql = "SELECT DISTINCT sp.MaNhaSanXuat, nsx.NhaSanXuat FROM `sanpham` sp, `nhasanxuat` nsx WHERE MaLoai=$idLoaiSP and nsx.ID=sp.MaNhaSanXuat AND nsx.DaXoa=0";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
    	while($row = mysqli_fetch_array($result)){
    		$MaNhaSanXuat = $row['MaNhaSanXuat'];
	        //$gia = number_format($row['Gia'], 0, '.', '.');
	        $NhaSanXuat = $row['NhaSanXuat'];

			echo '<div class="danhsachNSX">
					<nav>
						<a href="index.php?a=4&id='.$idLoaiSP.'&idnsx='.$MaNhaSanXuat.'" title="">'.$NhaSanXuat.'</a>
					</nav>
				</div>';
 		$i++;
    	}
	}
 ?>

<style type="text/css">
.danhsachNSX{
 	height: 40px;
 	float: left;
 	text-align: center;
 	line-height: 40px;
}

.danhsachNSX nav{
 	margin: 0 10px;
 	height: 40px;
}

.danhsachNSX nav a{
 	text-decoration: none;
 	color: blue;
 	display: block;
}

.danhsachNSX nav a:hover{
 	color: black;
}
 </style>