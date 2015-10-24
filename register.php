<?php include 'core/init.php';
include 'includes/overall/header.php'; 
if (empty($_POST)===false){
	$required_fields = array('username','password','password_again','first_name','email');
	//echo '<pre>',print_r($_POST,true),'</pre>';
	//Check whether the fields are empty
	
	foreach ($_POST as $key=>$value){
		if(empty($value) && in_array($key,$required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
break 1;
			
		}
		
	}
	
	//Start validate
	if (empty($errors)===true){
		if (user_exists($_POST['username'])===true){
			$errors[]='Sorry, the username \''.$_POST['username'].'\' is already exists';
		}
		
// 		if(preg_match("/\\s/", $_POST["username"]) == true){
// 			$errors[] = "Your username must not contain any spaces.";
// 		}
		
		if (preg_match("/\\s/",$_POST['username']) == true){
			$errors[] = 'Your username must not contain any spacessss';
			
		}
		
		if (strlen($_POST['password'])<6){
			$errors[]= 'Your password must be at least 6 characters';
			
		}
		
		if ($_POST['password']!==$_POST['password_again']){
			$errors[] = 'Your password do not match';
			
		}
		
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Invalid email format";
		}
		
		if (email_exists($_POST['email'])===true){
			$errors[]='Sorry, the email \''.$_POST['email'].'\' is already in use';
		}
	}
	
}

// print_r($errors);

?>
  <h1>Register</h1>
<?php 
if (empty($_POST) === true && empty($errors)===true){
	//register user
}else {
	//output error
	//the function below is inside the general.php
	echo output_errors($errors);
	
}

?>

<form action = "" method="post">
<ul>
<li>
	Username*:<br>
	<input type="text" name="username">

</li>
<li>
	Password*:<br>
	<input type="password" name="password">

</li>

<li>
	Password again*:<br>
	<input type="password" name="password_again">

</li>

<li>
	First name*:<br>
	<input type="text" name="first_name">

</li>
<li>
	Last name:<br>
	<input type="text" name="last_name">

</li>
<li>
	Email*:<br>
	<input type="text" name="email">

</li>
<li>
<input type = "submit" value = "Register">
</li>
</ul>

</form>
  
<?php
include 'includes/overall/footer.php';
?>
