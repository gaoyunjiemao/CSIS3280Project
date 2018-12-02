<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<form action="addRecipe_steps.php" method="post" id="usrform">
		Step No. <?php $_SESSION['stepNum'] = 1; print $_SESSION['stepNum']; $_SESSION['stepNum']++;?><br />
		Step Description:<br />
		<textarea rows="5" cols="50" name="desc" form="usrform"></textarea><br />
		Ingredient:<br />
		<input type="text" name="ingredient1" /><br />
		Ingredient Amount:<br />
		<input type="text" name="ingredientAmt1" /><br />
		Amount Units:<br />
		<input type="text" name="amtUnits1" />
		<br />
		<div id="my_div"></div>
		<input type="button" value="Add Ingredient" onClick="changeIt()"><br /><br />
		<input type="submit" name="submit" value="Submit"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" name="next" value="Next">
	</form>
	
	<script language="javascript">
			var i = 2;
			function changeIt()
			{
				my_div.innerHTML = my_div.innerHTML +"Ingredient:<br /><input type='text' name='ingredient'+ i><br />";
				my_div.innerHTML = my_div.innerHTML +"Ingredient Amount:<br /><input type='text' name='ingredientAmt'+ i><br />";
				my_div.innerHTML = my_div.innerHTML +"Amount Units:<br /><input type='text' name='amtUnits'+ i><br />";
				i++;
			}
	</script>
		<?php
			require("recipemanagementdb_connect.php");
		
			if(isset($_POST['submit'])){
				$recipeID = $_SESSION['RecipeID'];
				$stepNumber = $_SESSION['stepNum'];
				$stepDesc = $_POST['desc'];
				
				if($recipeID!=NULL&&$stepNumber!=NULL&&$stepDesc!=NULL){
					if(isset($_SESSION['AuthorID'])){
						$insertIntoSteps = $dbConn->prepare("INSERT INTO STEP(RecipeID,StepNumber,StepDesc) VALUES ('$recipeID','$stepNumber','$stepDesc')");
						
						$insertIntoSteps->execute();
						
						$getStepID = $dbConn->lastInsertId();
					}
				}
			}
			if(isset($_POST['next'])){
				header('Location: addRecipe_steps.php');
			}
		?>
	</body>
</html>
