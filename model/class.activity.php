<?php
/**
* class for handling user activity in news server :)
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package activity
*/

/**
* Includes files for database connectivity.
*/

include_once 'function.php';
include_once 'class.user.php';

/**
* Class for handling user activities.
* @package activity
*/
class activity
{
	/**
	* Stores user comments. 
	* @param integer $newsid news ID
	* @param integer $uid User ID of the commentor
	* @param string $comment The comment string.
	* @return integer CommentID of the comment.
	*/
	public static function comment($newsid,$uid,$comment)
	{
		$uid=pg_escape_string($uid);
		$cid=pg_escape_string($newsid);
		$comment=pg_escape_string($comment);
		$sql="Insert into nns_comment (newsid,uid,description) values ($newsid,$uid,'$comment') returning commentid";
		echo pg_fetch_result(dbquery($sql),0,0);
	}
	
	/**
	* Login function
	* @param string $email user email
	* @param string $upass User Password
	* @return 
	*/
	public static function login($email,$upass)
	{
		$uname=pg_escape_string($email);
		$upass=sha1($upass);
		$sql="Select uid, name, type from nns_user where email='$email' and password='$upass'";
		$res=dbquery($sql);
		if($res)
		{
			$user=resource2array($res);
			session_start();
			$_SESSION['uid']=$user[0];
			$_SESSION['type']=$user[1];
			$_SESSION['name']=$user[2];
			$_SESSION['userpic']=user::getUserPicture($user[0]);
			return 1;
		}
		return 0;
	}

	/**
	* Destroys the session of a user and logs the user out.
	*/
	public static function logout()
	{
		session_start();
		session_destroy();
		$_SESSION=array();
	}
}
#$obj=new activity();
#$obj->comment(2,4,'test comment');

?>
