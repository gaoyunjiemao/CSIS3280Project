<!DOCTYPE html>
<html>
<?php
//CSIS3280-Asg3 
//Student: Hsueh-Cheng Liu 
//StudentID: 300280496

		//include connection script
		require "gcstaskskillmatchdb_connect.php";
?>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			body{background-color: #37c8b9;}
			table{background-color: #8cfb04;}
		</style>
	</head>
	<body>
		<h1 align="center" >GCS Online Project Task-Employee Skill Matching System</h1>		
		<form>		
		<h2 align="center">Online Project Task-Employee Skill Matching System</h2>		
		<center>
			<select name="ProjectTask">
				<option value="">Select a Project Task</option>
				<?php
				$selectionOption = $dbConn->prepare("SELECT TaskName FROM task");
				$selectionOption->execute();
				foreach($selectionOption as $selection){
					echo '<option value="'.$selection['TaskName'].'">'.$selection['TaskName'].'</option>';
				}
				?>				
			</select>
		</center>			
		<br/>
		<br/>				
		<center><input type="submit" name="submit" value="Get Machting Employee"></center>
		
		<?php		
		//function get name
		function Get_EmpName($projectOption){
			global $dbConn;

			//query statement
			$employeeName = "SELECT EmployeeName FROM employee WHERE EmployeeID IN ( SELECT EmployeeID FROM empskill WHERE SkillID IN ( SELECT SkillID FROM taskskill WHERE TaskID IN ( SELECT TaskID FROM task WHERE TaskName = '$projectOption')))";

			//Use PDO try catch to run Query
			try{
			//prepare query statement
				$EmpName=$dbConn->prepare($employeeName);
	
				//execute query	
				$EmpName->execute();
	
				//fetcch query results
				$results=$EmpName->fetchall(PDO::FETCH_ASSOC);
	
				//release db connector Cursor
				$EmpName -> CloseCursor();
		
				//return result
				return $results;
			}
			catch(PDOException $ex){
				//get error Message
				$ex -> getMessage();
			}
		}
		
		//function get skill
		function Get_EmpSkill($projectOption){
			global $dbConn;

			//query statement
			$employeeSkill = "SELECT SkillName FROM skill WHERE SkillID IN ( SELECT SkillID FROM taskskill WHERE TaskID IN ( SELECT TaskID FROM task WHERE TaskName = '$projectOption'))";

			//Use PDO try catch to run Query
			try{
			//prepare query statement
				$EmpSkill=$dbConn->prepare($employeeSkill);
	
				//execute query	
				$EmpSkill->execute();
	
				//fetcch query results
				$results=$EmpSkill->fetchall(PDO::FETCH_ASSOC);
	
				//release db connector Cursor
				$EmpSkill -> CloseCursor();
		
				//return result
				return $results;
			}
			catch(PDOException $ex){
				//get error Message
				$ex -> getMessage();
			}
		}

		//extract user voted options
		if(isset($_GET['submit'])){
			try{	
				$projectOption = $_GET['ProjectTask'];
						
				//call function
				$empNameResult = Get_EmpName($projectOption);
				$empSkillResult = Get_EmpSkill($projectOption);

				//check
				print"<pre>";
				$countName = count($empNameResult);
				$countSkill = count($empSkillResult);
				
				print "<center><table border=1><tr>
						<th>Selected Project Task</th>
						<th>Require Skills</th>
						<th>Matching Employees</th></tr>
						<tr><td>".$projectOption."</td><td>";
						
				for($x=0;$x<$countSkill;$x++){
					echo $empSkillResult[$x]['SkillName'];
    				echo "<br>";									
				}
				
				print "</td><td>";
							
				for($x=0;$x<$countName;$x++){
					echo $empNameResult[$x]['EmployeeName'];
    				echo "<br>";									
				}
				print "</td></tr></table></center>";
			}
			catch (PDOException $ex){	
				//report error if connected failed
				print "</br> Query execution failed";
				//print $ex.getMessage();
			}
		}	


		?>
		</form>		
	</body>
</html>