<div id="frmNenInsert"  onclick="hideInset_Update();">
</div>
<div id="frmInsertProduct">
	<?php include_once('Modules/mAdmin_InsertSanPham.php'); ?>
</div>
<div id="frmUpdateProduct">
	<?php include_once('Modules/mAdmin_UpdateSanPham.php'); ?>
</div>


<script type="text/javascript">
		function showInsert(){
			var elem = document.getElementById("frmInsertProduct");
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
	  		document.getElementById("frmNenInsert").style.visibility = 'visible';
		}

		function hideInsert(){
			var elem = document.getElementById("frmInsertProduct");
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
	  		document.getElementById("frmNenInsert").style.visibility = 'hidden';
		}

		function hideInset_Update(){
			var elem = document.getElementById("frmInsertProduct");
			//var elem1 = document.getElementById("fromLogin");
		  	if(elem.style.top == 50 + '%'){
		  		hideInsert();
		  	}
		  	// if(elem1.style.top == 50 + '%'){
		  	// 	hideLogin();
		  	// }
	  		document.getElementById("frmNenInsert").style.visibility = 'hidden';
		}
</script>

<style type="text/css">
#frmNenInsert{
	width: 100%;
	height: 100%;
	position: fixed;
	z-index: 5;
	background: black;
	opacity: 0.7;
	left: 0%;
	top: 0%;
	visibility: hidden;
}

#frmInsertProduct{
	position: fixed;
	z-index: 5;
	background-color: red;
	left: 33%;
	top: -50%;
	margin-top: -200px;
}

</style>