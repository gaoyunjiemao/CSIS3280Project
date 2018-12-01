<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
	require "recipemanagementdb_connect.php";
?>
  <head>
    <meta charset="utf-8">
    <title>Create your Recipe Manager Account</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="text" name="usernameText" placeholder="Username">
      <input type="email" name="emailText" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="password" name="password2" placeholder="Confirm Password" >
      <button type="submit" name="submit">Register</button>
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
					print "Please confirm your password";
				}
			}
			else{
				print "Please enter your name, email address and password, thanks!";
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
  </body>
</html>
