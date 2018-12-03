<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
	require "recipemanagementdb_connect.php";
?>
  <head>
    <meta charset="utf-8">
    <title>Create your Recipe Manager Account</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/login_register.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
  </head>
  <body>
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
								<input id="usernameText" type="text" name="usernameText" class="validate" required>
								<label for="usernameText">Name</label>
							</div>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">email</i>
								<input id="emailText" type="email" name="emailText" class="validate" required>
								<label for="emailText">Email</label>
							</div>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<input id="password" type="password" name="password" class="validate" required>
								<label for="password">Password</label>
							</div>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<input id="password2" type="password" name="password2" class="validate" required>
								<label for="password2">Confirm Password</label>
							</div>
						</div>
						<div class="">
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<input id="password3" type="password" name="password3" class="validate" required>
								<label for="password3">Enter Another Security Password</label>
							</div>
						</div>
						<div class="row">
							<button class="waves-effect waves-light btn blue col s5 right" type="submit" name="submit">Register</button>
							<p class="col s1 right"></p>
							<a class="waves-effect waves-light btn red col s5 right" href="login.php">Login</a>
						</div>
					</div>
      <?php
		if(isset($_POST['submit'])){
			global $dbConn;
	  		$userName = $_POST['usernameText'];
	  		$userEmail = $_POST['emailText'];
	  		$userPassword = $_POST['password'];
	  		$userPasswordCon = $_POST['password2'];
	  		$userSecurityPassword = $_POST['password3'];

	  		if($userName!=null&&$userEmail!=null&&$userPassword!=null&&$userPasswordCon!=null){
	  			if($userPassword == $userPasswordCon){
					$InsertUserQuery = "INSERT INTO author (AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES ('$userName','$userEmail','$userPassword','$userSecurityPassword')";
					try{
						$checkInsertUserName = $dbConn->prepare($InsertUserQuery);
						$checkInsertUserName->execute();
						print "Good to go! Please sign in!";
						header('Location: login.php');
					}
					catch(PDOExcpetion $ex){
						print "Failed";
					}
				}
				else{
					print "<div class='error card-content'>Please confirm your password</div>";
				}
			}
			else{
				print "<div class='error card-content'>Please enter your name, email address and password, thanks!</div>";
			}
	  	}

      ?>
    </form>
		<script src="js/materialize.js"></script>
  </body>
</html>
