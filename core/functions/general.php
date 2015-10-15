<?php

function  sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
	
}

?>