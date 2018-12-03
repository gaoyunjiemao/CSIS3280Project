<?php

session_start();
if(!isset($_SESSION['stepNum'])){
	$_SESSION['stepNum']=1;
} 

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<form action="addRecipe_steps.php" method="post" id="usrform">
		Step No. <?php $stepNumber = $_SESSION['stepNum']; print $stepNumber;?><br />
		Step Description:<br />
		<textarea rows="5" cols="50" name="desc" form="usrform"></textarea><br /><br />
		Ingredient: 
		<input type="text" name="ingredient1" />
		Ingredient Amount: 
		<input type="text" name="ingredientAmt1" />
		Amount Units: 
		<input type="text" name="amtUnits1" />
		<br />
		<div id="my_div"></div><br />
		<input type="button" name="addIngredient" value="Add Ingredient" onClick="changeIt()"><br /><br />
		<input type="submit" name="add" value="Add step">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" name="finish" value="Finish">
	</form>
	
	<script language="javascript">
			var i = 2;
			function changeIt()
			{
				my_div.innerHTML = my_div.innerHTML +"Ingredient: <input type='text' name='ingredient'+ i>";
				my_div.innerHTML = my_div.innerHTML +" Ingredient Amount: <input type='text' name='ingredientAmt'+ i>";
				my_div.innerHTML = my_div.innerHTML +" Amount Units: <input type='text' name='amtUnits'+ i><br />";
				i++;
			}
	</script>
		<?php
			require("recipemanagementdb_connect.php");
		
			if(isset($_POST['add'])){
				$recipeID = $_SESSION['RecipeID'];
				$stepDesc = $_POST['desc'];
				$ingredient = $_POST['ingredient1'];
				$ingredientAmt = $_POST['ingredientAmt1'];
				$amtUnits = $_POST['amtUnits1'];
				
				if($recipeID!=NULL&&$stepNumber!=NULL&&$stepDesc!=NULL){
					if(isset($_SESSION['AuthorID'])){
						$insertIntoSteps = $dbConn->prepare("INSERT INTO STEP(RecipeID,StepNumber,StepDesc) VALUES ('$recipeID','$stepNumber','$stepDesc')");
						
						$insertIntoSteps->execute();
						
						$getStepID = $dbConn->lastInsertId();
						
						$insertIntoIngredients = $dbConn->prepare("INSERT INTO INGREDIENT(IngredientName) VALUES ('$ingredeint')");

						$insertIntoIngredients->execute();
						
						$getIngredientID = $dbConn->lastInsertId();
						
						$insertIntoStep_Ing = $dbConn->prepare("INSERT INTO STEP_INGREDIENT(StepID,IngredientID,IngredientAmt,AmtUnits) VALUES ('$getStepID', '$getIngredientID', '$ingredientAmt', '$amtUnits')");
						
						
						$insertIntoStep_Ing->execute();
						
						//increment step number
						$_SESSION['stepNum']++;
						
						header("Refresh:0");
					}
				}else{
					print "<p>Please fill out all the blanks.</p>";
				}
			}else if(isset($_POST['finish'])){
				unset($_SESSION['stepNum']);
				header("Refresh:0");
				print "Your Recipe was successfully added.";
			}
		?>
	</body>
</html>
