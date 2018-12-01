<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
	require "recipemanagementdb_connect.php";
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Manager</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/material.js"></script>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="text" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit">Sign In</button>
      <p><a href="#">Create Account</a>
     <a href="#">Forgot Password?</a></p>
      <?php
      if(isset($_POST['submit'])){
      	global $dbConn;
	  	$email = $_POST['email'];
	  	$userPassword = $_POST['password'];

	  	$UserQuery = "SELECT AuthorID,AuthorName,AuthorEmail,AuthorPassword FROM author WHERE AuthorEmail = '$email'";
	  	try{
			$checkUser = $dbConn->prepare($UserQuery);
			$checkUser->execute();
			$resultUser = $checkUser->fetchall(PDO::FETCH_ASSOC);
			$checkUser -> CloseCursor();

			if($email!=null && $userPassword!=null){
				if($resultUser!=null){
					if($resultUser[0]['AuthorPassword']==$userPassword){
						$_SESSION['AuthorName']=$resultUser[0]['AuthorName'];
						$_SESSION['AuthorID']=$resultUser[0]['AuthorID'];
						print "Good to go";
						header('Location: home_displayRecipe.php');
					}
					else{
						Print "<p>Wrong password, please enter again</p>";
					}
				}
				else{
					print "<p>You haven't set up your account or password before, <a href='#'> click here </a> to sign up!</p>";
				}
			}
			else{
				print "<p>Please enter your account and password! Thanks!</p>";
			}
		}
		catch(PDOExcpetion $ex){
			print "<p>Failed</p>";
			print $ex->getMessage();
		}
	  }
      ?>
    </form>
  </body>

</html>
