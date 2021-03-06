<?php
/**
* abstract for news class is a  class for various type of admin funtions.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package news
*/

/**
* Includes files for database connectivity.
*/

include_once 'function.php';

/**
* Content class. Defined as abstract and is a reference implementation for specific content classes.
* @package content
*/
abstract class content{

	protected $channelid,$uid,$newsid,$description,$timestamp,$status,$channelname,$channeldescription,$genre;
	
	public function getChannelId(){
		return $this->channelid;
	}
	
	public function getUserId(){
		return $this->uid;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function getTimestamp(){
		return $this->timestamp;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getNewsId(){
		return $this->newsid;
	}
	
	public function getChannelGenre(){
		return $this->genre;
	}
	
	public function getChannelDescription(){
		return $this->channeldescription;
	}
	
	public function getChannelName(){
		return $this->channelname;
	}
	/**
	* function for getting the distict news id which belong to a channeladmin
	* @param $channelid $offset $limit 
	* @return array array of newsid
	*/
	public static function newsidSearch($channelid,$offset,$limit){
		$sql="select newsid from nns_news where channelid = '$channelid' limit $limit offset $offset";
		return resource2array(dbquery($sql));
	}
	
	/**
	* function for getting the distinct channelid
	* @param $offset $limit
	* @return array array of channelid
	*/
	public static function channelidSearch($offset,$limit){
		$sql = "select channelid from nns_channel limit $limit offset $offset";
		return resource2array(dbquery($sql));
	}
	/**
	* function for getting the list of channelid for the different user 
	* param $uid $offset $limit
	* @return array array of channelid 
	*/
	public static function subscriptionChannelidSearch($uid,$offset,$limit){
		$sql = "select channelid from nns_subscribe where uid = $uid limit $limit offset $offset";
		return resource2array(dbquery($sql));
	}

}


?>
