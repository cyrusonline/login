<?php


// function change_password($user_id, $password) {
// 	$user_id = (int)$user_id;
// 	$password = md5($password);

// 	mysql_query("UPDATE `users` SET `password` = '$password', `password_recover` = 0 WHERE `user_id` = $user_id");
// }
function change_password($user_id, $password){
	$user_id=(int)$user_id;
	$password = md5($password);
//	echo "UPADATE `users` SET `password` = '$password' WHERE `user_id`=$user_id";
//UPDATE `lr`.`users` SET `password` = 'abc' WHERE `users`.`user_id` = 3;
	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id`= $user_id;");
//	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id;");

	
	//echo "UPADATE `users` SET `password` = '$password' WHERE `user_id`=$user_id";
	
}

function register_user($register_data){
	$register_data['password'] = md5($register_data['password']);
	
// 	print_r($register_data);
	$fields = '`'.implode('`,`',array_keys($register_data)).'`';
	//echo $data/'<br>';
	$data ='\''. implode('\',\'',$register_data).'\'';
// 	echo $fields."<br>";
// 	echo $data;
// 	echo "INSERT INTO `users` ($fields) VALUES ($data)";
// 	die();
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");

}

function user_count(){
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0)) ;
	
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	//echo $func_num_args;
	
// 	print_r($func_get_args);
// 	print_r($func_num_args);

		if($func_num_args>1){
			unset($func_get_args[0]);
			$fields = '`'.implode('`,`',$func_get_args).'`';
			//echo "SELECT $fields FROM `users` WHERE `user_id`=$user_id";
			
			//echo $fields;
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id`=$user_id"));
// 			print_r($data);
// 			die();
			
// 			echo $data;
			return $data;
			
			
		}
		//print_r($func_num_args);
// 		print_r($func_get_args);
	
}

function logged_in(){
	return (isset($_SESSION['user_id'])) ? true:false;
	
	
}

function user_exists($username){
	
	
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
	
	
	
}

function email_exists($email){


	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'"), 0) == 1) ? true : false;



}

// function user_exists($username){
// 	$username = sanitize($username);
// 	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
// 	return (mysql_result($query, 0) == 1) ? true : false;
// }


function user_active($username){


	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) ? true : false;



}

function user_id_from_username($username){
	$username = sanitize($username);
	
	
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0,"user_id");
	
	
	
}

function login($username, $password){
	$user_id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password`='$password'"), 0)==1)?$user_id:false;
	
	
	
	
}







?>