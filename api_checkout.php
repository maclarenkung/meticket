<?php
	// require_once '/connectDB.php';

if (file_exists('dbconfig.php')) {
    require('dbconfig.php'); // This is line 38
}
	if (isset($_POST['total'])){
		$total = $_POST['total'];
		$user_id = $_POST['inputid'];

		$dates = DATE('Y-m-d // H:i:s');

		
		$sql = "INSERT INTO orders ( user_id, totalprice, dates) VALUES ( '$user_id', '$total','$dates')";
		echo $sql;
		if($conn->query($sql)){
			echo "สำเร็จ";
		}else{
			echo "ผิดพลาด";
		}
		
	}

?>