<?php
    require('database.php');
    session_start();

	if(isset($_POST['submit'])){
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
		$encryptpass = password_hash($password, PASSWORD_DEFAULT);
		$validInput = true;

		if(empty($email)){
			echo('Email is required. Please try again.');
			$validInput = false;
		}
		if(empty($password)){
			echo('New password is required. Please try again.');
			$validInput = false;
		}
		if($password != $confirmPassword){
			echo('Passwords do not match. Please try again.');
			$validInput = false;
		}
		
		

		if($validInput){
		$statement = $db->prepare("UPDATE users SET password=? WHERE email=?");
		$statement->bind_param("ss",$encryptpass,$email);
		$statement->execute();
		echo("Password updated");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="gradientBody">

	<div class="formContainer">

		<div class="forgotPassForm">

			<h3>Reset Password</h3>

			<form action = "forgotPassword.php" method = "post">
				<p> Please enter your email and your new password.</p>
				<div class="field">
					<label for="email">Enter your email: </label>
					<input type="email" name="email" id="email" placeholder="Email" required>
					<label for="password">New Password:</label>
					<input type="text" name="password" id="password" placeholder="password" required>
					<label for="confirmPassword">Confirm Password:</label>
					<input type="text" name="confirmPassword" id="confirmPassword" placeholder="password" required>
					<input type="submit" name= "submit" value="Submit">
					<h4><a href="loginPage.php">Login</a></h4>
				</div>

			</form>
			
		</div>
		
	</div>



</body>

<style>


* {
		margin: 0;
		padding: 0;
	}

	h3 {
			/*used on homepage & reg confirmation page*/
			font-size: 30px;
			text-align: center;
		}


	body {
		background-color: black;
		font-family: "Montserrat", sans-serif;
		color: white;
	}


	.gradientBody {
		background-image: linear-gradient(to right, black , #040194);
	}


	.formContainer {
		display: inline-flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		color: black;
		width: 100%;
		height: 100%;

	}



	.forgotPassForm {
		display: inline-flex;
		flex-direction: column;
		background-color: white;
		border-radius: 10px;
		box-shadow: 5px 0px 10px #120d63, -5px -5px 10px #3a3494;
		align-items: center;
		width: 45%;
		margin-top: 40px;
		padding-top: 20px;
		padding-bottom: 60px;
		margin-bottom: 40px;

	}

	.field {
		display: inline-flex;
		flex-direction: column;
		/*align-items: flex-start;*/
		align-items: center;
		gap: 10px;
		font-size: 20px;
	}

	input {
		height: 40px;
		width: 200px;
		font-size: 15px;
	}

	input[type=submit] {
		font-size: 15px;
		width: 150px;
		/*font-family: "Montserrat", sans-serif;*/
	}


	
</style>


</html>
