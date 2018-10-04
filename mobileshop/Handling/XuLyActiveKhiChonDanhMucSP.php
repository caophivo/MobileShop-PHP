<?php 
	$idLoaiSP = $_GET['id'];
	$sql = "SELECT IDName FROM `loai` WHERE ID=$idLoaiSP";
	$result = DataProvider::ExecuteQuery($sql);
	$IDName = mysqli_fetch_array($result)['IDName'];
	if($IDName != null){
?>
	<script type="text/javascript">$('#<?php echo $IDName; ?>').css('background-color', '#EEEFC8');</script>
<?php		
	}
?>