<?php 
require_once('phpmailer/class.phpmailer.php');

?>
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
	<title>Mail</title>
	<link rel="stylesheet" type="text/css" href="css/mail_style.css" media="all" />
	
</head>
<body>
	<div class="header">Mail Form</div>
	<?php 
		if($_GET['id'])
	{
		$college_id= $_GET['id'];
		
		$sql =$conn -> prepare("SELECT * FROM  student WHERE  college_id ='$college_id' limit 1");

		$sql -> execute();
		
		$row = $sql->fetch();
		$user['name']=$row['name'];
		$user['email']=$row['email'];		
	?>
	<form method="POST" action="#">
		<table class="table_element" width="400" border="0" cellpadding="2" cellspacing="0">
			<tr>
				<td>Name:-</td>
				<td><?php echo $user['name'] ?></td>
			</tr>
			<tr>
				<td>Email:-</td>
				<td><?php echo $user['email'] ?></td>
			</tr>
			<tr>
				<td>Subject:-</td>
				<td><input type="text" name="subject" class="input" placeholder="Subject" /></td>
			</tr>
			<tr>
				<td>Message:-</td>
				<td><textarea name="msg" rows="5" cols="40" placeholder="Enter Your Message..."></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Send it!" /></td>
			</tr>
		</table>
	</form>
	<?php 
		if(!empty($_POST['submit']))
		{
			$to = $user['email'];
			$subject = $_POST['subject'];
			$message = $_POST['msg'];
			
			/*$headers = array(
				'From' => "gecafacerecog@gmail.com",
				'To' => $to,
				'Subject' => $subject
			);
			$smtp = Mail::factory('smtp', array(
					'host' => 'ssl://smtp.gmail.com',
					'port' => '465',
					'auth' => true,
					'username' => 'gecafacerecog@gmail.com',
					'password' => 'aaadni@!1213'
				));

			$mail = $smtp->send($to, $headers, $body);

			if (PEAR::isError($mail)) {
				echo('<p>' . $mail->getMessage() . '</p>');
			} else {
				echo('<p>Message successfully sent!</p>');
			}*/
			
			
			//$headers = 'From: $_SESSION["email"]' . "\r\n" . 'Reply-To: $_SESSION["email"]' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			
			//mail($to, $subject, $message, $headers);
			/*$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "gecafacerecog@gmail.com";
			$mail->Password = "aaadni@!1213";
			$mail->SetFrom("gecafacerecog@gmail.com");
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to);

			 if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			 } else {
				echo "Message has been sent";
			 }*/
		}
	}?>
</body>
</html>