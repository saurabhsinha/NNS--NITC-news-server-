<!DOCTYPE html>
<html lang="en">
	<head>
	<title>NNS</title>
	<?php

	include 'source.php';
		echo $header;
	?>
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">Nitc News Server</a>
					<ul class="nav pull-right">
						
								<?php echo $topNotLoggedIn; ?>
							
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
					<?php echo $register; ?>
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

		<!================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
	</body>
</html>
