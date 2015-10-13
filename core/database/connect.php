<?php

$connect_error = '<h3>Sorry, we \'re experiencing connection problems.</h3>';
mysql_connect('localhost','root','') or die($connect_error) ;
mysql_select_db('lr') or die($connect_error);
?>