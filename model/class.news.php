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
	* function written for view the news in respective channeladmin
	* @param $channelid 
	*/
	public function viewNews($newsid){
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
	
	public function viewChannel($channelid){
		$sql="select * from nns_channel where channelid=$channelid";
		$result = dbquery($sql);
		$user=pg_fetch_assoc($result);
		$this->channelid=$user['channelid'];
		$this->channelname=$user['channelname'];
		$this->channeldescription=$user['channeldescription'];
		$this->genre=$user['genre'];
	}

}


?>
