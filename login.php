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
<<<<<<< HEAD
    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
      <main class="mdl-layout__content">
        <div class="mdl-card mdl-shadow--6dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Acme Co.</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <form action="#">
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="username" />
                <label class="mdl-textfield__label" for="username">Username</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="userpass" />
                <label class="mdl-textfield__label" for="userpass">Password</label>
              </div>
            </form>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
          </div>
        </div>
      </main>
    </div>
    <!-- <center>
      <form action="#" action="" method="post">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="usernameText" name="usernameText">
            <label class="mdl-textfield__label" for="usernameText">Username</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" id="password" name="password">
            <label class="mdl-textfield__label" for="password">Password</label>
          </div>
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" name="signInButton">Sign In</button>
          <a href="#">Create Account</a>
          <a href="#">Forgot Password?</a>
        </div>
      </form>
    </center> -->
=======
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
>>>>>>> 14a97d7164822138d9f3be303358d46d83411ee7
  </body>

</html>
