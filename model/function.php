<?php
/**
* User class for handling user related functions.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package content
*/

/**

/**
* Settings.php file contains default application settings.(Database settings for eg.)
*/
include_once 'settings.php';

/**
* Function to connect to the database. Creates a persistent connection.
* @return resource Database connection resource.
*/
function dbconnect()
{
	global $global_db_host,$global_db_name,$global_db_username,$global_db_password,$global_db_port;
	$dbconn = pg_pconnect("host=$global_db_host port=$global_db_port dbname=$global_db_name user=$global_db_username password=$global_db_password")  or die("Connection error!!");
	return $dbconn;
}
/**
* Function to query database.
* @param string $sql A sql query. Any variable in sql statement MUST be escaped.
* @return result_resource Result resource.
*/
function dbquery($sql)
{
	dbconnect();
	return pg_query($sql);
}

/**
* This function take a postgres result resource as an input and converts it to 
* an array.
* @param resource $res Result resource from a PSQL database
* @return array resource is converted into array and returned.
*/
function resource2array($res)
{
	$arr=array();
	while($row=pg_fetch_row($res))
		$arr=array_merge($arr,$row);
	return $arr;
}

/**
* Redirects the user to home page. 
*/
function redirect()
{
	header("location: /");	
}

/**
* Checks if the session exists.
*/
function checkSession()
{
	session_start();
	if(isset($_SESSION['uid']))
		return true;
	else
		return false;
}
?>


