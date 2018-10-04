<script type="text/javascript">
	function hightLight(control, flag) {
		switch(flag){
			case 1:
				control.className = "onFocus";
				break;	
			case 2:
				control.className = "normal";
				break;
			case 3:
				control.className = "onMouseOver";
				break;
		}
	}

	function checkSubmit(){
		var username = document.getElementById("txtUserName");
		if (username.value == ""){
			alert("Vui lòng nhập tên đăng nhập!");
			username.focus();
			return false;
		}

		var password = document.getElementById("txtPassword");
		if (password.value == ""){
			alert("Vui lòng nhập mật khẩu!");
			password.focus();
			return false;
		}
	}

	$(document).ready(function() {
		var checkDangKy = false;
		$('#thongTinTaiKhoan label').css('color', 'red');
		$('#txtTenDangNhap').blur(function(event) {
			var taikhoan = $(this).val();
			$.get('Check/CheckRegister/checkUsername.php', {us: taikhoan}, function(data){
				if(data == 0){
					$('#txtTenDangNhap').css('border-color', 'blue');
					$('#txtTenDangNhap').css('color', 'blue');
					$('#lblCheckUS').css('color', 'blue');
					$('#lblCheckUS').html('&#10004');
					checkDangKy = true;
				} else{
					$('#txtTenDangNhap').css('border-color', 'red');
					$('#txtTenDangNhap').css('color', 'red');
					$('#lblCheckUS').css('color', 'red');
					$('#lblCheckUS').html('&#9888;');
					checkDangKy = false;
				}
			});	
		});

		$('#txtMatKhau').blur(function(event) {
			var matkhau = $(this).val();
			if(matkhau.length < 8){
				$('#txtMatKhau').css('border-color', 'red');
				$('#txtMatKhau').css('color', 'red');
				$('#lblCheckPW').css('color', 'red');
				$('#lblCheckPW').html('&#9888;');
				checkDangKy = false;
			}else{
				$('#txtMatKhau').css('border-color', 'blue');
				$('#txtMatKhau').css('color', 'blue');
				$('#lblCheckPW').css('color', 'blue');
				$('#lblCheckPW').html('&#10004');
				checkDangKy = true;
			}
		});

		$('#txtXacNhanMatKhau').blur(function(event) {
			var matkhau = $('#txtMatKhau').val();
			var xacnhanmatkhau = $(this).val();
			if(matkhau == xacnhanmatkhau && xacnhanmatkhau.length != 0 && xacnhanmatkhau.length >= 8){
				$('#txtXacNhanMatKhau').css('border-color', 'blue');
				$('#txtXacNhanMatKhau').css('color', 'blue');
				$('#lblCheckCF').css('color', 'blue');
				$('#lblCheckCF').html('&#10004');
				checkDangKy = true;
			}else{
				$('#txtXacNhanMatKhau').css('border-color', 'red');
				$('#txtXacNhanMatKhau').css('color', 'red');
				$('#lblCheckCF').css('color', 'red');
				$('#lblCheckCF').html('&#9888;');
				checkDangKy = false;
			}
		});

		$('#txtMaKiemTra').blur(function(event) {
			var captcha = $(this).val();
			if(captcha.length != 6) {
				$('#thongBaoDK').html('Vui lòng kiểm tra lại thông tin!');
				$('#txtMaKiemTra').css('border-color', 'red');
				$('#txtMaKiemTra').css('color', 'red');
				checkDangKy = false;
			}else{
				$('#thongBaoDK').html('');
				$('#txtMaKiemTra').css('border-color', 'blue');
				$('#txtMaKiemTra').css('color', 'blue');
				checkDangKy = true;
			}
		});

		$('#btnDangKyTaiKhoan').click(function() {
			var captcha = $('#txtMaKiemTra').val();
			if(captcha.length == 6){
				if(checkDangKy == true){
					var hoten =  $('#txtHoTen').val();
					var ngaysinh = $('#txtNgaySinh').val();
					var diachi = $('#txtDiaChi').val();
					var taikhoan = $('#txtTenDangNhap').val();
					var matkhau = $('#txtMatKhau').val();
					var kiemtramatkhau = $('#txtXacNhanMatKhau').val();
					var captcha = $('#txtMaKiemTra').val();
					if (captcha == ''){
						$('#thongBaoDK').html('Vui lòng nhập đầy đủ thông tin!');
					} else{
						$.post('Handling/XuLyDangKy.php', {txtHoTen: hoten, txtNgaySinh:ngaysinh, txtDiaChi: diachi, txtTenDangNhap: taikhoan, txtMatKhau: matkhau,txtMaKiemTra: captcha},function(data) {
							if(data == 0){
								$('#thongBaoDK').html("Vui lòng kiểm tra lại thông tin!");
							} else{
								$('#thongBaoDK').html('<font style="color: blue;">Đăng ký tài khoản thành công</font>');
								$('#txtTenDangNhap').val('');
								$('#txtMatKhau').val('');
								$('#txtXacNhanMatKhau').val('');
								$('#txtMaKiemTra').val('');
							}
						});	
					}
				} else{
					$('#thongBaoDK').html('Vui lòng kiểm tra lại thông tin!');
				}
			}else{
				$('#thongBaoDK').html('Vui lòng kiểm tra lại thông tin!');
				$('#txtMaKiemTra').css('border-color', 'red');
				$('#txtMaKiemTra').css('color', 'red');
			}
			
		});
	});

