<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/master.css" />
	</head>
	<body>
		<div class="container">
			<?php
				include "header.php";
			?>
			<div class="container">
				<div class="card">
					<div class="card-content">
						<div class="card-title center">Recipe Saved</div>
						<div class="card-content center"><p>Your Recipe has been saved successfully!</p><br />
							<a href='index.php'>Click Here to back to home page</a></div>
					</div>
				</div>
			</div>
			<!-- print "";
			print "<a href='index.php'>Click Here to back to home page</a>"; -->
			<?php
				include "footer.php";
			?>
		</div>
	</body>
</html>
