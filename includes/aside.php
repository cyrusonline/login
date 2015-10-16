<aside>
	<?php 
	
	if (logged_in()===true){
		echo 'Logged in ';
	}else {
		include 'includes/widgets/login.php';
	}
	
?>


</aside>



