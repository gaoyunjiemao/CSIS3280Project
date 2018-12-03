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
			?>
			<div class="container">
				<div class="card">
					<div class="card-content card-title center">Add Recipe</div>
					<div class="card-content">
						<form action="addRecipe_name.php" method="post" id="usrform" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s12">
									<input id="recipeName" name="recipeName" type="text" class="validate">
          				<label for="recipeName">Recipe Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input id="prepTime" name="prepTime" type="text" class="validate">
          				<label for="prepTime">Prep Time</label>
								</div>
								<div class="input-field col s6">
									<input id="cookTime" name="cookTime" type="text" class="validate">
          				<label for="cookTime">Cook Time</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="desc" name="desc" type="text" class="validate materialize-textarea" form="usrform"></textarea>
          				<label for="desc">Description</label>
								</div>
							</div>
							<div class="row">
								<div class="file-field input-field">
									<div class="btn right blue">
										<span>Upload your cover image</span>
										<input type="file" name="fileToUpload" id="fileToUpload">
									</div>
									<div class="file-path-wrapper">
										<input name="uploadField" class="file-path validate" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<button class="waves-effect waves-light btn blue col s4 right" type="submit" name="submit" value="Submit"/>Submit</button>
							</div>
			<?php
			if(isset($_POST['submit'])){
			$recipeName = $_POST['recipeName'];
			$desc = $_POST['desc'];
			$prepTime = $_POST['cookTime'];
			$cookTime = $_POST['prepTime'];
			$uploadField = $_POST['uploadField'];

			if($recipeName!=null&&$desc!=null&&$prepTime!=null&&$cookTime!=null){
				if(isset($_SESSION['AuthorID'])){
				$insertIntoRecipe = $dbConn->prepare("INSERT INTO RECIPE(RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES ('$recipeName','$desc','".$_SESSION['AuthorID']."','$prepTime','$cookTime')");

				$insertIntoRecipe->execute();

				$getRecipeID = $dbConn->lastInsertId();
				$_SESSION['RecipeID'] = $getRecipeID;

				if($uploadField!=NULL){
					uploadImage();
				}
				
				
				header('Location: addRecipe_steps.php');

				}
			}else
				{
					print "<div class='red-text card-content'>Please fill out all the blanks.</div>";
				}
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
			        print "<div class='green-text card-content'>File is an image - " . $check["mime"] . ".</div>";
			        $uploadOk = 1;
			    } else {
			        print "<div class='red-text card-content'>File is not an image.</div>";
			        $uploadOk = 0;
			    }


				if ($_FILES["fileToUpload"]["size"] > 500000) {
				    print "<div class='red-text card-content>Sorry, your file is too large.</div>";
				    $uploadOk = 0;
				}

				if($imageFileType != "jpg") {
				    print "<div class='red-text card-content'>Sorry, only JPG files are allowed.</div>";
				    $uploadOk = 0;
				}

				if ($uploadOk == 0) {
				    print "<div class='red-text card-content'>Sorry, your file was not uploaded.</div>";

				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFileName)) {
				        print "<div class='green-text card-content'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</div>";
				    } else {
				        print "<div class='red-text card-content'>Sorry, there was an error uploading your file.";
				    }
				}
			}

			?>
						</form>
					</div>
				</div>
			</div>
			<?php include 'footer.php'; ?>
		</div>
		<script src="js/materialize.js"></script>
	</body>
</html>
