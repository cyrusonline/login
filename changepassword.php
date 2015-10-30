<?php 
include 'core/init.php'; 
protect_page();


if (empty($_POST)==false){
// 	echo 'a';

	$required_fields = array('current_password','password','password_again');
	foreach ($_POST as $key=>$value){
		if(empty($value) && in_array($key,$required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
				
		}
	
	}
	//the $user_data variable is setted in init.php
// 	echo "user";
	
// 	echo $user_data['password'];
	if (md5($_POST['current_password']) === $user_data['password']){
// 		echo 'fine';
	if (trim($_POST['password'])!==$_POST['password_again']){
		$errors[]='Your new password do not match';
	}else if (strlen($_POST['password'])<6){
		$errors[]='Your password must be at least character';
	}
		
	} else {
		$errors[]='Your current password is incorrect';
	}
	echo strlen($_POST['password']);
// 	print_r($errors);
	


}


include 'includes/overall/header.php'; ?>
  <h1>Change Password</h1>
<?php 

if (empty($_POST) === false && empty($errors)===true){
	//posted the form with no error
// 	echo "ok";
change_password($user_session_id, $_POST['password']);
header('Location: changepassword.php?success');
}else if (empty($errors)==-false){
	//output errors
	echo output_errors($errors);
	
// 	print_r($errors);
}
?>
<form action = "" method="post">
<ul>
<li>
Current password*:<br>
<input type = "text" name="current_password">
</li>
<li>
New password*:<br>
<input type = "text" name="password">
</li>

<li>
New password again*:<br>
<input type = "text" name="password_again">
</li>
<li>
<input type = "submit" value = "Change">

</ul>


</form>
<?php  include 'includes/overall/footer.php';
?>