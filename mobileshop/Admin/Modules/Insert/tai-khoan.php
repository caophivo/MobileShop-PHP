<h1><center>Thêm tài khoản</center></h1>
<div id="wrapper_sanpham">
<form action="../../Handling/Admin_XuLyInsertTaiKhoan.php" method="POST" enctype="multipart/form-data">
	<div id="frmUpdate_SP">
		<label>Ma loai: </label>
		<select name="nbml">
			<option>Admin</option>
			<option>Nguoi dung</option>
		</select><br>
		<label>Ten Tai Khoan: </label>
		<input name="txtTaiKhoan" type="text" value="" required> <br>
		<label>Mat khau: </label>
		<input name="txtMatKhau" type="text" value="" required> <br>
		<label>Ho Ten: </label>
		<input name="txtHoTen" type="text" value="" required> <br>
		<label>Ngay Sinh: </label>
		<input name="dateNS" type="date" required> <br>
		<label>Dia Chi: </label>
		<input name="txtDiaChi" type="text" value="" required> <br>
		
		<input type="submit" name="submit" id="btnInsertSP" value="Insert">
	</div>
</form>
</div>


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
