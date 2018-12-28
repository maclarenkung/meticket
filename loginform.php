<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ob_start();
require_once './dbconfig.php';
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title></title>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                            <form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<div align="center"><img src="img/core-img/logo.png" alt=""></a><div><br><br>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username is: a@b.c">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submitlogin">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don't have an account?
						</span>

                                            <a class="txt2" href="register.php">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

         <?php
        if(isset($_POST['submitlogin'])){
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            $password=$_POST['password'];
            $md5pass= md5($password);

            $sql="SELECT * FROM userdata WHERE username ='$username' and password='$md5pass'";
            echo $sql;

		            if($result=$conn->query($sql)){
		        if($result->num_rows>0){
		          while($row = $result->fetch_assoc()){
		            $_SESSION['user'] = $row['username'];
		            $_SESSION['type'] = $row['type'];

				date_default_timezone_set("Asia/Bangkok");
				                echo "<br> NOW : ".DATE('Y-m-d H:i:s');
				                
				$sql_log="INSERT INTO `user_log`(user_id,timeLogin) VALUES ('$user_id','".DATE('Y-m-d H:i:s')."')"; 
                
//            $sql_time="UPDATE `user_log` SET `timelogin`='".DATE('Y-m-d H:i:s')."' ";  
//            $sql_time.="WHERE username ='$username' and password='$password'";
            echo $sql_log;            
            $result2=mysqli_query($conn,$sql_log);
            if($result2==1)header("location:index.php");



		          }
		        } else {
		          echo "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
		        }
		      }
            
//             $query= mysqli_query($conn, $sql);
//             if (mysqli_num_rows($query)>0){
//                 echo " <br> พบ User : $username <br>";     
//             session_start();
//             $_SESSION['user']=$username;
//             $_SESSION['user_id']=$user_id;
            



//             $row=mysqli_fetch_row($query);
//             $user_id=$row[0];
            
//             date_default_timezone_set("Asia/Bangkok");
//                 echo "<br> NOW : ".DATE('Y-m-d H:i:s');
                
//             $sql_log="INSERT INTO `user_log`(user_id,timeLogin) VALUES ('$user_id','".DATE('Y-m-d H:i:s')."')"; 
                
// //            $sql_time="UPDATE `user_log` SET `timelogin`='".DATE('Y-m-d H:i:s')."' ";  
// //            $sql_time.="WHERE username ='$username' and password='$password'";
//             echo $sql_log;            
//             $result2=mysqli_query($conn,$sql_log);
//             if($result2==1)header("location:index.php");    
// //             }


//              else echo " <br> ไม่พบ User : $username หรือ Password ผิด <br>";
        }
        ?>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>