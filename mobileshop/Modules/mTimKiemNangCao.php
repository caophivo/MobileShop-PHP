<div id="timkiemnangcao">
	<?php
		include_once('GetData/TimKiemNangCao_GetTenLoai.php');
		include_once('GetData/TimKiemNangCao_GetNhaSanXuat.php');
	 ?>
</div>

<script type="text/javascript">
	function showTimKiemNangCao(){
		var temp = document.getElementById("timkiemnangcao");
		if(temp.offsetHeight == 0){
			temp.style.height = 50 + 'px';
		}
	}

	function hideTimKiemNangCao(){
		var temp = document.getElementById("timkiemnangcao");
		if(temp.offsetHeight == 50){
			temp.style.height = 0 + 'px';
		}
	}

</script>

<style type="text/css">
#timkiemnangcao{
	width: 1200px;
	height: 40px;
	background-color: #EEEFC8;
	margin: auto;
	margin-bottom: 10px;
}

</style>