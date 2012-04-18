<?php
/**
* news class is a  class for various type of news class funtions.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package news
*/

/**
* Includes files for abstract class.
*/
include_once 'class.content.php';

class news extends content{

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
		
	}

	public function __destruct() { }

	/**
	* function written for view the news in respective channeladmin
	* @param $channelid 
	*/
	public function view($newsid){
		$sql = "select * from nns_news where newsid = '$newsid'";
		$result = dbquery($sql);
		$user=pg_fetch_assoc($result);
		$this->channelid=$user['channelid'];
		$this->uid=$user['uid'];
		$this->description=$user['description'];
		$this->timestamp=$user['timestamp'];
		$this->status=$user['status'];
		$this->newsid=$newsid;
	}

}


?>
