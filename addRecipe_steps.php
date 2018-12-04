<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/master.css" />
		<script language="javascript">var i=2;</script>
	</head>
	<body>
		<div class="container">
			<?php
			require("recipemanagementdb_connect.php");
			include 'header.php';
			if (!(isset($_SESSION['AuthorName']))) {
				header('Location: login.php');
				exit;
			}
			if(!isset($_SESSION['stepNum'])){
				$_SESSION['stepNum']=1;
			}
			?>
			<div class="container">
				<div class="card">
					<div class="card-content card-title center">Step No. <?php $stepNumber = $_SESSION['stepNum']; print $stepNumber;?></div>
					<div class="card-content">
						<form action="addRecipe_steps.php" method="post" id="usrform">
							<div class="row">
								<div class="input-field col s12">
									<textarea id="desc" name="desc" type="text" class="validate materialize-textarea" form="usrform"></textarea>
          				<label for="desc">Description</label>
								</div>
							</div>
							<div id="my_div">
								<div class="row">
									<div class="input-field col s4">
										<input id="ingredient1" name="ingredient1" type="text" class="validate">
										<label for="ingredient1">Ingredient</label>
									</div>
									<div class="input-field col s4">
										<input id="ingredientAmt1" name="ingredientAmt1" type="text" class="validate">
										<label for="ingredientAmt1">Ingredient Amount</label>
									</div>
									<div class="input-field col s4">
										<input id="amtUnits1" name="amtUnits1" type="text" class="validate">
										<label for="amtUnits1">Amount Units</label>
									</div>
								</div>
							</div>
							<div class="row">
								<button class="waves-effect waves-light btn blue col s3 right" type="submit" name="finish" value="Submit"/>Finish</button>
								<p class="col s1 right"></p>
								<button class="waves-effect waves-light btn blue col s3 right" type="submit" name="add" value="Submit"/>Add step</button>
								<p class="col s1 right"></p>
								<button class="waves-effect waves-light btn blue col s3 right" type="button" name="addIngredient" onClick="changeIt()"/>Add Ingredient</button>
							</div>

	<script language="javascript">
			//var i = 2;
			function changeIt()
			{
				if(i<6){
					my_div.innerHTML = my_div.innerHTML + '<div class="row">'
					 																		+ 	'<div class="input-field col s4">'
																							+ 		'<input id="ingredient'+i+'" name="ingredient'+i+'" type="text" class="validate">'
																							+ 		'<label for="ingredient'+i+'">Ingredient</label>'
																							+ 	'</div>'
																							+ 	'<div class="input-field col s4">'
																							+ 		'<input id="ingredientAmt'+i+'" name="ingredientAmt'+i+'" type="text" class="validate">'
																							+ 		'<label for="ingredientAmt'+i+'">Ingredient Amount</label>'
																							+ 	'</div>'
																							+ 	'<div class="input-field col s4">'
																							+ 		'<input id="amtUnits'+i+'" name="amtUnits'+i+'" type="text" class="validate">'
																							+ 		'<label for="amtUnits'+i+'">Amount Units</label>'
																							+ 	'</div>'
																							+ '</div>'
					// my_div.innerHTML = my_div.innerHTML +"Ingredient: <input type='text' name='ingredient"+ i +"'>";
					// my_div.innerHTML = my_div.innerHTML +" Ingredient Amount: <input type='text' name='ingredientAmt"+ i + "'>";
					// my_div.innerHTML = my_div.innerHTML +" Amount Units: <input type='text' name='amtUnits"+ i+"'><br />";
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
							if(isset($_POST['ingredient'.$i.''])&&$_POST['ingredient'.$i.'']!=NULL||isset($_POST['ingredientAmt'.$i.''])&&$_POST['ingredientAmt'.$i.'']!=NULL||isset($_POST['amtUnits'.$i.''])&&$_POST['amtUnits'.$i.'']!=NULL){
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

						?>
						<script type="text/javascript">
						window.location = "http://localhost/addRecipe_steps.php";
						</script>
						<?php
					}
				}else{
					print "<p class='card-content red-text'>Please fill out all the blanks.</p>";
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
							if(isset($_POST['ingredient'.$i.''])&&$_POST['ingredient'.$i.'']!=NULL||isset($_POST['ingredientAmt'.$i.''])&&$_POST['ingredientAmt'.$i.'']!=NULL||isset($_POST['amtUnits'.$i.''])&&$_POST['amtUnits'.$i.'']!=NULL){
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
					}
				}else{
					print "<p class='red-text'>Please fill out all the blanks.</p>";
				}

				unset($_SESSION['stepNum']);
								?>
								<script type="text/javascript">
								window.location = "http://localhost/recipe_saved.php";
								</script>
								<?php
			}
		?>
		<p id="demo"></p>
		<?php include "footer.php"; ?>
		<script src="js/materialize.js"></script>
	</body>
</html>
