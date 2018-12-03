<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
		<link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/master.css" />
    <title>Home</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
  	<?php
	require "recipemanagementdb_connect.php";
  include "header.php";
  echo '<div class="row">';

	global $dbConn;
	$recipeName = "SELECT * FROM recipe";

	try{
		//prepare query statement
		$displayRecipe=$dbConn->prepare($recipeName);
		//execute query
		$displayRecipe->execute();
		//fetcch query results
		$recipeTable=$displayRecipe->fetchall(PDO::FETCH_ASSOC);
		//release db connector Cursor
		$displayRecipe -> CloseCursor();

	}
	catch(PDOException $ex){
		//get error Message
		$ex -> getMessage();
	}

	// print "<center>
	// 		<table border=1>
	// 		<tr>
	// 		<th>Recipe Name</th>
	// 		<th>Recipe Description</th>
	// 		<th>Prepare Time</th>
	// 		<th>Cook Time</th>
	// 		<th>Author Name</th>
	// 		</tr>";

	$countAmt = count($recipeTable);
	for($i = 0; $i<$countAmt ; $i++){
		$authorID = $recipeTable[$i]['AuthorID'];
		$authorName = "SELECT AuthorName FROM author WHERE AuthorID IN(SELECT AuthorID FROM recipe WHERE AuthorID = '$authorID')";

		try{
			$displayAuthor=$dbConn->prepare($authorName);
			$displayAuthor->execute();
			$recipeAuthor=$displayAuthor->fetchall(PDO::FETCH_ASSOC);
			$displayAuthor -> CloseCursor();
		}
		catch(PDOException $ex){
			$ex -> getMessage();
		}

		// print  "<tr><td>".$recipeTable[$i]['RecipeName']."</td>
		// 		<td>".$recipeTable[$i]['RecipeDesc']."</td>
		// 		<td>".$recipeTable[$i]['PrepTime']."</td>
		// 		<td>".$recipeTable[$i]['CookTime']."</td>
		// 		<td>".$recipeAuthor['0']['AuthorName']."</td></tr>";

    print '<div class="main col s4">
            <div class="card medium hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="images/recipes/'.$recipeTable[$i]['RecipeID'].'.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">'.$recipeTable[$i]['RecipeName'].'<i class="material-icons right">more_vert</i></span>
                <div class="card-action">
                <p><a href="displayRecipePage.php?id='.$recipeTable[$i]['RecipeID'].'">View Recipe</a></p>
                </div>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <span class="card-title grey-text text-darken-4 card-content">'.$recipeTable[$i]['RecipeName'].'</span>
                <p class="card-content">'.$recipeTable[$i]['RecipeDesc'].'</p>
                <div class="chip"><i class="close material-icons">access_time</i>'.$recipeTable[$i]['PrepTime'].'</div>
                <div class="chip"><i class="close material-icons">access_alarms</i>'.$recipeTable[$i]['CookTime'].'</div><br />
                <div class="chip">'.$recipeAuthor['0']['AuthorName'].'</div>
              </div>
            </div>
          </div>';
	}
  echo "</div>";
  include "footer.php";
	// print   "</tr></table></center>";

	?>
  </div>
  </div>
  	<script src="js/materialize.js"></script>
  </body>
</html>
