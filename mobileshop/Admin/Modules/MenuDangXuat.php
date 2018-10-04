<?php 
	echo '<div id="menuDangXuat">
			<div id="nutNhonDangXuat"></div>
			<nav class="menuDangXuat">
				<a id="btnDangXuat" href="Handling/XuLyDangXuat_Admin.php">Đăng xuất</a>
				<a id="btnDongDangXuat" href="#">Đóng</a>
			</nav>
		</div>';

 ?>

 <script type="text/javascript">
 	$(document).ready(function() {
 		$('#user_admin').click(function(event) {
 			$('#menuDangXuat').css('visibility', 'visible');
 		});
 		$('#btnDongDangXuat').click(function(event) {
 			$('#menuDangXuat').css('visibility', 'hidden');
 		});
 	});
 </script>

<style type="text/css">
#menuDangXuat{
	width: 100px;
	height: 79px;
	z-index: 4;
	left: 91.5%;
	top: 70px;
	background-color: #F6DD0E;
	position: absolute;
	visibility: hidden;
	border: 1px solid white;
	box-shadow: 0 0 5px #F6DD0E;
}

#menuDangXuat table{
	width: 100px;
	height: 100px;
	border: 1px solid white;
}

#nutNhonDangXuat{
	background-color: #F6DD0E;
	width: 14px;
	height: 14px;
	margin-left: 42px;
	margin-top: -8px;
	transform: rotateZ(45deg);
	border-style: solid;
	border-color:  white;
    border-width: 1px 0px 0px 1px;
}

.menuDangXuat{
	width: 100%;
	margin-top: 10px;
}

.menuDangXuat a{
	display:block;;
	text-decoration: none;
	width: 100%;
	height: 30px;
	color: black;
	line-height: 30px;
	border-style: solid;
	border-color:  white;
    border-width: 1px 0px 0px 0px;
}

nav a:hover, nav a.actmenu {
    background-color: #EEEFC8;
}
</style>