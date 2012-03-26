<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Bootstrap, from Twitter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Saurabh kumar">
	<!-- Le styles -->
	<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
	</style>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Play" rel="stylesheet" type="text/css">
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">Nitc News Server</a>
					<ul class="nav pull-right">
						<li class="dropdown" id="login">
							<a class="dropdown-toggle" id="" href="#">Login
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu" style="width: 200px;padding-left: 10px;padding-top: 20px;">
								<form action="" method="post" id="topbar-form">
									<li><input type="text" style="width: 180px;" name="uname" placeholder="Username"></li>
									<li><input type="password" style="width: 180px;" name="password" placeholder="Password"></li>
									<li class="divider"></li>
									<li>
										<button class="btn">Login »</button>
									</li>
								</form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="row">
				<div class="span8" id="span6">
					<p>Get the instant news in the campus.</p>
				</div>
				
				<div class="span4">
					<form class="well">
					<fieldset>
						<legend>New to NNS? Register</legend>
						<div class="control-group">
							<div class="controls" id="controls">
								<input type="text" class="input-xlarge custom-input" id="input01" placeholder="Name">
								<input type="text" class="input-xlarge custom-input" id="input02" placeholder="Email">
								<input type="password" class="input-xlarge custom-input" id="input03" placeholder="Password">
								<input type="text" class="input-xlarge custom-input" id="input04" placeholder="Registration no.">
								<div class="controls">
									<select id="select01" class="span1">
										<option selected="selected">Sex</option>
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
								
								<p class="help-block"></p>
								<button type="submit" class="btn btn-primary">Register</button>
							</div>
						</div>
					</fieldset>
				</form>
				</div>
			</div>
		<!-- Example row of columns -->
			<div class="row">
			</div>
			<hr>
			<footer>
				<p>&copy; National Institute of Technology, Calicut 2012</p>
			</footer>

		</div> <!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
		$(window).load(function(){
			$('a.dropdown-toggle').click(function(){
				$('li.dropdown').toggleClass('open')
			});
		});
	</script>
	</body>
</html>
