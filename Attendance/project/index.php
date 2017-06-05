<!DOCTYPE html>
<html >
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
    <form id='login' action='check.php' method="POST" accept-charset='UTF-8'>
	  <select name="select" class="select">
          <option value="Student" selected>Student</option>
          <option value="Teacher">Teacher</option>
        </select>
      <input type="mail" placeholder="Email Id" name="email"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit" value="Login" class="submit"/>
    </form>
  </div>
</div>
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>

</body>
</html>
