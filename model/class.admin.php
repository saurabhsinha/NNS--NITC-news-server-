<?php
/**
* Admin class for handling user related functions.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package admin
*/

/**
* Includes Base class content
*/
include_once 'class.user.php';
/**
*
*/
class admin extends user
{

	/**
	* The constructor selects the appropriate function based on the number of
	* arguments and calls the appropriate protected function.
	*/
	public function __construct()
	{
		$a = func_get_args();
		$i = func_num_args(); 
		if($i==1)
			call_user_func_array(array($this,'view'),$a);
		if($i==6)
			call_user_func_array(array($this,'create'),$a);
	}

	public function __destruct() { }
	
	
}


?>
