<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
  	<?php
	require "recipemanagementdb_connect.php";

	if(isset($_SESSION['AuthorName'])){
		print "Welcome!".$_SESSION['AuthorName']."!";
	}
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

	print "<center>
			<table border=1>
			<tr>
			<th>Recipe Name</th>
			<th>Recipe Description</th>
			<th>Prepare Time</th>
			<th>Cook Time</th>
			<th>Author Name</th>
			</tr>";

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

		print  "<tr><td>".$recipeTable[$i]['RecipeName']."</td>
				<td>".$recipeTable[$i]['RecipeDesc']."</td>
				<td>".$recipeTable[$i]['PrepTime']."</td>
				<td>".$recipeTable[$i]['CookTime']."</td>
				<td>".$recipeAuthor['0']['AuthorName']."</td></tr>";
	}

	print   "</tr></table></center>";
	?>
  </body>
</html>
