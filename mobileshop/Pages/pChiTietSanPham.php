<?php
	$idSP = $_GET['idsp'];
	$sql = "SELECT sp.TenSanPham, sp.Gia, sp.ChiTiet, sp.Img FROM `sanpham` sp WHERE sp.ID=$idSP";
	$result = DataProvider::ExecuteQuery($sql);
	$i = 1;
    	while($row = mysqli_fetch_array($result)){
    		$tensp = $row['TenSanPham'];
	        $gia = number_format($row['Gia'], 0, '.', '.');
	        $img = $row['Img'];
	        $ChiTiet = $row['ChiTiet'];
		echo '<div id="wrapp_ChiTiet">
				<div class="chiTietSP">
					<h2>'.$tensp.'</h2>
					<hr>
					<img src="Images/'.$img.'" />
					<div class"chiTiet">
					 	<h3><font style="color: red;">'.$gia.'<ins>đ</ins></font></h3> <br>
						'.$ChiTiet.' <br>
						<font style="color: red;">Khuyến mãi:</font> <br>
						> Trả góp 0% <br>
						> Đế sạc cao cấp <br>
						 <a id="btnMuaNgay" href="#">Thêm vào giỏ hàng</a>
					</div>
					<div class="thongTinKyThuat">
						<hr>
						<h2>Thông tin kỹ thuật</h2>
					</div>
				</div>
				<div class="sanPhamLienQuan">
					<h2>Các sản phẩm liên quan</h2>
					<hr>
					<div class="divSanPhamLienQuan">
						
					</div>
				</div>
		</div>';
 		$i++;
    }
 ?>
<!-- <a id="btnMuaNgay" href="index.php?a=3&idsp='.$idSP.'">Mua ngay</a> -->



 <script type="text/javascript">
 	$(document).ready(function() {
 		$.ajax({
			url: 'GetData/GetSanPhamLienQuan.php',
			type: 'GET',
			data: { 'idgsplq': <?php echo $_GET['idsp']; ?>
			},
			success: function(data){
				$(".divSanPhamLienQuan").append(data);
			}
		});

		$('#btnMuaNgay').click(function(event) {
			<?php 
				if(isset($_SESSION['nguoiDung']) == false){
			?>
				$("#btnMuaNgay").attr('href', 
				'javascript:showLogin();');
			<?php
				}else{
			?>
				//animate add to cart
				$(this).closest(".chiTietSP")
		          .find("img")
		          .clone()
		          .addClass("zoom")
		          .appendTo("body");
		          setTimeout(function(){
		              $(".zoom").remove();
		          }, 1000);//
		         
				var id = <?php echo $_GET['idsp']; ?>;
				 $.get('Handling/XuLyAddToCart.php', {idsp:id}, function(data) {
				 	//tăng số lượng sản phẩm trong giỏ hàng
				 	setTimeout(function(){
		              	$('#SL_Cart').html(data);
		          	}, 1001);
				 });
			<?php
				}
			 ?>
		});

		// $('#btnMuaNgay').click(function(event) {
		// 	/* Act on the event */
		// });
 	});
 </script>

 <style type="text/css">

#wrapp_ChiTiet{
	width: 100%;
	height: 1000px;
}

.sanPhamLienQuan{
	width: 35%;
	/*height: 100%;*/
	min-height: 1000px;
	background-color: white;
	float: right;
	margin-bottom: 10px;
}

.divSanPhamLienQuan{
	width: 100%;
	height: 892px;
}

.divSanPhamLienQuan img{
	width: 150px;
	height: 160px;
	float: left;
}

#thongtinsplq{
	width: 270px;
	height: 183.5px;
	float: left;
}

/*.divSanPhamLienQuan div{
	width: 270px;
	height: 150px;
	float: left;
}*/

.divSanPhamLienQuan a{
	color: black;
}

#splienquan{
	height: 183.5px;
	margin-top: 20px;
	float: left;
	border-style: solid;
	border-color:  gray;
    border-width: 0px 0px 1px 0px;
}


.chiTietSP{
	width: 64%;
	height: 100%;
	background-color: white;
	float: left;
}

.chiTiet{
	float: left;
	width: 300px;
	min-height: 500px;"
}

.chiTietSP img{
	width: 400px;
	height: 400px;
	float: left;
}

.chiTietSP a{
	width: 300px;
	height: 30px;
	background-color: orange;
	color: white;
	text-decoration: none;
	display: table-cell;
	text-align: center;
}

.thongTinKyThuat{
	width: 100%;
	height: 522px;
	float: right;
}


/*animate add to cart*/
.zoom{
  position: absolute;
  z-index: 10;
  top: 50%;
  right: 80%;
  width: 60px;
  opacity: 0;
  animation: zoom 1s ease forwards;
}


@keyframes zoom{
    0%{opacity: 0}
    50%{opacity: 1}
    100%{opacity: 0; right: 5%; top: 1%;}
    /*100%{opacity: 0; right: 70px; top: 5px;}*/
}

 </style>

