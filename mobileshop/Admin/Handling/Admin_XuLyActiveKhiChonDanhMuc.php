<script type="text/javascript">
	$('#<?php
		if(isset($_GET['p'])){
			echo $_GET['p'];
		}else{
			echo "loai-san-pham";
		}
		
	?>').css('background-color', '#3B8AE3');
</script>
