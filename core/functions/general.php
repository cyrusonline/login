<?php

function logged_in_redirect(){
	if (logged_in()===true){
		header('Location: index.php');
		exit();
	}
	
}

function protect_page(){
	if (logged_in()===false){
		header('Location: protected.php');
		exit();
	}
}
function array_sanitize(&$item) {
  $item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function  sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
	
}


// function output_errorss($errors){
// 	$output = array();
// 	foreach ($errors as $error){

// 		$output[]='<li>'.$error.'</li>';
		
// 	}

	
// 	return '<ul>'.implode('',$output).'</ul>';

// }


function output_errors($errors){

	return '<ul><li>'.implode('</li><li>',$errors).'</li></ul>';
	
	
}

// function xxx($errors){
// 	return '<ul><li>'.implode('</li><li>',$errors).'</li><ul>';
	
// }


// function output_errors($errors) {
//   $output = array();
//   foreach($errors as $error) {
//     $output[] = '<li>' . $error . '</li>';
//   }
//   return '<ul>' . implode('', $output) . '<ul>';
// }
?>