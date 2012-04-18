<?php
/**
* Interface functions are the functions that send/recieve data from the user interface.
* All interface functions MUST be defined here.
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package general

/**
* Includes files to access content and users.
*/

include_once 'class.news.php';
/**
* function to generate all the news in json format
*/
function getAllNews($channelid,$page){
	$newsid = content::newsidSearch($channelid,($page*10)-10,10);
	$json = array();
	for($i=0;$i<count($newsid);$i++){
		$obj = new news($newsid[$i]);
		array_push($json,array('newsid'=>$obj->getNewsId(),
										'channelid'=>$obj->getChannelId(),
										'uid'=>$obj->getUserId(),
										'description'=>$obj->getDescription(),
										'status'=>$obj->getStatus(),
										'timestamp'=>$obj->getTimestamp()));
	}
	echo json_encode($json);
}


?>
