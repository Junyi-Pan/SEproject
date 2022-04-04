<?php
    require('database.php');
    session_start();


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

		<h3 style="color:white">Reset your password</h3>

		<div class="forgotPassForm">
			<form action = "@{/forgotPassword}" method = "post">
				<input type="hidden" name="token" th:value"${token}" />
				<div class="field">
					<label for="password">Enter your new password: </label>
					<input type="password" name="Password" id="password" placeholder="New password" required>
					<input type="password" name="Confirm Password" id="confirmPassword" placeholder="Confirm password" required>
					<input type="submit" value="Submit">
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