
<?php 
	session_start();
 ?>

<script type="text/javascript">

	 	window.onscroll = function() {myFunction()};
		function myFunction() {
		    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		        document.getElementById("toTop").style.visibility = '';
		    } else {
		        document.getElementById("toTop").style.visibility = 'hidden';
		    }
		}

	 	function topSCR(){
	  		var id = setInterval(frame, 2);
	  		function frame() {
		    	if(document.body.scrollTop > 0){
	 				document.body.scrollTop -= 10;
	 			} else{
	 				clearInterval(id);
	 			}
  			}
	 	}

		function showLogin(){
			var elem = document.getElementById("fromLogin");
		  	var pos = -50;
		  	var id = setInterval(frame, 1);
		  	function frame() {
				if (pos == 50) {
				    clearInterval(id);
				} else {
				    pos += 1;
				    elem.style.top = pos + '%';
				}
	  		}
	  		document.getElementById("frmNen").style.visibility = '';
		}

		function hideLogin(){
			var elem = document.getElementById("fromLogin");
		  	var pos = 50;
		  	var id = setInterval(frame, 1);
		  	function frame() {
				if (pos == -50) {
				    clearInterval(id);
				} else {
				    pos -= 1;
				    elem.style.top = pos + '%';
				    $('#contentLoad').html('');
				    $('#txtUserName').val('');
				    $('#txtPassword').val('');
				}
	  		}
	  		document.getElementById("frmNen").style.visibility = 'hidden';
		}

		function showRegister(){
			var elem = document.getElementById("fromRegister");
		  	var pos = -50;
		  	var id = setInterval(frame, 1);
		  	function frame() {
				if (pos == 50) {
				    clearInterval(id);
				} else {
				    pos += 1;
				    elem.style.top = pos + '%';
				 }
	  		}
	  		document.getElementById("frmNen").style.visibility = '';
		}

		function hideRegister(){
			var elem = document.getElementById("fromRegister");
		  	var pos = 50;
		  	var id = setInterval(frame, 1);
		  	function frame() {
				if (pos == -50) {
				    clearInterval(id);
				} else {
				    pos -= 1;
				    elem.style.top = pos + '%';
				    
				}
	  		}	
	  		document.getElementById("frmNen").style.visibility = 'hidden';
		}

		function hideLogin_Register(){
			var elem = document.getElementById("fromRegister");
			var elem1 = document.getElementById("fromLogin");
		  	if(elem.style.top == 50 + '%'){
		  		hideRegister();
		  	}
		  	if(elem1.style.top == 50 + '%'){
		  		hideLogin();
		  	}
	  		document.getElementById("frmNen").style.visibility = 'hidden';
		}

		$(document).ready(function() {
			$('#btnCart').click(function(event) {
				<?php 
					if(isset($_SESSION['nguoiDung']) == false){
				?>
					$("#btnCart").attr('href', 
					'javascript:showLogin();');
				<?php
					}
				 ?>
			});

			//sự kiện tìm kiếm
			$('#inputSearch').keydown(function(event) {
				if(event.which == 13 || event.keyCode == 13){
					var key1 = $(this).val();
					$.get("Pages/pSearchProduct.php", {'key':key1}, function(data) {
						$("#content").append(data);
					});
				}
			});
			//hiden loadding
			//$("#frmLoadding").delay(1000).fadeOut();
			// $("#frmLoadding").fadeOut(3000, function() {
			// 	$(body).fadeIn(1000);
			// });


		});
	 	 
