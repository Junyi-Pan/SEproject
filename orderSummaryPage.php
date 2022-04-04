<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Order Summary</title>
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body>


	<div class="navBar">
	  <div class="leftSideNav">
	    <h1>Turbo <br> Theatres</h1>
	    <a href="bookMovie.html" class="navBookMovie">Get Tickets</a>
	  </div>

	  
	  
	    <!-- <a href="" class="homeButton">Turbo Theatres</a> -->
	    <!-- Right-sided navbar links. Hide them on small screens -->
	    <div class="rightSideNav">
	      <input type="text" placeholder="Search..">
	      <a href="" class="loginButton">Log In |</a>
	      <a href="" class="signUpButton">Sign Up</a>
	    </div>
	  </div>
	</div>


	<div class="ticketMovieInfo">
	    <img class="bookMovieImg" src="movie6.jpg">
	    <div class="bookDetails">
	    	<p class="bookMovieTitle">Fallout</p>
	        <p>PG-13 | Action | 130 mins</p>
	        <p>Tuesday February 22</p>
	        <p>At 7:15 PM</p>
	    </div>
	</div>

	<div class="orderSummary">

		<div class="orderDetails">

			<h2>Order Summary</h2>

			<div class="ticketDetails">

				<div class="ticket">
					<div>
						<h3>Adult Ticket x2</h3> 
						<input type="submit" value="Delete Ticket">
					</div>
					<h4>$25.00</h4>
				</div>

				<div class="ticket">
					<div>
						<h3>Child Ticket x1</h3>
						<input type="submit" value="Delete Ticket">
					</div>
					<h4>$8.00</h4>
				</div>

			</div>

			<div class="totalCalculation">
				<!-- <h2>Subtotal</h2> -->

				<div class="subtotals">
					<h3>Subtotal</h3>
					<h4>$33.00</h4>
				</div>

				<div class="subtotals">
					<h3>Tax</h3>
					<h4>$5.50</h4>
				</div>

				<div class="subtotals">
					<h3>Promos</h3>
					<h4>$0.00</h4>
				</div>

				<div class="total">

					<h2>Total</h2>
					<h2>$38.50</h2>

				</div>

			</div>

			<label>Promo Code</label>
			<form>
				<div class="addPromo">
					<!-- <label>Promo Code</label> -->
					<input type="text" name="promoCode" placeholder="Promo Code">
					<input type="submit" name="submitPromo" value="Add Promo">
				</div>
			<!-- </form> -->

			

		</div>

		<div class="updateOrder">
			<input type="submit" value="Update Order">
		</div>

		<div class="submitOrder">
			<input type="submit" value="Cancel Order">
			<input type="submit" value="Confirm Order">
		</div>

		</form>

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


h1 {
	/*used on homepage*/
	font-style: italic;
}

h3 {
	/*used on homepage & reg confirmation page*/
	font-size: 30px;
	text-align: center;
	}


.navBar {
  /*padding: 20px 10px;*/
  display: inline-flex;
  flex-direction: row;
  width: 100%;
  justify-content: space-between;
  /*background: #08014a;*/

  background-image: linear-gradient(to right, black , #040194);

  /*background: #040194;*/
  color: white;
  align-items: center;
  padding-bottom: 5px;

  /*box-shadow: 0px 5px black;*/
}

.leftSideNav {
	padding-left: 90px;
	display: inline-flex;
  flex-direction: row;
  align-items: center;
}

.navBookMovie {
	text-decoration: none;
	color: white;
	margin-left: 50px;
}

.rightSideNav {
	padding-right: 20px;
	display: inline-flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
}

.rightSideNav input[type=text] {
	float: right;
 	padding: 4px 4px 4px 15px;
 	border: none;
 	margin-right: 50px;
	font-family: "Montserrat", sans-serif; 
	border-radius: 4px;
	/*background-color: #3f34d1;*/
	background-color: #292791;
	color: white;


}

input {
	height: 40px;
	width: 200px;
	font-size: 15px;
}


.loginButton {
	float: right;
	text-decoration: none;
	color: white;

}

.loginButton:visited {
	color: white;
	text-decoration: none;
}


.signUpButton {
	float: right;
	text-decoration: none;
	color: white;
	margin-right: 10px;

}

.signUpButton:visited {
	color: white;
	text-decoration: none;
}




.ticketMovieInfo {
	display: inline-flex;
	flex-direction: row;
	gap: 30px;
	justify-content: center;
	width: 100%;
	background-color: white;
	color: black;
	padding: 30px 0px 30px 0px;

}


.bookMovieImg {
	width: 150px;
	height: auto;
}

.bookDetails {
	display: inline-flex;
	flex-direction: column;
	gap: 20px;
}

.bookMovieTitle {
	font-size: 30px;
}

.orderSummary {
	display: inline-flex;
	flex-direction: column;
	align-items: center;
	/*background-color: pink;*/
	width: 100%;
}


.orderDetails {
	display: inline-flex;
	flex-direction: column;
	width: 40%;
	justify-content: center;
	/*background-color: pink;*/
	margin-top: 20px;

}

h2 {
	font-size: 25px;
	align-self: center;
	margin-bottom: 10px;
}

h3  {
	font-size: 18px;
}

h4 {
	font-size: 15px;
	font-style: italic;
}


.ticketDetails {
	display: inline-flex;
	flex-direction: column;
	width: 100%;
	justify-content: center;
	border-width: 0px 0px 1px 0px;
	border-color: white;
	border-style: solid;
	padding-bottom: 15px;
	gap: 10px;
}

.ticket {
	display: inline-flex;
	width: 100%;
	flex-direction: row;
	justify-content: space-between;
	/*padding-left: 40px;
	padding-right: 90px;*/
}

.totalCalculation {
	display: inline-flex;
	flex-direction: column;
	width: 100%;
	justify-content: center;

}

.subtotals {
	display: inline-flex;
	width: 100%;
	flex-direction: row;
	justify-content: space-between;
	margin-top: 15px;
}

.total {
	display: inline-flex;
	width: 100%;
	flex-direction: row;
	margin-top: 30px;
	justify-content: space-between;
}

label {
	font-size: 18px;
	margin-top: 20px;
	margin-bottom: 10px;
}

.addPromo {
	display: inline-flex;
	flex-direction: row;
	gap: 95px;
	/*justify-content: space-between;*/
	margin-bottom: 30px;
}

.submitOrder {
	padding-bottom: 40px;
	padding-top: 20px;
}

input[type=submit] {
	padding: 50px;
	font-size: 80px;
}


</style>


</html>
















