<?php
/**
* User class for handling user related functions.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package content
*/

/**
* Class user for managing users.
* @package user
*/

class user
{
	private $uid, $uname, $usex, $uroll, $uemail, $utype, $uregtime;
	
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
	
	/**
	* Initializes the class properties for a given user id.
	* @param integer $uid User ID of a user
	*/
	protected function view($uid)
	{
		$sql="Select name, email, sex, registration, type from nns_user where uid = '$uid'";
		$user=pg_fetch_assoc(dbquery($sql));
		$this->uid=$uid;
		$this->uname=$user['name'];
		$this->email=$user['email'];
		$this->uroll=$user['registration'];
		$this->usex=$user['sex'];
		$this->utype=$user['type'];
	}
	
	/**
	* Function to create a new user. The generated User ID is stored in the property uid.
	* @param string $uname Username of the username
	* @param string $upass Password of the user which is encrypted using sha1()
	* @param string $uroll Register number of the user.
	* @param string $uemail Email ID of the user
	* @param string $usex Sex of the username
	& @param string $type is for the user type
	*/
	
	protected function create($uname, $upass, $usex, $utype, $uroll, $uemail)
	{
		$this->uname=pg_escape_string($uname);
		$this->upass=sha1(pg_escape_string($upass));
		$this->usex=pg_escape_string($usex);
		$this->uroll=pg_escape_string($uroll);
		$this->uemail=pg_escape_string($uemail);
		$this->utype=pg_escape_string($utype);
		$sql="Insert into nns_user (name, email, password, sex, registration, type) values ('".$this->uname."','".$this->uemail."','".$this->upass."','".$this->usex."','".$this->uroll."','".$this->utype."') returning uid";
		$user=pg_fetch_assoc(dbquery($sql));
		$this->uid=$user['uid'];
	}
	
	public function getUserId(){
		Return $this->uid;
	}
	public function getUserName(){
		Return $this->uname;
	}
}
?>
