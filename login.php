<?php

include 'core/init.php';
include 'includes/overall/header.php'; 






if (empty($_POST)===false){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username)===true||empty($password)===true){
		$error[]='You need to enter a username and password';
		
	}else if(user_exists($username)===false){
		$error[]='We can\'t find that username. Have you registered?';
	} else if (user_active($username)===false){
		$error[]='You haven\'t activated your account!';
	} else {
		$login = login($username, $password);
		if ($login === false){
			$error[] = 'That username/password is incorrect';
			
		}else {
// 			die($login);
// 			echo "ok";
			$_SESSION['user_id']=$login;
			header('Location:index.php');
			exit();
			
			//Set the user seession
			//redirect user to home
			
		}
	}
	
	print_r($error);
	
	
}
 include 'includes/overall/footer.php';

?>
