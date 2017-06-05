<?php

session_start();

require 'database.php';

if( isset($_SESSION['email']) ){

	$records = $conn->prepare('SELECT * FROM student WHERE email = :email');
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
<?php if(!empty($user)): ?>
	<header>
		<div class="header-wrapper">
			<div class="header-title">
				<span class="section-title"><a href="student_main.php">Face Recognization(Student Portal)</a></span>
			</div>
			<div class="buttons">
				<a href="student_main.php">Home</a>
				<a href="student_profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</header>
	</br>
	<div class="block">
		<?php /*
		<div class="search-elements">
			<form action="" method="GET">
				<select class="graduation" title="Graduation" name="graduation">
					<option value="0" selected="1">Graduation</option>
					<option value="btech">B.Tech</option>
					<option value="mtech">M.Tech</option>
				</select>
				<select class="sem" title="Semester" name="sem">
					<option value="0" selected="1">Semester</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>
				<button type="submit" class="submit_button" value="search" name="search">Search</button>
			</form>
		</div>
		</br>

		<?php 
			if(isset($_POST['search']))
			{?>
				<div class="subjects">
					<span><a href="subjects/subject1.html" target="_blank">Subject1</a></span>
					<span><a href="subjects/subject2.html" target="_blank">Subject2</a></span>
					<span><a href="subjects/subject3.html" target="_blank">Subject3</a></span>
					<span><a href="subjects/subject4.html" target="_blank">Subject4</a></span>
					<span><a href="subjects/subject5.html" target="_blank">Subject5</a></span>
					<span><a href="subjects/subject6.html" target="_blank">Subject6</a></span>
				</div>
			<?php } ?>
		</br>

		<div class="error2">
			<span>Wrong Selection!</span>
		</div> */?>
		<div class="error2">
			<span>50% Attendance!</span>
		</div>
	</div>
	
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