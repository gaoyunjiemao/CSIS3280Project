<!DOCTYPE html>
<html>
<?php
	require "recipemanagementdb_connect.php";
?>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form class="col s12" action="" method="post">
			<p><label for="email">Enter your email address : </label>
			<input id="email" type="email" name="email" class="validate" required></p>
			<p><label for="password">Enter your security password : </label>
			<input id="password" type="password" name="password" class="validate" required></p>
			<button type="submit" name="submit">Find your password</button>
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
    						print "<div>Your password is :".$resultSecurity[0]['AuthorPassword']."</div>
    						<a href='login.php'>Please click here to back to log in page</a>";
    					}
    					else{
    						print "<div class='error card-content'>Wrong security password, please try again</div>";
    					}
    				}
    				else{
    					print "<div class='error card-content'>You haven't set up your security password before</div>
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
	</body>
</html>