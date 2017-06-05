<?php

session_start();

if (isset($_POST['select']))
{
	echo $_POST['select'];
	$type= $_POST['select'];
	header("Location:".$type."_main.php");
}

if(isset($_SESSION['email']))
{
	$type= $_POST['select'];
	header("Location:".$type."_main.php");
}

require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):
	$records = $conn->prepare("SELECT * FROM ".$type." WHERE email = :email");
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';
	
	if(count($results) > 0 && ($_POST['password'] == $results['password']) )
	{
		$_SESSION['email'] = $results['email'];
		header("Location:".$type."_main.php");
	} 
	else 
	{
		$message = 'Sorry, those credentials do not match';
	}
	
endif;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Face Recognization</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>

<body>
<div class="pen-title">
  <h1>Login Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="form">
    <h2>Login to your account</h2>
    <form id='login' action='index.php' method="POST" accept-charset='UTF-8'>
	  <select name="select" class="select">
          <option value="student" selected>Student</option>
          <option value="teacher">Teacher</option>
        </select>
      <input type="mail" placeholder="Email Id" name="email"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit"  class="submit" name='submit'/>
    </form>
  </div>
</div>
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>

</body>
</html>
