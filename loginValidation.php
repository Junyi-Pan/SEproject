<?php
    require('database.php');
    session_start();


	if(isset($_POST['submit'])){
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$time = time() + (60*60*24*10);
		$validInput = true;
    	$message = "Login error:";

		//check if any field is empty, and set feedback message if form is missing a field
		$message = "";
		if(empty($email)){
			$message.= 'Email is required. Please try again. ';
			$validInput = false;
		}
		if(empty($password)){
			$message.= 'Username is required. Please try again. ';
			$validInput = false;
		} 

		
		if($validInput){
			$userCheck = $db->prepare("SELECT password FROM users WHERE email = '$email'");
				$userCheck->execute();
				$result = $userCheck->get_result();
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					foreach ($row as $r) {
					$pw = $r;
					}
				}
			$verify = password_verify($password, $pw);
			if ($verify) {
				$userCheck = $db->prepare("SELECT state FROM users WHERE email = '$email'");
				$userCheck->execute();
				$result = $userCheck->get_result();
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					foreach ($row as $r) {
					$state = $r;
					}
				}
				// active account
				if($state == 1) {
					$userCheck = $db->prepare("SELECT userID FROM users WHERE email = '$email'");
					$userCheck->execute();
					$result = $userCheck->get_result();
					while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
						foreach ($row as $r) {
						$userID = $r;
						}
					}
					//START SESSION FOR USER WITH GIVEN USERID
					if (isset($_SESSION['userID'])) {
						unset($_SESSION['userID']);
					}
					$_SESSION['userID'] = $userID;

					// check if account is admin
					$userCheck = $db->prepare("SELECT isAdmin FROM users WHERE email = '$email'");
					$userCheck->execute();
					$result = $userCheck->get_result();
					while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
						foreach ($row as $r) {
						$admin = $r;
						}
					}
					if ($admin == 1) {
						if (isset($_SESSION['admin'])) {
							unset($_SESSION['admin']);
						}
						$_SESSION['admin'] = $admin;
					}

					//remember me cookie
					$time = time() + (60*60*24*10);
					if(isset($_POST['rememberMe'])){
						setcookie('mycookie', TRUE, time() + 3600);
						setcookie("save_email", $email, $time, "/");
						setcookie("save_password", $password, $time, "/");
					} else {
						if (isset($_COOKIE['mycookie'])) {
							unset($_COOKIE['mycookie']);
							setcookie('mycookie', '', time() - 3600, '/'); // empty value and old timestamp
						}
						if (isset($_COOKIE['save_email'])) {
							unset($_COOKIE['save_email']);
							setcookie('save_email', '', time() - 3600, '/'); // empty value and old timestamp
						}
						if (isset($_COOKIE['save_password'])) {
							unset($_COOKIE['save_password']);
							setcookie('save_password', '', time() - 3600, '/'); // empty value and old timestamp
						}
					}
					header('location: homepage.php');
				// inactive account
				} else if ($state == 0) {
					$_SESSION['message'] = "Account not activated, please activate your account here: <a href=activate.php>activate</a>.";
					header('location: loginPage.php');
				// suspended account	
				} else if ($state == 2) {
					$_SESSION['message'] = "Account suspended, please contact customer service if you think this is a mistake.";
					header('location: loginPage.php');
				}

			}else{
				$_SESSION['message'] = "Invalid login, please retry.";
				header('location: loginPage.php');
			}
		}
	}

	//If login was complete/valid, user will have been redirected to homepage. Else, the login page below will load, this time with a feedback message detailing their issue.
?>

<!-- <!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Turbo Login</title> -->
	<!-- <link rel="stylesheet" href="projectStyleSheet.css"> -->
  	<!-- <link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="gradientBody">

	<div class="regLogContainer">

		<div class="regLogForm">
			<h2><?php echo $message;?></h2>
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
					<input class="checkInput" type="checkbox" name="rememberMe" id="rememberMe" <?php if(isset($_COOKIE["save_email"])) { ?> checked <?php } ?> value="1">     --> <!-- fix value -->
					<!-- <label for="rememberMe">Remember Me</label>
				</div>

				<div class="field">
					<input type="submit" name="submit" value="Login">
				</div>

				<div class="forgot">
					<a href="forgotPassword.html">Forgot Password</a>
					<p>Don't have an account?</p>
            				<a href="registrationPage.php">Register</a>
				</div>



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

</html> -->





