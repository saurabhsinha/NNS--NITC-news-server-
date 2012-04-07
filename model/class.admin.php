<?php
/**
* User class is a base class for various type of users.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package user
*/
/**
* Includes files for database connectivity.
*/

include_once 'function.php';

class admin{

	private $channelid;
	public function delete($uid){
		$sql="delete from nns_user where uid = '$uid'";
		if(dbquery($sql)){
			return 1;
		}
		return 0;
	}
	
	public function createChannel($uid,$channelname,$channeldescription,$genre){
		$this->uid=$uid;
		$this->channelname=pg_escape_string($channelname);
		$this->channeldescription=pg_escape_string($channeldescription);
		$this->genre=pg_escape_string($genre);
		$sql = "insert into nns_channel (uid,channelname,channeldescription,genre) values ('".$this->uid."','".$this->channelname."','".$this->channeldescription."','".$this->genre."') returning channelid";
		$user=pg_fetch_assoc(dbquery($sql));
		$this->channelid = $user['channelid'];
	}
	
	public function getChannelId(){
		echo $this->channelid;
	}
	public function getChannelName(){
		Return $this->channelname;
	}
	public function getChanneDescription(){
		Return $this->channeldescription;
	}
	public function getChannelGenre(){
		Return $this->genre;
	}
	public function deleteChannel($channelid){
		$sql="delete from nns_channel where channelid = '$channelid'";
		if(dbquery($sql)){
			echo "done";
		}
		return 0;
	}
}
#$test=new admin();
#$test->createChannel(4,'test','wtf','test');
#$test->deleteChannel(5);
?>
