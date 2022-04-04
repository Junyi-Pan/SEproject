<?php
    require('database.php');
    session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Turbo Register</title>
	<link rel="stylesheet" href="registration.css">
  	<link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	<link defer src="registrationScript.js"></script>
	
</head>
<body class="gradientBody">

	<div class="regLogContainer">

		<div class="regLogForm">
		
			<?php 
				if (isset($_SESSION['message'])) {
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>

			<h3>Register for Turbo Theatres</h3>

			<form name="registrationForm" id="registrationForm" action="registrationValidation.php" onsubmit="return checkInputs();" method="POST">

			<div class="formFields">

				<div class="horizontalFields">

					<div class="outerField">


						<label for="fName">First Name *</label>
							<div class="field">

								<!-- <label for="fName">First Name *</label> -->
								<input type="text" name="fName" id="fName" placeholder="First Name">

								<p>Error Message</p>

							</div>

					</div>

					<div class="outerField">

						<label for="lName">Last Name *</label>

						<div class="field">

							
							<input type="text" name="lName" id="lName" placeholder="Last Name">

							<p>Error Message</p>

						</div>

					</div>

				</div>

				<div class="outerField">

					<label for="email">Email *</label>
					<div class="field">

						<!-- <label for="email">Email *</label> -->
						<input type="text" name="email" id="email" placeholder="Email">

						<p>Error Message</p>

					</div>

				</div>

				<div class="horizontalFields">

					<div class="outerField">

						<label for="password">Password *</label>
						<div class="field">

							
							<input type="password" name="password" id="password" placeholder="Password">

							<p>Error Message</p>

						</div>

					</div>

					<div class="outerField">

						<label for="confirmPassword">Confirm Password *</label>
						<div class="field">

							<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Password">

							<p>Error Message</p>

						</div>

					</div>

				</div>


				<div class="outerField">

					<label for="mailingAddress">Mailing Address</label>

					<div class="field">
						
						<input type="text" name="mailAddress1" id="address1" placeholder="Address">

						<p>Error Message</p>

						<!-- <input type="text" name="address2" id="address2" placeholder="Address 2">
 -->
					</div>

					<input type="text" name="mailAddress2" id="address2" placeholder="Address 2">


			
					<div class="field">
						<div class="addressDetails">
							<input type="text" name="mailCity" id="city" placeholder="City">
							<p>Error Message</p>
						</div>
					</div>
					<div class="field">
						<div class="addressDetails">
							<input type="text" name="mailState" id="state" placeholder="State">   <!-- could make dropdown to look nicer -->
							<p>Error Message</p>
						</div>
					</div>
						
					<div class="field">
						<input type="text" name="mailZip" id="zip" placeholder="Zip Code"> 
						<p>Error Message</p>
					</div>

			</div>


				<!-- payment info -->

				<div class="outerField">

					<label for="cardName">Name on Card</label>

					<div class="field">

						
						<input type="text" name="cardName" id="cardName" placeholder="Name">
						<p>Error Message</p>

					</div>

				</div>


				<div class="outerField">

					<label for="cardNum">Card Number</label>

					<div class="field">
		
						<input type="text" name="cardNum" id="cardNum" placeholder="xxxx-xxxx-xxxx-xxxx">

						<p>Error Message</p>

					</div>

				</div>


				<div class="horizontalFields">


					<div class="outerField">

						<label for="expMon">Expiration Month</label>

						<div class="field">
	
							<input type="text" name="expMon" id="expMon" placeholder="XX">
							<p>Error Message</p>

						</div>

					</div>

						<div class="outerField">

							<label for="expYear">Expiration Year</label>

							<div class="field">		
								<input type="text" name="expYear" id="expYear" placeholder="XXXX">       <!-- make dates prettier -->

								<p>Error Message</p>

							</div>

						</div>



				</div>

				<div class="outerField">

					<label for="cvv">CVV</label>
					<div class="field">
						
						<input type="text" name="cvv" id="cvv" placeholder="XXX">

						<p>Error Message</p>

					</div>

				</div>


				<div class="outerField">

					<label for="billingAddress">Billing Address</label>

					<div class="field">
						
						<input type="text" name="address1" id="address1" placeholder="Address">

						<p>Error Message</p>

					</div>

					<input type="text" name="address2" id="address2" placeholder="Address 2">

			
					<div class="field">
						<div class="addressDetails">
							<input type="text" name="city" id="city" placeholder="City">
							<p>Error Message</p>
						</div>
					</div>
					<div class="field">
						<div class="addressDetails">
							<input type="text" name="state" id="state" placeholder="State">   <!-- could make dropdown to look nicer -->
							<p>Error Message</p>
						</div>
					</div>
						
					<div class="field">
						<input type="text" name="zip" id="zip" placeholder="Zip Code"> 
						<p>Error Message</p>
					</div>

				</div>

					<div class="checkField">

						<input class="checkInput" type="checkbox" name="billAddress" id="billAddress" value="1">      <!-- fix value -->
						<label for="billAddress">Billing address same as mailing address</label>

					</div>

					<div class="checkField">

						<input class="checkInput" type="checkbox" name="promotions" id="promotions" value="1">      <!-- fix value -->
						<label for="promotions">Sign up for promotions</label>

					</div>
					
				</div>

				<div class="field">
					<input type="submit" name="submit" id="submit" onclick="return checkInputs();" value="Register">
					
				</div>
				<h4>Already have an account? <a href="loginPage.php">Login</a></h4>

			</div>

		</form>

	</div>
		
	</div>
<script src="registrationScript.js"></script>
</body>


</html>


