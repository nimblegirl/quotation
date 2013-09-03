<?
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'simple';

	mysql_connect($hostname, $username, $password) OR die ('Cannot connect t0 DataBase!');
	mysql_select_db($database) or die (mysql_error());
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("set character_set_client='utf8'");
	mysql_query("set character_set_results='utf8'");
	mysql_query("set collation_connection='utf8_general_ci'");
 ?>