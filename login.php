<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
	require "recipemanagementdb_connect.php";
?>
  <head>
    <meta charset="utf-8">
    <title>Recipe Manager</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="text" name="usernameText" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit">Sign In</button>
      <?php
      if(isset($_POST['submit'])){
      	global $dbConn;
	  	$userName = $_POST['usernameText'];
	  	$userPassword = $_POST['password'];
	  	
	  	$UserNameQuery = "SELECT AuthorName FROM author WHERE AuthorName = '$userName'";
	  	$UserPasswordQuery = "SELECT AuthorPassword FROM author WHERE AuthorName = '$userName'";
	  	try{
			$checkUserName = $dbConn->prepare($UserNameQuery);
			$checkUserPassword = $dbConn->prepare($UserPasswordQuery); 	
			$checkUserName->execute();
			$checkUserPassword->execute();
			$resultUserName = $checkUserName->fetchall(PDO::FETCH_ASSOC);
			$resultUserPassword = $checkUserPassword->fetchall(PDO::FETCH_ASSOC);
			$checkUserName -> CloseCursor();
			$checkUserPassword -> CloseCursor();
			
			/*print "<pre>";
			print_r($resultUserName);
			print "</pre>";
			print "<pre>";
			print_r($resultUserPassword);
			print "</pre>";*/
			
			
			if($userName!=null && $userPassword!=null){
				if($resultUserName!=null&&$resultUserPassword!=null){
					if($resultUserPassword[0]['AuthorPassword']==$userPassword){
						print "Good to go";
						header('Location: home_displayRecipe.php');
						
					}
					else{
						Print "Password Wrong~";
					}
				}
				else{
					print "You haven't set up your account or password before, <a href='#'> click here </a> to sing up!";
				}
			}
			else{
				print "Please enter your account and password! Thanks!";
			}			
		}
		catch(PDOExcpetion $ex){
			print "Failed";
		}
	  }
      
      
      
 
      
      ?>
      
      
      
      <a href="#">Create Account</a>
      <a href="#">Forgot Password?</a>
    </form>
  </body>
</html>
