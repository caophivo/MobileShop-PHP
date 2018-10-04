<?php 
require_once '../../Libs/DataProvider.php';
	if(isset($_GET['update-sp'])){
		$id = $_GET['update-sp'];
		$sql = "SELECT sp.ID, l.ID AS idloai, nsx.ID AS idnsx, sp.TenSanPham, sp.SoLuong, sp.Gia, sp.ChiTiet, sp.Img, sp.DaXoa, nsx.NhaSanXuat, l.TenLoai FROM `sanpham` sp, `nhasanxuat` nsx, `loai` l WHERE sp.MaNhaSanXuat=nsx.ID AND sp.ID=$id AND sp.MaLoai=l.ID";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$ten = $row['TenSanPham'];
    		$loai = $row['TenLoai'];
    		$idloai = $row['idloai'];
    		$idnsx = $row['idnsx'];
    		$nhasanxuat = $row['NhaSanXuat'];
    		$soluong = $row['SoLuong'];
	        $gia = number_format($row['Gia'], 0, '.', '.');
	        $chitiet = $row['ChiTiet'];
	        $img = $row['Img'];
	        $daxoa = $row['DaXoa'];

	        echo ' <h1>Cập nhật sản phẩm</h1>
	        <div id="wrapper_updateSP">
	        <form action="../Handling/Admin_XuLyUpdateSanPham.php" method="POST" enctype="multipart/form-data">
	        	<div id="frmUpdate_SP">
	        		<label>ID sản phẩm: </label>
				 	<input name="txtIDSP" type="text" value="'.$id.'" required> <br>
				 	<label>Tên sản phẩm: </label>
				 	<input name="txtTenSanPham" type="text" value="'.$ten.'" required> <br>
				 	<label>Loại sản phẩm: </label>
				 	<select name="txtLoai" id="txtLoai">';
				 	$sql1 = "SELECT TenLoai FROM `loai`";
					$result1 = DataProvider::ExecuteQuery($sql1);
					$i1 = 1;
					while($row1 = mysqli_fetch_array($result1)){
						$tenloai1 = $row1['TenLoai'];
						echo "<option>$tenloai1</option>";
						$i1++;
					}
					echo'</select><br>
				 	<label>Hãng sản xuất: </label>
				 	<select name="txtHangSanXuat" id="txtHangSanXuat">';
				 	$sql2 = "SELECT NhaSanXuat FROM `nhasanxuat`";
					$result2 = DataProvider::ExecuteQuery($sql2);
					$i2 = 1;
					while($row2 = mysqli_fetch_array($result2)){
						$nhasanxuat2 = $row2['NhaSanXuat'];
						echo "<option>$nhasanxuat2</option>";
						$i2++;
					}
				 	echo'</select><br>
				 	<label>Số lượng: </label>
				 	<input name="txtSoLuong" type="text" value="'.$soluong.'" required> <br>
				 	<label>Giá bán: </label>
				 	<input name="txtGia" type="text" value="'.$gia.'" required> <br>
				 	<label>Chi tiết: </label>
				 	<textarea name="txtChiTiet" id="chitetsp_admin" required>'.$chitiet.'</textarea> <br>
				 	<label>Hình hiện tại: </label>
				 	<input name="txtHinhAnh" type="text" value="'.$img.'"> <br>
				 	<img src="../../Images/'.$img.'" id="viewImgUpload" width="100" height="100" alt=""> <br>
				 	<label>Chọn hình khác: </label>
				 	<input id="file" type="file" name="imgProduct" /><br>
				 	<label>Tình trạng: </label>
				 	<select name="txtTrangThaiKinhDoanh" id="txtTrangThaiKinhDoanh">
				 		<option>Đang kinh doanh</option>
				 		<option>Ngừng kinh doanh</option>
				 	</select><br>
					<input type="submit" name="submit" id="btnUpdateSP" value="Update">
				 </div>
				 <input name="txtIDNSX" type="text" style="visibility: hidden;" value="'.$idnsx.'">
				 <input name="txtIDLoai" type="text" style="visibility: hidden;" value="'.$idloai.'">
				 <input name="txtTrangThai" type="text" style="visibility: hidden;" value="'.$daxoa.'">
			</form>
			</div>'; 
			
			                   //3 phần input để lưu dữ liệu ngầm
 			$i++;
    	}
	}
 ?>

<!-- <button id="btnUpdateSP">Update</button> -->
<!-- <input name="txtLoai" type="text" value="'.$loai.'"> <br> -->
<!-- <input name="txtHangSanXuat" type="text" value="'.$nhasanxuat.'"> <br> -->

<script type="text/javascript" src="../../Js/jquery.js"></script>
<script>
	$(document).ready(function() {
		var indexLoai = $('input[name=txtIDLoai]').val();
		$("select#txtLoai")[0].selectedIndex = indexLoai;

		var indexNSX = $('input[name=txtIDNSX]').val();
		$("select#txtHangSanXuat")[0].selectedIndex = indexNSX - 1;

		var indexTrangThai = $('input[name=txtTrangThai]').val();
		$("select#txtTrangThaiKinhDoanh")[0].selectedIndex = indexTrangThai;

		//sự kiện chọn trạng thái kinh doanh
		$('#txtTrangThaiKinhDoanh').change(function(event) {
			var indexDaXoa = $(this)[0].selectedIndex;
			$('input[name=txtTrangThai]').val(indexDaXoa);
		});

		//sự kiện chọn tiệp hình
		$('#file').change(function(event) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#viewImgUpload').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		});

	});
</script>

 <style type="text/css">

h1{
	background-color: #F6DD0E;
	text-align: center;
	height: 50px;
	margin: 0px;
	padding: 0px;
	margin-bottom: 5px;
}

#wrapper_updateSP{
	background-color: #EEE9E9;
 	margin: auto;
 	width: 600px;
 	height: 100%;
}

 #frmUpdate_SP{
	background-color: #EEE9E9;
	margin: auto;
	width: 500px;;
 }

 #frmUpdate_SP input{
	margin: 10px;
	width: 300px;
	height: 30px;
	float: right;
 }

 #frmUpdate_SP label{
	margin: 10px;
	height: 30px;
	width: 100px;
	float: left;
 }

 #chitetsp_admin{
 	max-width: 300px;
 	min-width: 300px;
 	min-height: 50px;
 	max-height: 100px;
 	margin: 5px;
 	margin-right: 10px;
 	float: right;
 }

 #frmUpdate_SP select{
 	margin: 10px;
	width: 300px;
	height: 30px;
	float: right;
 }
 </style>