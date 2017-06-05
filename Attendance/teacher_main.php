<?php

session_start();

require 'database.php';

if( isset($_SESSION['email']) ){

	$records = $conn->prepare('SELECT * FROM teacher WHERE email = :email');
	$records->bindParam(':email', $_SESSION['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Face Recognization</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>
<body>
<?php if(!empty($user)):?>
	<header>
		<div class="header-wrapper">
			<div class="header-title">
				<span class="section-title"><a href="teacher_main.php">Face Recognization <?=$user['name'];?></a></span>
			</div>
			<div class="buttons">
				<a href="teacher_main.php">Home</a>
				<a href="teacher_profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</header>
	</br>
	<div class="block">
		<div class="search-elements">
			<form action="teacher_main.php" method="GET">
				<select class="graduation" title="Graduation" name="graduation">
					<option value="0" selected="1">Graduation</option>
					<option value="btech">B.Tech</option>
					<option value="mtech">M.Tech</option>
				</select>
				<select class="sem" title="Semester" name="semester">
					<option value="0" selected>Semester</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>
				<select class="branch" title="Branch" name="branch">
					<option value="0" selected="1">Branch</option>
					<option value="me">Mechanical Engineering</option>
					<option value="cse">Computer Science</option>
					<option value="ce">Civil Engineering</option>
					<option value="eic">Electronics &amp; Instrumentation Control</option>
					<option value="ee">Electrical Engineering</option>
					<option value="ece">Electronics &amp; Communication</option>
					<option value="it">Information Technology</option>
				</select>
				<input type="submit" class="submit_button" value="search" name="submit1">
			</form>
		</div>
		</br>
		
		<div class="data">
			<table class="stu-data">
				<?php
				if(!empty($_GET['submit1']))
				{
					$graduation = $_GET['graduation'];
					$semester = $_GET['semester'];
					$branch = $_GET['branch'];	
					
					$sql = $conn->prepare("SELECT distinct(s.college_id),s.name from student s, teacher t where s.branch=t.branch and s.semester=t.semester and s.graduation=t.graduation and s.semester = ".$semester." and s.branch = '".$branch."' and s.graduation = '".$graduation."' order by s.college_id ASC" );
					$sql -> execute();
					?>
					<?php
					if($sql -> rowCount() != 0)
					{
						?>
						<tr>
						<th>Sn</th>
						<th>College Id</th>
						<th>Name</th>
						<th>Attendance %</th>
						<th>Profile</th>
						</tr>
						<?php
						$i = 0;
						while($row = $sql->fetch(PDO::FETCH_ASSOC))
						{
							echo "<tr>";
							//echo "<td>".$row["id"].".</td>";
							$i++;
							echo "<td>$i.</td>";
							echo "<td>".$row["college_id"]."</td>";
							echo "<td>".$row["name"]."</td>";
							echo "<td>50</td>";
							echo "<td><a href='teacher_search_profile.php?id=".$row['college_id']. "' ' target='_blank'	>Profile</a></td>";
							//echo "<td><a href='mail.php?id=".$row['college_id']. "' ' target='_blank'>Mail</a></td>";
							echo "</tr>";
						}	
					}
					else{?>
						<div class="error1">
							<span>Wrong Selection!</span>
						</div>
			<?php	}
				
				}
				?>
			</table>
		</div>
	</div>
	</br>
	
	</br>
	<footer class="footer-block">
		<div>
			Develop by Team.
		</div>
	</footer>
<?php else:
	header("Location: index.php");
?>
<?php endif; ?>
</body>
</html>