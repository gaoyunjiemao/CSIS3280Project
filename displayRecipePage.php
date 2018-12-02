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
	

	<a href="home_displayRecipe.php">back to home</a>	
	
	<?php	
	$recipeID = $_GET["id"];
			
	global $dbConn;
	$recipeQuery = "SELECT * FROM recipe WHERE RecipeID = '$recipeID'";	
	
	try{
		$runRecipeQuery=$dbConn->prepare($recipeQuery);
		$runRecipeQuery->execute();
		$resultRecipe=$runRecipeQuery->fetchall(PDO::FETCH_ASSOC);
		$runRecipeQuery -> CloseCursor();
	}
	catch(PDOException $ex){
    	print "<p>Failed</p>";
    	print $ex->getMessage();
	}		
	
	//print "<pre>";
	//print_r($resultRecipe);
	//print "</pre>";

//==============================================================================
	$authorID = $resultRecipe[0]['AuthorID'];
	$authorQuery = "SELECT * FROM author WHERE AuthorID ='$authorID'";	
	
	try{
		$runAuthorQuery=$dbConn->prepare($authorQuery);
		$runAuthorQuery->execute();
		$resultAuthor=$runAuthorQuery->fetchall(PDO::FETCH_ASSOC);
		$runAuthorQuery -> CloseCursor();
	}
	catch(PDOException $ex){
    	print "<p>Failed</p>";
    	print $ex->getMessage();
	}		
	
	//print "<pre>";
	//print_r($resultAuthor);
	//print "</pre>";

//==============================================================================
	$stepQuery = "SELECT * FROM step WHERE RecipeID ='$recipeID'";	
	
	try{
		$runStepQuery=$dbConn->prepare($stepQuery);
		$runStepQuery->execute();
		$resultStep=$runStepQuery->fetchall(PDO::FETCH_ASSOC);
		$runStepQuery -> CloseCursor();
	}
	catch(PDOException $ex){
    	print "<p>Failed</p>";
    	print $ex->getMessage();
	}		
	
	//print "<pre>";
	//print_r($resultStep);
	//print "</pre>";
	
//==============================================================================
	$IngArray = array();
	$StepArray = array();
	$countStep = count($resultStep);
	for($i=0;$i<$countStep;$i++){
		$stepID = $resultStep[$i]['StepID'];
		$step_ingQuery = "SELECT * FROM step_ingredient WHERE stepID ='$stepID'";	
	
		try{
			$runStep_IngQuery=$dbConn->prepare($step_ingQuery);
			$runStep_IngQuery->execute();
			$resultStep_Ing=$runStep_IngQuery->fetchall(PDO::FETCH_ASSOC);
			$runStep_IngQuery -> CloseCursor();
		}
		catch(PDOException $ex){
    		print "<p>Failed</p>";
    		print $ex->getMessage();
		}			
		array_push($StepArray,$resultStep_Ing);
		
		$countStep_Ing = count($resultStep_Ing);		
		for($j=0;$j<$countStep_Ing;$j++){
			$ingID = $resultStep_Ing[$j]['IngredientID'];
			if($ingID!=null){
				$ingredientQuery = "SELECT * FROM ingredient WHERE IngredientID ='$ingID'";		
				try{
					$runIngredientQuery=$dbConn->prepare($ingredientQuery);
					$runIngredientQuery->execute();
					$resultIngredient=$runIngredientQuery->fetchall(PDO::FETCH_ASSOC);
					$runIngredientQuery -> CloseCursor();
				}
				catch(PDOException $ex){
    				print "<p>Failed</p>";
    				print $ex->getMessage();
				}		
				array_push($IngArray,$resultIngredient[0]);				
			}				
		}				
	}
	
	//print "<pre>";
	//print_r($StepArray);
	//print "</pre>";
	
	//print "<pre>";
	//print_r($IngArray);
	//print "</pre>";
	
//==============================================================================	
	
	
	print "<table border=1>
		<tr><th><p>RECIPE NAME</p></th></tr>
		<tr><td><p align='center'>".$resultRecipe[0]['RecipeName']."</p></td></tr>
		<tr><th><p>RECIPE DESC</p></th></tr>
		<tr><td><p align='center'>".$resultRecipe[0]['RecipeDesc']."</p></td></tr>
		<tr><th><p>PREPARE TIME</p></th></tr>
		<tr><td><p align='center'>".$resultRecipe[0]['PrepTime']."</p></td></tr>
		<tr><th><p>COOK TIME</p></th></tr>
		<tr><td><p align='center'>".$resultRecipe[0]['CookTime']."</p></td></tr>
		<tr><th><p>AUTHER NAME</p></th></tr>
		<tr><td><p align='center'>".$resultAuthor[0]['AuthorName']."</p></td></tr>";
		for($i=0;$i<$countStep;$i++){
			$j=$i+1;
			print "<tr><th><p>Step : $j</p></th></tr>
			<tr><td><p align='center'>".$resultStep[$i]['StepDesc']."</p></td></tr>";			
		}
		print "<tr><th><p>---Ingredient---</p></th></tr>";
		$countStep_ing = count($StepArray);
		$countIng = count($IngArray);
		for($i=0;$i<$countStep_ing;$i++){
			$countStep_ingI = count($StepArray[$i]);
			for($j=0;$j<$countStep_ingI;$j++){
				$IngredientIDTmp=$StepArray[$i][$j]['IngredientID'];
				if($IngredientIDTmp!=null){
					print "<tr><th><p>Ingredient Name</p></th></tr>";					
					for($k=0;$k<$countIng;$k++){
						if($IngArray[$k]['IngredientID']==$IngredientIDTmp){
							print "<tr><td><p align='center'>".$IngArray[$k]['IngredientName']."</p></td></tr>";
						}
					}
					print "<tr><th><p>Ingredient Amount</p></th></tr>
					<tr><td><p align='center'>".$StepArray[$i][$j]['IngredientAmt']."</p></td></tr>
					<tr><th><p>Amount units</p></th></tr>
					<tr><td><p align='center'>".$StepArray[$i][$j]['AmtUnits']."</p></td></tr>";
				}

			}			
		} 
		
	print "</table>";
	
	?>
	
	

	</body>
</html>