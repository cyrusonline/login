<?php include 'core/init.php';
include 'includes/overall/header.php'; 
if (empty($_POST)===false){
	$required_fields = array('username','password','password_again','first_name','email');
	echo '<pre>',print_r($_POST,true),'</pre>';
	
	
}
?>
  <h1>Register</h1>


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
