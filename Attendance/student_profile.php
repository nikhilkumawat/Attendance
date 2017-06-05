<?php

session_start();

require 'database.php';

/*if($_GET['id'])
{
	$college_id= $_GET['id'];

	$sql =$conn -> prepare("SELECT * FROM  student WHERE  college_id ='$college_id' ");

	$sql -> execute();
	
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$user['graduation']=$row['graduation'];
		$user['branch']=$row['branch'];
		$user['semester']=$row['semester'];
		$user['image']=$row['image'];
		$user['mobile']=$row['mobile'];
		$user['name']=$row['name'];
		$user['email']=$row['email'];		

	}	
	
}
*/


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
	<header>
		<div class="header-wrapper">
			<div class="header-title">
				<span class="section-title"><a href="student_main.php">Face Recognization</a></span>
			</div>
			<div class="buttons">
				<a href="student_main.php">Home</a>
				<a href="student_profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</header>
	</br>
	<div class="box">
		<table>
			<tr>
				<td rowspan="3">
					<img src = "image/student/<?php echo $user['graduation']; ?>/<?php echo $user['branch']; ?>/<?php echo $user['semester']; ?>/<?php echo $user['image']; ?>.jpg" />
				</td>
				<td><span><?=$user['name'];?></span></td>
			</tr>
			<tr>
				<td><span><?=$user['email'];?></span></td>
			</tr>
			<tr>
				<td><span>+91 - <?=$user['mobile'];?></span></td>
			</tr>
		</table>

	</div>

	<footer class="footer-block">
		<div class="footer">
			Develop by Team.
		</div>
	</footer>
</body>
</html>