<?php

	//Check for stored user session. If found, startsession and redirect user to home page.
	session_start();
    // If cookie is set stay logged in
    if(isset($_SESSION["userID"])){
		if(isset($_COOKIE['mycookie'])) {
			header('Location: homepage.php');
		} else {
			unset($_SESSION["userID"]);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Turbo Login</title>
	<!-- <link rel="stylesheet" href="projectStyleSheet.css"> -->
  	<link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="gradientBody">

	<div class="regLogContainer">

		<div class="regLogForm">
			<?php
                if(isset($_SESSION["message"])){
                    $error = $_SESSION["message"];
                    echo "<span>$error</span>";
                }
            ?>
			<h3>Login to Turbo Theatres</h3>

			<form name="loginForm" id="loginForm" action="loginValidation.php" method="POST">

			<div class="formFields">

			

				<div class="field">

					<label for="email">Email</label>
					<input type="text" name="email" id="email" placeholder="Email" value="<?php if(isset($_COOKIE["save_email"])) { echo $_COOKIE["save_email"]; } ?>" required>

				</div>

				<div class="field">

					<label for="password">Password</label>
					<input type="text" name="password" id="password" placeholder="Password" value="<?php if(isset($_COOKIE["save_password"])) { echo $_COOKIE["save_password"]; } ?>" required>

				</div>

				<div class="checkField">
					<input class="checkInput" type="checkbox" name="rememberMe" id="rememberMe"  <?php if(isset($_COOKIE["save_email"])) { ?> checked <?php } ?> value="1">      <!-- fix value -->
					<label for="rememberMe">Remember Me</label>
				</div>

				<div class="field">
					<input type="submit" name="submit" value="Login">
				</div>

				<div class="forgot">
					<a href="forgotPassword.php">Forgot Password</a>
					<p>Don't have an account?</p>
            				<a href="registrationPage.php">Register</a>
				</div>



			</div>

		</form>

	</div>
		
	</div>

</body>
<?php
    unset($_SESSION["message"]);
?>
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


.regLogContainer {
	display: inline-flex;
	flex-direction: column;
	align-items: center;
	text-align: center;
	color: black;
	width: 100%;
	height: 100%;

}



.regLogForm {
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

.formFields {
	display: inline-flex;
	flex-direction: column;
	gap: 20px;
	margin-top: 30px;
	align-items: flex-start;

}


.field {
	display: inline-flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 10px;
	font-size: 20px;
}

.checkField {
	display: inline-flex;
	flex-direction: row;
	align-items: center;
	font-size: 18px;
}


input {
	height: 40px;
	width: 200px;
	font-size: 15px;
}

input[type=submit] {
	font-size: 20px;
	font-family: "Montserrat", sans-serif;
}

.forgot {
	display: inline-flex;
	flex-direction: column;
	width: 100%;
	align-items: center;
	gap: 10px;
	font-size: 15px;
}

a {
	color: #040194;
	text-decoration: none;
}

a:visited {
	color: #040194;
}

a:hover {
	color: #040194;
	text-decoration: underline;

}


.checkInput {
	height: 25px;
	width: 25px;
	margin-right: 10px;
}

</style>

</html>





