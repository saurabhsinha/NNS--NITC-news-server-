<?php

	session_start();

	$header="<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='description' content=''>
	<meta name='author' content='Saurabh kumar'>
	<!-- Le styles -->
	<link href='css/bootstrap.css' rel='stylesheet'>
	<link href='css/style.css' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
	<script src='js/jquery.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
		$(window).load(function(){
			$('a.dropdown-toggle').click(function(){
				$('li.dropdown').toggleClass('open')
			});
		});
	</script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->

	<!-- Le fav and touch icons -->";
	if(!isset($_SESSION['uid'])){
		$topNotLoggedIn="<li class='dropdown' id='login'>
								<a class='dropdown-toggle' id='' href='#'>Login
								<b class='caret'></b>
								</a>
								<ul class='dropdown-menu' style='width: 200px;padding-left: 10px;padding-top: 20px;'>
									<form id='topbar-form' action='response/login.php'  method='post'>
									<li><input type='text' style='width: 180px;' name='uemail' placeholder='email'></li>
									<li><input type='password' style='width: 180px;' name='password' placeholder='Password'></li>
									<input type='hidden' name='page' value='".$_SERVER['PHP_SELF']."'>
									<li class='divider'></li>
									<li>
										<button type='submit' class='btn'>Login »</button>
									</li>
								</form>
							</ul>
						</li>";
		$register="<form class='well' action='response/join.php' method='post'>
					<fieldset>
						<legend>New to NNS? Register</legend>
						<div class='control-group'>
							<div class='controls' id='controls'>
								<input type='text' class='input-xlarge custom-input' id='input01' placeholder='Name' name='username'>
								<input type='text' class='input-xlarge custom-input' id='input02' placeholder='Email' name='useremail'>
								<input type='password' class='input-xlarge custom-input' id='input03' placeholder='Password' name='pass1'>
								<input type='password' class='input-xlarge custom-input' id='input04' placeholder='Password again' name='pass2'>
								<input type='text' class='input-xlarge custom-input' id='input05' placeholder='Registration no.' name='roll'>
								<div class='controls'>
									<select id='select01' class='span1' name='sex'>
										<option selected='selected'>Sex</option>
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
								
								<p class='help-block'></p>
								<button type='submit' class='btn btn-primary'>Register</button>
							</div>
						</div>
					</fieldset>
				</form>";
	}
	else {
		$topNotLoggedIn="<p>hello</p>";
		//$register="'".$_SESSION['uid']."'";
	}
?>