</script>
<!-- <form action="Modules/mXuLyDangKy.php" method="post"> -->
	<div id="register">
		<h2>
			ĐĂNG KÝ TÀI KHOẢN
			<a href="javascript:hideRegister();" style="width: 35px; height: 35px; border-radius: 25px; float: right; background-color: white; color: black; text-decoration: none; margin-top: 3px; margin-right: 3px; text-align: center; line-height: 30px;">x</a>
		</h2>
		<div id="divthongBaoDK"><label id="thongBaoDK"></label> </div>
		<div id="register_Left">
			<p>Thông tin cá nhân</p>
			<div id="thongTinCaNhan">
				Họ tên của bạn:
				<input type="text" name="txtHoTen" id="txtHoTen" placeholder="Họ và tên" required> <br>
				Ngày sinh:
				<input type="date" name="txtNgaySinh" id="txtNgaySinh" required><br>
				Bạn sống tại:
				<select name="txtDiaChi" id="txtDiaChi" style="width: 203px; height: 30px; margin-right: 26px;" required>
					<?php include_once("m64TinhThanh.php"); ?>
				</select>
			</div>
			<p>Thông tin tài khoản</p>
			<div id="thongTinTaiKhoan">
				Tên đăng nhập: <font style="color: red;">*</font>
				<input type="text" name="txtTenDangNhap" id="txtTenDangNhap" placeholder="Tên đăng nhập" required>
				<label id="lblCheckUS">&#9888;</label>
				<br>
				Mật khẩu(>7): <font style="color: red;">*</font>
				<input type="text" name="txtMatKhau" id="txtMatKhau" placeholder="Mật khẩu" maxlength="15" required>
				<label id="lblCheckPW">&#9888;</label>
				 <br>
				Xác nhân mật khẩu: <font style="color: red;">*</font>
				<input type="text" name="txtXacNhanMatKhau" id="txtXacNhanMatKhau" placeholder="Xác nhận mật khẩu" required>
				<label id="lblCheckCF">&#9888;</label>
				<br>
			</div>
		</div>
		<!-- <div id="listCheck">dsad</div> -->
		<div id="register_Right">
			<p>Mã kiểm tra</p>
			<div id="maKiemTra">
				<img id="captcha" src="securimage/securimage_show.php" /><br>
				<a id="refreshCaptcha" href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false"><img src="Images/Icons/refresh.png"></a>
				<br>
				Nhập mã: <font style="color: red;">*</font>
				<input type="text" name="txtMaKiemTra" id="txtMaKiemTra" placeholder="Nhập mã kiểm tra" required>
			</div>
			<div id="divbtnDangKyTaiKhoan">
				<button id="btnDangKyTaiKhoan">Đăng ký</button> <br>
				Bạn đã có tài khoản? <a id="linkDangNhap" href="javascript:hideRegister(); javascript:showLogin();">Đăng nhập tại đây</a>
			</div>
		</div>
	</div>	
<!-- </form> -->


<style>

#refreshCaptcha{

}

table{
	border-color: #F6DD0E;
}

.tableHeader{
	background-color: #F6DD0E;
	color: black;
	font-weight: bold;
	font-size: 25px; 
	text-align: center;
}

#linkDangNhap{
	text-decoration: none;
}

hr{
	color: #0099FF;
	size: 2px;
}

.onFocus{
	background-color: #FCF;
	color: #390;
}

.onMouseOver{
	border-color: #C30;
	border-width: thin;
	border-style: solid;

	background-color: #FFC;
	color: #F00;
}

.normal{
	border-color: #B4CFFE;
	border-bottom-width: thin;
	border-style: ridge;
	background-color: #FFF;
	color: #000;
}

/*dinh dang*/
#register{
	/*width: 740px;*/
	width: 780px;
	background-color: white;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
}

#register_Left{
	float: left;
	border-style: solid;
	border-color:  gray;
    border-width: 0px 1px 0px 0px;
}

#register_Right{
	float: left;
	margin-left: 5px;
}

#register h2{
	text-align: center;
	background-color: #F6DD0E;
	margin: 0px;
	height: 43px;
	line-height: 43px;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
}

#divthongBaoDK{
	margin: 0px;
	text-align: center;
	height: 20px;
}

#thongBaoDK{
	color: red;
}

#register p{
	font-weight: bold;
	color: blue;
}

#thongTinCaNhan{
	width: 410px;
	text-align: right;
}

#txtHoTen{
	width: 200px;
	height: 30px;
	margin-right: 21px;
}

#txtNgaySinh{
	width: 200px;
	height: 30px;
	margin-right: 25px;
	margin-top: 5px;
}

#thongTinCaNhan select{
	width: 64.5px;
	height: 30px;
	text-align: right;
	margin: 5px 0; 
}

#thongTinCaNhan #txtNam{
	margin-right: 21px; 
}

#thongTinTaiKhoan{
	width: 410px;
	text-align: right;
}

#thongTinTaiKhoan input{
	height: 30px;
	width: 200px;
}

#txtMatKhau{
	margin: 5px 0;
}

#maKiemTra{
	width: 300px;
	margin-left: 35px;
	float: right;
}

#maKiemTra a img{
	margin: 5px 0;
}

#txtMaKiemTra{
	width: 195px;
	height: 30px;
}

#divbtnDangKyTaiKhoan{
	margin-left: 35px;
}

#btnDangKyTaiKhoan{
	height: 35px;
	width: 287px;
	background-color: #F6DD0E;
	font-weight: bold;
	font-size: 20px;
	margin: 20px 0;
}

</style>