<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/master.css" />
	</head>
	<body>
		<div class="container">
				<?php
					require "recipemanagementdb_connect.php";
					include "header.php";
					$recipeID = $_GET["id"];

					global $dbConn;

					//from Recipe table
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
					//from Author table
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
						//from Step table
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

					//from step_ingredient and ingredient table
					//depence on different stepID we can find all the ingredientIDs,
					//then we use each ingredientIDs to find ingredientName
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

					echo '<div class="row">
									<div class="col s3">
										<div class="row">
											<div class="card hoverable">
												<div class="card-image">
													<img src="images/recipes/'.$recipeID.'.jpg" alt="Recipe Image"/>
												</div>
												<div class="card-content">
													<div class="card-title ">'.$resultRecipe[0]['RecipeName'].'</div>
													<p>'.$resultRecipe[0]['RecipeDesc'].'</p><br /><br />
													<div class="center">
														<div class="chip red white-text ">Preptime : '.$resultRecipe[0]['PrepTime'].'</div>
														<div class="chip blue white-text">Cooktime : '.$resultRecipe[0]['CookTime'].'</div><br />
														<div class="chip teal white-text">Author : '.$resultAuthor[0]['AuthorName'].'</div><br />
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col s9">
										<div class="row">
											<div class="col s8">
												<div class="card hoverable">
														<ol class="collection with-header">
															<li class="collection-header center card-title">Directions</li>';
														for($i=0;$i<$countStep;$i++){
															$j=$i+1;
															print "<li class='collection-item z-depth-3'>".$resultStep[$i]['StepDesc']."</li>";
														}
					echo							'</ol>
													</div>
											</div>
											<div class="col s4">
												<div class="card hoverable">
													<ol class="collection with-header">
														<li class="collection-header center card-title">Ingredients</li>';

														$countStep_ing = count($StepArray);
														$countIng = count($IngArray);

														for($i=0;$i<$countStep_ing;$i++){
															$countStep_ingI = count($StepArray[$i]);
															for($j=0;$j<$countStep_ingI;$j++){
																$IngredientIDTmp=$StepArray[$i][$j]['IngredientID'];
																if($IngredientIDTmp!=null){
																	for($k=0;$k<$countIng;$k++){
																		if($IngArray[$k]['IngredientID']==$IngredientIDTmp){
																			print "<li class='collection-item z-depth-3'>".$IngArray[$k]['IngredientName']." ";
																		}
																	}
																	print $StepArray[$i][$j]['IngredientAmt']." ".$StepArray[$i][$j]['AmtUnits']."</li>";
																}
															}
														}
					echo						'</ol>
												</div>
											</div>
										</div>
									</div>
								</div>';
				?>
				<?php include "footer.php"; ?>
			</div>
			<script src="js/materialize.js"></script>
	</body>
</html>
