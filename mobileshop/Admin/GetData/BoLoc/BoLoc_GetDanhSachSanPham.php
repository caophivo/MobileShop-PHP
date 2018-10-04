<?php
require_once '../../../Libs/DataProvider.php';
	if (isset($_GET['b-nsx']) && isset($_GET['b-loaisp'])){
		$p = $_GET['p'];
		$nsx = $_GET['b-nsx'];
		$loaisp = $_GET['b-loaisp'];
		$sql = "SELECT sp.ID, sp.TenSanPham, sp.SoLuong, sp.Gia, sp.ChiTiet, sp.Img, sp.DaXoa, nsx.NhaSanXuat, l.TenLoai FROM `sanpham` sp, `nhasanxuat` nsx, `loai` l WHERE sp.MaNhaSanXuat=nsx.ID AND sp.MaLoai=l.ID AND nsx.NhaSanXuat='$nsx' AND l.TenLoai='$loaisp'";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		echo '
		<table cellpadding="2" cellspacing="2" border="1">
			<tr>
				<th>Id</th>
				<th>Tên</th>
				<th>Loại</th>
				<th>Hãng sản xuất</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Chi tiết</th>
				<th>Hình ảnh</th>
				<th>Opption</th>
			</tr>';
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$ten = $row['TenSanPham'];
    		$loai = $row['TenLoai'];
    		$nhasanxuat = $row['NhaSanXuat'];
    		$soluong = $row['SoLuong'];
	        $gia = number_format($row['Gia'], 0, '.', '.');
	        $chitiet = $row['ChiTiet'];
	        $img = $row['Img'];
	        $daxoa = $row['DaXoa'];
		
			$delete_restore = 'Delete';
	        if($daxoa == 1){
	        	$delete_restore = 'Restore';
	        }

	        $temp = '<td><a href="#" class="abtnDeleteProduct" name="'.$id.'">'.$delete_restore.'</a></td>';

			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$ten.'</td>
				<td>'.$loai.'</td>
				<td>'.$nhasanxuat.'</td>
				<td>'.$soluong.'</td>
				<td>'.$gia.'</td>
				<td>'.$chitiet.'</td>
				<td>'.$img.'</td>
				<td><a href="#">Insert</a></td>
				<td><a href="Modules/mAdmin_UpdateSanPham.php?update-sp='.$id.'" onclick="return confirm("Are you sure?")">Edit</a></td>
				'.$temp.'
			</tr>';
			
 			$i++;
    	}
    	echo '</table>';
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.abtnDeleteProduct').click(function(event) {
			var id = $(this).attr('name');
			var ht = $(this).html();
			if(ht == 'Delete'){
				$.get('Handling/Admin_XuLyXoaSanPham.php', {'idDelete':id}, function(data) {
					alert(data);
				});
				$(this).html('Restore');
			}else{
				$.get('Handling/Admin_XuLyXoaSanPham.php', {'idRestore':id}, function(data) {
					alert(data);
				});
				$(this).html('Delete');
			}
		});
	});
</script>