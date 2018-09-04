<?php
	$error="";
	if(isset($_POST['button'])){
		if(empty(trim($_POST['user-name']))|| empty(trim($_POST['user-pass']))){
			$error = "User or Password is invalid!";
		}
		else{
			$user = validate($_POST['user-name']);
			$pass = validate($_POST['user-pass']);
            $pass = sha1($pass); //to match with the encrypted password from database;			
			include_once 'master_db.php';
			$db = new DB();
			$res = $db->loginManager($user,$pass);
			if($res === true){ //login successful
				date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka
				session_start();
                $_SESSION['user'] = $user;
				header("location: home.php");
				//$error = "username and password is correct!"; 
			}
			else{
				$error = "username or password is incorrect!"; 
			}
		}
	}

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
?>