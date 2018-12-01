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
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
  </head>
  <body>
		<div class="container">
			<div class="card">
				<form class="col s12" action="" method="post">
					<div class="card-content">
						<div class="row ">
							<div class="input-field col s12 ">
								<input id="usernameText" type="text" name="usernameText" class="validate" required>
								<label for="usernameText">Username</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 ">
								<input id="emailText" type="email" name="emailText" class="validate" required>
								<label for="password">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 ">
								<input id="password" type="password" name="password" class="validate" required>
								<label for="password">Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 ">
								<input id="password2" type="password" name="password2" class="validate" required>
								<label for="password2">Confirm Password</label>
							</div>
						</div>
						<div class="row">
							<button class="waves-effect waves-light btn col s5 right" type="submit" name="submit">Register</button>
						</div>
					</div>
      <?php
		if(isset($_POST['submit'])){
			global $dbConn;
	  		$userName = $_POST['usernameText'];
	  		$userEmail = $_POST['emailText'];
	  		$userPassword = $_POST['password'];
	  		$userPasswordCon = $_POST['password2'];

	  		if($userName!=null&&$userEmail!=null&&$userPassword!=null&&$userPasswordCon!=null){
	  			if($userPassword == $userPasswordCon){
					$InsertUserQuery = "INSERT INTO author (AuthorName,AuthorEmail,AuthorPassword) VALUES ('$userName','$userEmail','$userPassword')";
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
     /*
        DROP TABLE IF EXISTS AUTHOR;
		CREATE TABLE IF NOT EXISTS AUTHOR(
   		AuthorID   INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  		,AuthorName VARCHAR(20) NOT NULL
  		,AuthorEmail VARCHAR(50) NOT NULL
  		,AuthorPassword VARCHAR(20) NOT NULL
		);
		INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (200,'Alexis','alexis@gmail.com','alexis1234');
	INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (201,'Judy Diercks Oreilly','judy@gmail.com','judy1234');
	INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (202,'Soup Loving Nicole','soup@gmail.com','soup1234');
	INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (203,'Andrea Cushman','andrea@gmail.com','andrea1234');
	INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (204,'VBRAUER671','vbrauer671@gmail.com','vbrauer671');
	INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword) VALUES (205,'Sean S.','sean@gmail.com','sean1234');*/
      ?>
    </form>
		<script src="js/materialize.js"></script>
  </body>
</html>
