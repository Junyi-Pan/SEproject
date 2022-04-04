<?php
	require('database.php');

	if(isset($_POST['submit'])){
		$email = htmlspecialchars($_POST['email']);
		$validInput = true;
		if(empty($email)){
			echo('Email is required. Please try again.');
			$validInput = false;
		}
		if($validInput){
			$userCheck = $db->prepare("SELECT state FROM users WHERE email = '$email'");
				$userCheck->execute();
				$result = $userCheck->get_result();
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					foreach ($row as $r) {
					$state = $r;
					}
				}
			if($state == 1){
				echo('Account is already activated, please log in');
			}else if($state == 2){
				echo('Account suspended, please contact customer service if you think this is a mistake.');
			}else if($state == 0){
			$one = "1";
			$statement = $db->prepare("UPDATE users SET state=? WHERE email=?");
			$statement->bind_param("is",$one,$email);
			$statement->execute();
			echo("Account activated");
			}
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
			<h3>Activate your account</h3>

			<form name="loginForm" id="loginForm" action="activate.php" method="POST">

			<div class="formFields">
				<div class="field">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" placeholder="Email" required>
				</div>
				<div class="field">
					<input type="submit" name="submit" value="Activate">
					<h4>Account already activated? <a href="loginPage.php">Login</a></h4>
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

</html>





