<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout</title>
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="checkoutPage.css">
	<script defer src="checkoutScript.js"></script>
</head>
<body class="gradientBody">

	<div class="regLogContainer">

		<div class="regLogForm">

			<h3>Checkout</h3>

			<form name="checkoutForm" id="checkoutForm" action="#">

			<div class="formFields">

				<div class="outerField">

					<div class="field">

						<label for="fName">First Name *</label>
						<input type="text" name="fName" id="fName" placeholder="First Name">
						<p>Error Message</p>
					</div>

					<div class="field">

						<label for="lName">Last Name *</label>
						<input type="text" name="lName" id="lName" placeholder="Last Name">
						<p>Error Message</p>
					</div>

				</div>

				<div class="field">

					<label for="email">Email *</label>
					<input type="text" name="email" id="email" placeholder="Email">
					<p>Error Message</p>
				</div>


				<div class="field">

					<label for="lName">Mailing Address *</label>
					<input type="text" name="address1" id="address1" placeholder="Address">
					<p>Error Message</p>
				</div>
				<input type="text" name="address2" id="address2" placeholder="Address 2">
			
				<div class="addressDetails">
				  	<div class="field">
					  <input type="text" name="city" id="city" placeholder="City">
					  <p>Error Message</p>
					</div>
					<div class="field">
					  <input type="text" name="state" id="state" placeholder="State">   <!-- could make dropdown to look nicer -->
					  <p>Error Message</p>
					</div>
					<div class="field">
					  <input type="text" name="zip" id="zip" placeholder="Zip Code">
					  <p>Error Message</p>
					</div>
				</div>


				<!-- payment info -->

				<div class="field">

					<label for="cardName">Name on Card *</label>
					<input type="text" name="cardName" id="cardName" placeholder="Name">
					<p>Error Message</p>

				</div>

				<div class="field">

					<label for="cardNum">Card Number *</label>
					<input type="text" name="cardNum" id="cardNum" placeholder="xxxx-xxxx-xxxx-xxxx">
					<p>Error Message</p>

				</div>

				<div class="outerField">

					<div class="field">

						<label for="expMon">Expiration Month *</label>
						<input type="text" name="expMon" id="expMon" placeholder="XX">
						<p>Error Message</p>

					</div>

					<div class="field">

						<label for="expYear">Expiration Year *</label>
						<input type="text" name="expYear" id="expYear" placeholder="XX">       <!-- make dates prettier -->
						<p>Error Message</p>

					</div>

				</div>

				<div class="field">

					<label for="cvv">CVV *</label>
					<input type="text" name="cvv" id="cvv" placeholder="XXX">
					<p>Error Message</p>

				</div>

					<div class="checkField">

						<input class="checkInput" type="checkbox" name="billAddress" id="billAddress" value="XX">      <!-- fix value -->
						<label for="billAddress">Billing address same as mailing address</label>

					</div>
					
				</div>

				<div class="field">
					<input type="submit" value="Checkout">
				</div>

				<div class="field">
					<input type="submit" value="Cancel">
				</div>

			</div>

		</form>

	</div>
		
	</div>
</body>

</html>




