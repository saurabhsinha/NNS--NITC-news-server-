<?php
	/**
	* Processes user login and redirects back to page.
	*/

	include_once '../model/class.activity.php';
	activity::login($_POST['uemail'],$_POST['password']);
#	$home_url = 'http://localhost/news_server/index.php';
#	header('Location: '.$home_url);
	header("Location: ".$_POST['page']);

?>
