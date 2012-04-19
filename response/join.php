<?php
	/**
	* Processes user login and returns status.
	*/

include_once '../model/class.user.php';
	$status=array();
	$u = new user($_POST['username'],$_POST['pass2'],$_POST['sex'],$_POST['roll'],$_POST['useremail']);
	if(!$u){
		$status['status']=0;
		echo json_encode($status);
		exit;
	}
	else{
		$status['status']=1;
		echo json_encode($status);
	}

?>
