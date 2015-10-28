<?php

include 'core/init.php';

logged_in_redirect();


if (empty($_POST)===false){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username)===true||empty($password)===true){
		$errors[]='You need to enter a username and password';
		
	}else if(user_exists($username)===false){
		$errors[]='We can\'t find that username. Have you registered?';
	} else if (user_active($username)===false){
		$errors[]='You haven\'t activated your account!';
	} else {
		
		if (strlen($password) > 32){
			$errors[] = 'Username too long';
		}
		
		$login = login($username, $password);
		if ($login === false){
			$errors[] = 'That username/password is incorrect';
			
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
	
	//print_r($error);
	
	
}else {
	$errors[]='No data received';
	
}

include 'includes/overall/header.php';
if (empty($errors)===false){
	
	
}
?>
<h2>Sorry, but...</h2>
<?php 
echo output_errors($errors);

$err = array('1stError','2ndError','3rdError','4thError');
echo xxx($err);
 include 'includes/overall/footer.php';

?>
