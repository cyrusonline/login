<?php
session_start();
error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
if(logged_in()===true){
	
	
	$user_data = user_data($_SESSION['user_id'],'first_name','last_name','email');
	
}
$errors= array();

?>



