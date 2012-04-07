<?php
/**
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package user
*/
/**
* Includes files for database connectivity.
*/

include_once 'function.php';

/**
* Class user for managing users.
* @package user
*/

class user
{
	protected $uid, $uname, $usex, $uroll, $uemail, $utype, $uregtime;
	
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
		//$this->utype=pg_escape_string($utype);
		$this->utype= 'n';
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
	
	public function getRoll(){
		Return $this->uroll;
	}
	
	public function getEmail()
	{
		return $this->uemail;
	}
	
	public function getSex()
	{
		return $this->usex;
	}
	
	public function getUsertype()
	{
		return $this->utype;
	}
	
	public function getRegistrationTime()
	{
		return $this->uregtime;
	}
	
	/**
	* Static function to return name of a user when User Id is passed.
	* @param integer $uid User ID whose full name is required.
	* @return string Full Name of the user with given User ID
	*/
	
	public static function getFullNameS($uid)
	{
		$sql="Select name from nns_user where uid = '$uid'";
		return pg_fetch_result(dbquery($sql),0,0);
	}
	
	
	public function getUserPicture()
	{
		global $global_user_folder;
		return $global_user_folder."/".sha1($this->uid).".png";
	}
	
	function updateUser($fname,$roll,$email,$sex){
		$sql="update nns_user set name = '$fname', registration = '$roll', email = '$email',sex='$sex' where uid = '$this->uid'";
		if(dbquery($sql)){
			return 1;
		}
		return 0;
		}
		
		static function updatePass($uid,$oldpass,$newpass){
		$uid=pg_escape_string($uid);
		$sql="Select uid from nns_user where password = '".sha1($oldpass)."' and uid = '".$uid."'";
		$row=resource2array(dbquery($sql));
		if($row[0]){
			$newpass=pg_escape_string($newpass);
			$sql="update users set psssword = '".sha1($newpass)."' where uid = '$this->uid' returning uid";
			$row=resource2array(dbquery($sql));
			if($row[0]){
				return 1;
			}
		}
		return 0;
		}
		
		static function updateInfo($uid, $fname, $roll, $email,$sex){
		$uid=pg_escape_string($uid);
		$fname=pg_escape_string($fname);
		$roll=strtolower(pg_escape_string($roll));
		$email=pg_escape_string($email);
		$sql="update nns_user set name='$fname', registration='$roll', email='$email',sex='$sex' where uid='$uid' returning uid";
		$row=resource2array(dbquery($sql));
		return $row[0];
		}
		/**
	* Static function to return the PATH of the user pic URL when user id is known.
	* @param integer $uid User ID
	* @return string relative PATH of the user DP.
	*/
	public static function getUserPictureS($uid)
	{
		global $global_user_folder;
		return $global_user_folder."/".sha1($uid).".png";
	}
	
	/**
	* Static function to check if a username already exists.
	* @param string $uname Given Username
	* @return integer returns (exists:1 | does not exist:0)
	*/
	public static function checkUsernameExists($uname)
	{
		$sql="Select uid from nns_user where name='$uname'";
		$row=pg_fetch_row(dbquery($sql));
		if($row)
			return 1;
		else
			return 0;
	}
	
	/**
	* Static function check if an email already exists. 
	* @param string $email Given Email ID
	* @return integer (1: exists | 0: does not exists)
	*/
	public static function checkEmailExists($email)
	{
		$sql="Select uid from nns_user where email='$email'";
		$row=pg_fetch_row(dbquery($sql));
		if($row)
			return 1;
		else
			return 0;
	}
	
	/**
	* Checks if a roll no already exists in the database.
	* @param string $roll Register number of the user.
	* @return integer (1:exists | 0:does not exist)
	*/
	public static function checkRollExists($roll)
	{
		$roll=strtolower($roll);
		$sql="Select uid from user where registration='$roll'";
		$row=pg_fetch_row(dbquery($sql));
		if($row)
			return 1;
		else
			return 0;
	}
	
	public static function isAdmin($uid){
		$sql="select type from nns_user where uid = '$uid'";
		$user=pg_fetch_assoc(dbquery($sql));
		$utype=preg_replace('/\s+/', '', $user['type']);
		if($utype=="n"){
			return 1;
		}
		return 0;  
	}
	
	public static function isChannelAdmin($uid){
		$sql="select type from nns_user where uid = '$uid'";
		$user=pg_fetch_assoc(dbquery($sql));
		$utype=preg_replace('/\s+/', '', $user['type']);
		if($utype=="c"){
			return 1;
		}
		return 0;  
	}
}
#$temp = new user('saurabh1','indian','m','a','m100','test@gmail.com');
#$temp->isAdmin(4);
?>