</script>
	<div id="header">
		<div id="logo">
			<a href="index.php?a=0">Mobile Shop</a>
		</div>
		<form action="index.php?a=6" method="POST">
			<div id="search">
				<input id="inputSearch" placeholder="Bạn tìm gì..." autocomplete="on" type="text" name="timkiem" value="" />
			</div>
		</form>
		<div id="listButton">
			<nav class="listDanhMucSP">
				<?php
					$sql = "SELECT ID, TenLoai, Icon, IDName FROM `loai` WHERE DaXoa=0";
					$result = DataProvider::ExecuteQuery($sql);
					$i = 1;
    				while($row = mysqli_fetch_array($result)){
    					$idLoai = $row['ID'];
    					$tenLoai = $row['TenLoai'];
    					$icon = $row['Icon'];
    					$idName = $row['IDName'];
       					echo '<a href="index.php?a=1&id='.$idLoai.'" name="'.$idName.'" id="'.$idName.'">
							<img src="Images/Icons/'.$icon.'" alt=""> <br>
							'.$tenLoai.'
							</a>';
						$i++;
    				}
				 ?>
			</nav>
		</div>
		<div id="dangNhap">
			<?php 
				if(isset($_SESSION['nguoiDung']) == false){
			?>
				<a href="javascript:showLogin();">Đăng nhập</a> | 
				<a href="javascript:showRegister();">Đăng ký</a>
			<?php
				} else{
			?>
				<a href="#" id="user">
					<img src="Images/Icons/user.png" alt="">
				</a>
				<nav id="icon_Cart">
					<a id="btnCart" href="index.php?a=3">
						<label for="" id="SL_Cart">
							<!-- lay so luong san pham vao gio hang -->
							 <?php
								if(isset($_SESSION['demSoLuongSP'])){
								// $cart = unserialize(serialize($_SESSION['cart']));
									echo $_SESSION['demSoLuongSP'];
								}else{
									echo 0; 
								}
							?>
						</label>
						<img src="Images/Icons/cart.png" alt="">
					</a>
				</nav>
			<?php
				}
			?>
		</div>
		<!-- frm dang nhap -->
		<div id="frmNen" style="position: fixed; width: 100%; height: 100%; background-color: black; overflow-y: auto; opacity: 0.7; visibility: hidden; z-index: 3;" onclick="hideLogin_Register();">
		</div>
		<!-- <div id="frmLoadding" style="position: fixed; width: 100%; height: 100%; background-color: white; overflow-y: auto; z-index: 3;">
			<?php //include_once('Modules/mLoadding.php'); ?>
		</div> -->
		<!-- -300px; -->
		<div id="fromLogin" style="position: fixed; width: 450px; height: 220px; background-color: white; z-index: 4; top: -50%; margin-top: -110px; left: 50%; margin-left: -225px; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
				<?php include_once('Modules/frmLogin.php') ?>
		</div>
		<div id="fromRegister" style="position: fixed; width: 780px; height: 420px; background-color: white; z-index: 4; top: -50%; margin-top: -210px; left: 50%; margin-left: -390px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
				<?php include_once('Modules/frmRegister.php') ?>
		</div>
		<!-- nut chay len dau trang -->
		<div id="toTop" onclick="topSCR()" style="position: fixed; width: 50px; height: 50px; background-color: none; z-index: 1; top: 90%; left: 96%; visibility: hidden; background-image: url(Images/Icons/toTop.png);">
		</div>
	</div>

<style>
	<style type="text/css">
.listDanhMucSP{
	text-align: center;
	width: 57px;
	margin: auto;
}

nav a:hover, nav a.actmenu {
    background-color: #EEEFC8;
}

a:-webkit-any-link {
    color: -webkit-link;
    text-decoration: underline;
    cursor: auto;
}

.listDanhMucSP a{
	display: table-cell;
	width: 90px;
	height: 57px;
	text-decoration: none;
	cursor: pointer;
	background-color: #F6DD0E;
	text-align: center;
    text-transform: uppercase;
    position: relative;
    color: black;
}

#logo{
	margin-left: 75px;
	float: left;
}

#logo a{
	height: 57px;
	width: 150px;
	display: table-cell;
	background-color: black;
	color: #F6DD0E;
	text-decoration: none;
	text-align: center;
	position: relative;
	line-height: 57px;
}

#search{
	background-color: black;
	width: 250px;
	height: 57px;
	margin: 0px;
	float: left;
}
#search input{
	height: 30px;
	width: 220px;
	border-radius: 7px;
	margin: 10px 0;
	
}

#listButton{
	float: left;
}

#dangNhap{
	width: 200px;
	height: 57px;
	float: right;
}

#dangNhap #user{
	margin-top: 5px;
	margin-right: 10px;
	float: left;
}

#dangNhap a{
	text-decoration: none;
	line-height: 55px;
}

#icon_Cart{
	height: 40px;
	float: left;
	background-color: #29F75E;
	margin-top: 10px;
}

#icon_Cart label{
	color: red;
	float: right;
	font-weight: bold;
	font-size: 20px;
	text-align: left;
	width: 42px;
	
}

#icon_Cart a{
	float: left;
	width: 90px;
	height: 40px;
	text-decoration: none;
	cursor: auto;
	background-color: #F6DD0E;
	text-align: center;
    text-transform: uppercase;
    position: relative;
    color: black;
}

</style>