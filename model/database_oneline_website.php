<?php
    $dbhost = 'RyanLiu.db.9275051.hostedresource.com';
    $dbname = 'RyanLiu';
	$dbuser = 'RyanLiu';
	$dbpass = 'Jigangren2016@';

	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if($connection->connect_error) die($connection->connect_error);

	function queryMysql($query){
		global $connection;
		$result = $connection->query($query);
		if(!$result) die($connection->error);
		return $result;
	}
	function sanitizeString($var)
	{
		$var = stripslashes($var);
		$var = htmlentities($var);
		$var = trim($var);
		$var = strip_tags($var);
		return $var;
	}
?>