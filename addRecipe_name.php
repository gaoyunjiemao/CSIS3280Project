<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<?php
	require("recipemanagementdb_connect.php");
	
	if(isset($_SESSION['AuthorName'])){
		print "<h4 align='center' style='color:orange;'>Welcome back, ".$_SESSION['AuthorName']."!</h4>";
	}
	?>
	<form action="addRecipe_name.php" method="post" id="usrform" enctype="multipart/form-data">
	Recipe Name:<br />
	<input type="text" name="recipeName" /><br />
	Prep Time:<br />
	<input type="text" name="prepTime" /><br />
	Cook Time:<br />
	<input type="text" name="cookTime" /><br />
	Description:<br />
	<textarea rows="5" cols="50" name="desc" form="usrform"></textarea>
	<br /><br />
	Upload your cover image:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br /><br />
	<input type="submit" name="submit" value="Submit"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	
	</form>
    	
	<?php
	if(isset($_POST['submit'])){
	$recipeName = $_POST['recipeName'];
	$desc = $_POST['prepTime'];
	$prepTime = $_POST['cookTime'];
	$cookTime = $_POST['desc'];

	if($recipeName!=null&&$desc!=null&&$prepTime!=null&&$cookTime!=null){
		if(isset($_SESSION['AuthorID'])){
		$insertIntoRecipe = $dbConn->prepare("INSERT INTO RECIPE(RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES ('$recipeName','$desc','".$_SESSION['AuthorID']."','$prepTime','$cookTime')");
		
		$insertIntoRecipe->execute();
		
		$getRecipeID = $dbConn->lastInsertId();
		$_SESSION['RecipeID'] = $getRecipeID;
		
		uploadImage();
		
		}
	}else
		{
			print "<p>Please fill out all the blanks.</p>";
		}
}else if(isset($_POST['next'])){
	
	header('Location: addRecipe_steps.php');
}

function uploadImage(){
		//image uploader
		$target_dir = "images/recipes/";
		//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$newFileName = $target_dir .$_SESSION['RecipeID'].'.'. pathinfo($_FILES["fileToUpload"]["name"] ,PATHINFO_EXTENSION);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($newFileName,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    
	    if($check !== false) {
	        print "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        print "File is not an image.";
	        $uploadOk = 0;
	    }


		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    print "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		if($imageFileType != "jpg") {
		    print "Sorry, only JPG files are allowed.";
		    $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		    print "Sorry, your file was not uploaded.";

		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFileName)) {
		        print "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        print "<form method='post'><input type='submit' name='next' value='Next'></form>";
		    } else {
		        print "Sorry, there was an error uploading your file.";
		    }
		}
	}

	?>
	</body>
</html>