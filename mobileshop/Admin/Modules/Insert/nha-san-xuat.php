<h1><center>Thêm hãng sản xuất</center></h1>
<div id="wrapper_sanpham">
<form action="../../Handling/Admin_XuLyInsertSanPham.php" method="POST" enctype="multipart/form-data">
	<div id="frmUpdate_SP">
		<label>Tên sản phẩm: </label>
		<input name="txtTenSanPham" type="text" value="" required> <br>
		<label>Loại sản phẩm: </label>
		<select name="txtLoai" id="txtLoai">'
		<?php 
			require_once '../../../Libs/DataProvider.php';
			$sql1 = "SELECT TenLoai FROM `loai`";
				$result1 = DataProvider::ExecuteQuery($sql1);
				$i1 = 1;
				while($row1 = mysqli_fetch_array($result1)){
					$tenloai1 = $row1['TenLoai'];
					echo "<option>$tenloai1</option>";
					$i1++;
				}
		 ?>
		 </select><br>
		<label>Hãng sản xuất: </label>
		<select name="txtHangSanXuat" id="txtHangSanXuat">
		<?php
			$sql2 = "SELECT NhaSanXuat FROM `nhasanxuat`";
			$result2 = DataProvider::ExecuteQuery($sql2);
			$i2 = 1;
			while($row2 = mysqli_fetch_array($result2)){
				$nhasanxuat2 = $row2['NhaSanXuat'];
				echo "<option>$nhasanxuat2</option>";
				$i2++;
			}
		?>
		</select><br>
		<label>Số lượng: </label>
		<input name="txtSoLuong" type="text" value="" required> <br>
		<label>Giá bán: </label>
		<input name="txtGia" type="text" value="" required> <br>
		<label>Chi tiết: </label>
		<textarea name="txtChiTiet" id="chitetsp_admin" required></textarea> <br>
		<label id="lblHinhAnh">Hình ảnh: </label>
		<input id="file" type="file" name="imgProduct" / required><br>
		<input type="submit" name="submit" id="btnInsertSP" value="Insert">
	</div>
</form>
</div>
<script type="text/javascript" src="../../../Js/jquery.js"></script>
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

 #wrapper_sanpham{
 	background-color: #EEE9E9;
 	margin: auto;
 	width: 600px;
 	height: 100%;
 }

 #frmUpdate_SP{
	margin: auto;
	width: 500px;
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

  #frmUpdate_SP select{
	margin: 10px;
	width: 300px;
	height: 30px;
	float: right;
 }

 #chitetsp_admin{
 	max-width: 300px;
 	min-width: 300px;
 	min-height: 200px;
 	max-height: 300px;
 	margin: 5px;
 	margin-right: 10px;
 	margin-left: 10px;
 	float: right;
 }

#frmUpdate_SP #lblHinhAnh{
	margin-top: 170px;
}
 </style>
