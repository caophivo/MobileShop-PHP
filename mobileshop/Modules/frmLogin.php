
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
	
	$(document).ready(function() {
		$('#btnSubmit').click(function() {
			var us = $('#txtUserName').val();
			var pas = $('#txtPassword').val();
			if(us == '' || pas == ''){
				$('#contentLoad').html('Vui lòng nhập đầy đủ thông tin!');
			} else{
				$.post('Handling/XuLyLogin.php', {txtUserName: us, txtPassword: pas},function(data) {
					$('#contentLoad').html(data);
				});	
			}
		});
		//sự kiện khi enter txtpassword
		$('#txtPassword').keydown(function(event) {
			if(event.which == 13 || event.keyCode == 13){
				var us = $('#txtUserName').val();
				var pas = $('#txtPassword').val();
				if(us == '' || pas == ''){
					$('#contentLoad').html('Vui lòng nhập đầy đủ thông tin!');
				} else{
					$.post('Handling/XuLyLogin.php', {txtUserName: us, txtPassword: pas},function(data) {
						$('#contentLoad').html(data);
					});	
				}
			}
		});
	});

</script>

<div align="center">
		<!-- <form id="frmLogin" action="Modules/mxuLyLogin.php" method="post" onsubmit="return checkSubmit()">
		</form> -->
	<table width="450" height= "200" cellspacing="0" cellpadding="2" rules="groups">
		<tr>
			<td colspan="4" class="tableHeader" id="idHeader">
				ĐĂNG NHẬP
				<a href="javascript:hideLogin();" style="width: 35px; height: 35px; border-radius: 25px; float: right; background-color: white; color: black; text-decoration: none; margin-right: 1px;">x</a>
			</td>
		</tr>
		<tr id="contentLoad" style="text-align: center;"></tr>
		<tr>
			<td colspan="4" align="right"></td>
		</tr>
		<tr style="text-align: right;">
			<td width="129">
				<input style="width: 300px; height: 30px; " placeholder="Enter Username" type="text" name="txtUserName" id="txtUserName" class="normal" onfocus="hightLight(this, 1)" onblur="hightLight(this, 2)" onmouseover="hightLight(this, 3)" onmouseout="hightLight(this, 2)" />
			</td>
			<td width="58">&nbsp;</td>
		</tr>	
		<tr style="text-align: right;">
			<td>
				<input style="width: 300px; height: 30px; " placeholder="Enter Password" type="password" name="txtPassword" id="txtPassword" class="normal" onfocus="hightLight(this, 1)" onblur="hightLight(this, 2)" onmouseover="hightLight(this, 3)" onmouseout="hightLight(this, 2)" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">
				<input style="width: 300px; height: 35px; background-color: #F6DD0E; margin-right: 10px; font-weight: bold; font-size: 20px;" type="submit" name="btnSubmit" id="btnSubmit" value="Đăng nhập" />
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center">
				Bạn chưa có tài khoản? <a id="linkDangKy" href="javascript:hideLogin(); javascript:showRegister();">Đăng ký tại đây</a>
			</td>
		</tr>
	</table>	
</div>

<style>

#linkDangKy{
	text-decoration: none;
}

.tableHeader{
	background-color: #F6DD0E;
	color: black;
	font-weight: bold;
	font-size: 25px; 
	text-align: center;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
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

#btnSubmit{
	margin: 5px 0px;
}

</style>