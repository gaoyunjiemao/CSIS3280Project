<!DOCTYPE html>
<html>
<?php
	require "recipemanagementdb_connect.php";
?>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/login_register.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
	</head>
	<body>
		<div class="container">
			<div class="container">
				<div class="card">
				<form class="" action="" method="post">
					<div class="card-content">
						<div class="row">
							<center>
								<img src="images/logo/fallrecipes.png" alt="Website Logo">
							</center>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">account_circle</i>
								<input id="email" type="email" name="email" class="validate" required>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<input id="password" type="password" name="password" class="validate" required>
								<label for="password">Password</label>
							</div>
						</div>
						<div class="row">
							<button class="waves-effect waves-light btn blue col s6 right" type="submit" name="submit">Find your password</button>
							<p class="col s1 right"></p>
							<a class="waves-effect waves-light btn red col s5 right" href="login.php">Back to Login</a>
						</div>
					<?php
						if(isset($_POST['submit'])){
							global $dbConn;
				    		$email = $_POST['email'];
				    		$securityPassword = $_POST['password'];

				    		$securityQuery = "SELECT AuthorSecurityPassword,AuthorPassword FROM author WHERE AuthorEmail = '$email'";
				    		try{
				    			$checkSecurity= $dbConn->prepare($securityQuery);
								$checkSecurity->execute();
								$resultSecurity= $checkSecurity->fetchall(PDO::FETCH_ASSOC);
				    			$checkSecurity->CloseCursor();

				    			//print_r($resultSecurity);

				    			if($email!=null && $securityPassword!=null){
				    				if($resultSecurity!=null){
				    					if($resultSecurity[0]['AuthorSecurityPassword']==$securityPassword){
				    						print "<div class='row green-text card-content'>Your password is :".$resultSecurity[0]['AuthorPassword']."</div>";
				    					}
				    					else{
				    						print "<div class='red-text card-content'>Wrong security password, please try again</div>";
				    					}
				    				}
				    				else{
				    					print "<div class='red-text card-content'>You haven't set up your security password before</div>
				                    <div class='card-action'>
				                      <a href='register.php'>Click Here to sign Up</a>
				                     </div>";
				    				}
				    			}
				    			else{
				    				print "<div class='error card-content'>Please enter your account and password! Thanks!</div>";
				    			}
							}
							catch(PDOExcpetion $ex){
								print "Failed";
							}
						}
					?>

		</form>

	</div>
</div>
</div>
	<script src="js/materialize.js"></script>
	</body>
</html>
