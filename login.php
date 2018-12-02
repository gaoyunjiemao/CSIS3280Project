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
            <div class="">
              <div class="input-field col s12 ">
								<i class="material-icons prefix">email</i>
                <input id="email" type="email" name="email" class="validate" required>
                <label for="Email">Email</label>
              </div>
            </div>
            <div class="">
              <div class="input-field col s12 ">
								<i class="material-icons prefix">lock</i>
                <input id="password" type="password" name="password" class="validate" required>
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <button class="waves-effect waves-light btn blue col s5 right" type="submit" name="submit">Sign In</button>
            </div>
            <div class="row">
              <a class="waves-effect waves-light btn red col s5 right" href="register.php">Create Account</a>
              <a class="waves-effect waves-light btn red col s5 right" href="forget.php">Forgot Password?</a>
            </div>
          </div>
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
    						print "<div class='error card-content'>Wrong password, please try again</div>";
    					}
    				}
    				else{
    					print "<div class='error card-content'>You haven't set up your account or password before</div>
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
    			print "<p>Failed</p>";
    			print $ex->getMessage();
    		}
    	  }
          ?>
        </form>
      </div>
    </div>
    <script src="js/materialize.js"></script>
  </body>

</html>
