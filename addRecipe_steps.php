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
		<script language="javascript">var i=2;</script>
	</head>
	<body>
	<form action="addRecipe_steps.php" method="post" id="usrform">
		Step No. <?php $stepNumber = $_SESSION['stepNum']; print $stepNumber;?><br />
		Step Description:<br />
		<textarea rows="5" cols="50" name="desc" form="usrform"></textarea><br /><br />
		Ingredient: <input type="text" name="ingredient1" />
		Ingredient Amount: <input type="text" name="ingredientAmt1" />
		Amount Units: <input type="text" name="amtUnits1" /><br />
		<div id="my_div"></div><br />
		<input type="button" name="addIngredient" value="Add Ingredient" onClick="changeIt()"><br /><br />
		<input type="submit" name="add" value="Add step">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" name="finish" value="Finish">
	</form>
	
	<script language="javascript">
			//var i = 2;
			function changeIt()
			{
				if(i<6){
					my_div.innerHTML = my_div.innerHTML +"Ingredient: <input type='text' name='ingredient"+ i +"'>";
					my_div.innerHTML = my_div.innerHTML +" Ingredient Amount: <input type='text' name='ingredientAmt"+ i + "'>";
					my_div.innerHTML = my_div.innerHTML +" Amount Units: <input type='text' name='amtUnits"+ i+"'><br />";
					//document.getElementById("demo").innerHTML = 'amtUnits'+ i;
					i++;
				}
			}
	</script>
		<?php
			require("recipemanagementdb_connect.php");
		
			if(isset($_POST['add'])){
				$recipeID = $_SESSION['RecipeID'];
				$stepDesc = $_POST['desc'];
				
				
				if($recipeID!=NULL&&$stepNumber!=NULL&&$stepDesc!=NULL){
					if(isset($_SESSION['AuthorID'])){
						$insertIntoSteps = $dbConn->prepare("INSERT INTO STEP(RecipeID,StepNumber,StepDesc) VALUES ('$recipeID','$stepNumber','$stepDesc')");
						
						$insertIntoSteps->execute();
						
						$getStepID = $dbConn->lastInsertId();
						
						for($i=1;$i<6;$i++){
							if(isset($_POST['ingredient'.$i.''])||isset($_POST['ingredientAmt'.$i.''])||isset($_POST['amtUnits'.$i.''])){
								$ingredient = $_POST['ingredient'.$i.''];
								$ingredientAmt = $_POST['ingredientAmt'.$i.''];
								$amtUnits = $_POST['amtUnits'.$i.''];
								
								$insertIntoIngredients = $dbConn->prepare("INSERT INTO INGREDIENT(IngredientName) VALUES ('$ingredient')");
								$insertIntoIngredients->execute();
						
								$getIngredientID = $dbConn->lastInsertId();
								
								$insertIntoStep_Ing = $dbConn->prepare("INSERT INTO STEP_INGREDIENT(StepID,IngredientID,IngredientAmt,AmtUnits) VALUES ('$getStepID', '$getIngredientID', '$ingredientAmt', '$amtUnits')");
								
								$insertIntoStep_Ing->execute();
							}
						}
						
						//increment step number
						$_SESSION['stepNum']++;
						
						header("Refresh:0");
					}
				}else{
					print "<p>Please fill out all the blanks.</p>";
				}
			}else if(isset($_POST['finish'])){
				$recipeID = $_SESSION['RecipeID'];
				$stepDesc = $_POST['desc'];
				
				
				if($recipeID!=NULL&&$stepNumber!=NULL&&$stepDesc!=NULL){
					if(isset($_SESSION['AuthorID'])){
						$insertIntoSteps = $dbConn->prepare("INSERT INTO STEP(RecipeID,StepNumber,StepDesc) VALUES ('$recipeID','$stepNumber','$stepDesc')");
						
						$insertIntoSteps->execute();
						
						$getStepID = $dbConn->lastInsertId();
						
						for($i=1;$i<6;$i++){
							if(isset($_POST['ingredient'.$i.''])||isset($_POST['ingredientAmt'.$i.''])||isset($_POST['amtUnits'.$i.''])){
								$ingredient = $_POST['ingredient'.$i.''];
								$ingredientAmt = $_POST['ingredientAmt'.$i.''];
								$amtUnits = $_POST['amtUnits'.$i.''];
								
								$insertIntoIngredients = $dbConn->prepare("INSERT INTO INGREDIENT(IngredientName) VALUES ('$ingredient')");
								$insertIntoIngredients->execute();
						
								$getIngredientID = $dbConn->lastInsertId();
								
								$insertIntoStep_Ing = $dbConn->prepare("INSERT INTO STEP_INGREDIENT(StepID,IngredientID,IngredientAmt,AmtUnits) VALUES ('$getStepID', '$getIngredientID', '$ingredientAmt', '$amtUnits')");
								
								$insertIntoStep_Ing->execute();
								
								unset($_SESSION['stepNum']);
								header('Location: recipe_saved.php');
							}
						}
					}
				}else{
					print "<p>Please fill out all the blanks.</p>";
				}
			}
		?>
		<p id="demo"></p>
	</body>
</html>
