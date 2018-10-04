<?php 
require_once '../../Libs/DataProvider.php';
	if(isset($_GET['update-loai-sp'])){
		$id = $_GET['update-loai-sp'];
		$sql = "SELECT * FROM `loai` WHERE ID=$id";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$ten = $row['TenLoai'];
    		$icon = $row['Icon'];
    		$idName = $row['IDName'];
	        $daxoa = $row['DaXoa'];

	        echo ' <h1>Cập nhật loại sản phẩm</h1>
	        <div id="wrapper_updateSP">
	        <form action="../Handling/Admin_XuLyUpdateLoaiSanPham.php" method="POST" enctype="multipart/form-data">
	        	<div id="frmUpdate_SP">
	        		<label>ID sản phẩm: </label>
				 	<input name="txtIDLoai" type="text" value="'.$id.'" required> <br>
				 	<label>Tên loại: </label>
				 	<select name="txtTenLoai" id="txtLoai">';
				 	$sql1 = "SELECT TenLoai FROM `loai`";
					$result1 = DataProvider::ExecuteQuery($sql1);
					$i1 = 1;
					while($row1 = mysqli_fetch_array($result1)){
						$tenloai1 = $row1['TenLoai'];
						echo "<option>$tenloai1</option>";
						$i1++;
					}
					echo'</select><br>
				 	<label>Icon hiện tại: </label>
				 	<input name="txtIcon" type="text" value="'.$icon.'"> <br>
				 	<img src="../../Images/Icons/'.$icon.'" id="viewImgUpload" width="100" height="100" alt=""> <br>
				 	<label>Chọn icon khác: </label>
				 	<input id="file" type="file" name="imgProduct" /><br>
				 	<input type="hidden" name="txtIDName" value="'.$idName.'">
					<input type="submit" name="submit" id="btnUpdateLoaiSP" value="Update">
				 </div>
			</form>
			</div>';
 			$i++;
    	}
	}
 ?>

<script type="text/javascript" src="../../Js/jquery.js"></script>
<script>
	$(document).ready(function() {
		var indexLoai = $('input[name=txtIDLoai]').val();
		$("select#txtLoai")[0].selectedIndex = indexLoai;

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