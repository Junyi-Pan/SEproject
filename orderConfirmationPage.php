<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Order Confirmation</title>
</head>
<body class="gradientBody">

	<div class="regLogContainer">

		<div class="regLogForm">

			<div class="confirmationDetails">

				<h3>Order Confirmed</h3>

				<h4>Enjoy your movie!</h4>

				<h4>Your order confirmation will be emailed to you</h4>


				<a href="homepage.html" class="confirmationLogin"> Home </a>

			</div>

		</div>
		
	</div>

</body>

	<style>
		* {
			margin: 0;
			padding: 0;
		}


		body {
			background-color: black;
			font-family: "Montserrat", sans-serif;
			color: white;
		}

		h3 {
			/*used on homepage & reg confirmation page*/
			font-size: 30px;
			text-align: center;
		}

		h4 {
			font-size: 20px;
			text-align: center;
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

		.confirmationDetails {
			display: inline-flex;
			flex-direction: column;
			gap: 20px;
			margin-top: 30px;
			align-items: center;

		}


		.confirmationLogin {
			font-size: 18px;
			color: white;
			text-decoration: none;
			background-color: black;
			margin-top: 10px;
			padding: 10px 75px 10px 75px;
			border-radius: 4px;
		}

	</style>
</html>
