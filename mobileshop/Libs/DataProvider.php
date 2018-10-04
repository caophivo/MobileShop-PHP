<?php
class DataProvider 
{
	public static function ExecuteQuery($sql)
	{
		$connection = mysqli_connect('localhost','root','') or
			die ("couldn't connect to localhost");

		
		mysqli_select_db($connection, 'MobileShop02');
				
		mysqli_query($connection, "set names 'utf8'");
		
		$result = mysqli_query($connection, $sql);
		
		mysqli_close($connection);
		
		return $result;
	}
	
	public static function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}

	function Upload_Single_File($name, $folder, $max, $type){
	$target_file = $folder . basename($_FILES[$name]["name"]);
	$uploadOk = 0;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// check fake
	$check = getimagesize($_FILES[$name]["tmp_name"]);
	if($check != false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES[$name]["size"] > $max*1024*1024) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	} 
	
	// Allow certain file formats
	if( !in_array($imageFileType, $type) ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES[$name]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
}

	public static function TaoChuoiRandom($soKyTu){
		$mang = array("q","w","e","r","t","y","u","i","o","p","a","s","d",
			"f","g","h","j","k","l","z","x","c","v","b","n","m",
			"Q","W","E","R","T","Y","U","I","O","P","A","S","D",
			"F","G","H","J","K","L","Z","X","C","V","B","N","M",
			 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
		$kq = "";
		for($i=1; $i<=$soKyTu; $i++){
			$kq = $kq.$mang[rand(0, count($mang) - 1)];
		}
		return $kq;
	}
}
?>