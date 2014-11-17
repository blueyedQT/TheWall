<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'wall');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

if ($connection->connect_errno) 
{
    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}

function fetch_all($query)
{
	$data = array();
	global $connection;
	$result = $connection->query($query);
	 
	//while($row = $result->fetch_assoc())
	while($row = mysqli_fetch_assoc($result)) 
	{
		$data[] = $row;
	}
	return $data;
}

function fetch_record($query)
{
	global $connection;
	$result = $connection->query($query);
	return mysqli_fetch_assoc($result);
	//return $result->fetch_assoc();
}

//use to run INSERT/DELETE/UPDATE, queries that don't return a value
//notice this function returns a value.  This value will be equal to the ID of the most recent query item 
//ran by your PHP code.
function run_mysql_query($query)
{
	global $connection;
 	$result = $connection->query($query);
 	return $connection->insert_id;
}

//This function will return an escaped string.  IE the string "That's crazy!" Will be returned as:
// "That\'s crazy!...This helps secure your database!
function escape_this_string($string)
{
	global $connection;
	return $connection->real_escape_string($string);
}
?>