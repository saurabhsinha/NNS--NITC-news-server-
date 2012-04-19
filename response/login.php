<?php
	/**
	* Processes user login and redirects back to page.
	*/

	include_once '../function/class.activity.php';
	activity::login($_POST['email'],$_POST['pass']);
	header("Location: ".$_POST['page']."?".$_POST['parameter']);

?>
