<?php
	require_once './dbconfig.php';
	session_start();
	if (isset($_POST['inputevent'])){
		$inputevent = $_POST['inputevent'];
		$inputqty = $_POST['qty'];

		
		
		$user_id=$_SESSION['user'];

		$sql = "INSERT INTO cart (id_event,username,amount ) VALUES ('$inputevent' ,'$user_id','$inputqty')";
		echo $sql;
		if($conn->query($sql)){
			echo "สมัครสมาชิกสำเร็จ";
		}else{
			echo "สมัครสมาชิกผิดพลาด";
		}
		
	}

?>