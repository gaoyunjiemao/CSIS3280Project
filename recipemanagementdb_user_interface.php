<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<?php
	require("recipemanagementdb_connect.php");
	?>
	<form action="recipemanagementdb_user_interface.php" method="post" id="usrform">
	Recipe Name:<br />
	<input type="text" name="recipeName" /><br />
	Prep Time:<br />
	<input type="text" name="prepTime" /><br />
	Cook Time:<br />
	<input type="text" name="cookTime" /><br />
	Description:<br />
	<textarea rows="5" cols="50" name="desc" form="usrform"></textarea>
	<br /><br />
	<input type="submit" name="submit" value="Submit"/>
	<input type="button" name="next" value="Next">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$recipeName = $_POST['recipeName'];
		$desc = $_POST['prepTime'];
		$prepTime = $_POST['cookTime'];
		$cookTime = $_POST['desc'];
		$insertIntoRecipe = $dbConn->prepare("INSERT INTO RECIPE(RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES ('$recipeName','$desc',201,'$prepTime','$cookTime')");
		$insertIntoRecipe->execute();
	}
	?>
	</body>
</html>