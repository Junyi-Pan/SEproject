<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Choose Ticket Type</title>
	<!-- <link rel="stylesheet" href="projectStyleSheet.css"> -->
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

	<div class="ticketSelection">
		<h3>Select Tickets</h3>
		<form name="ticketTypeForm" id="ticketTypeForm">


			<div class="ticketFields">

			

				<div class="field">

					<label for="adult">Adult</label>
					<input type="number" name="adult" id="adult" placeholder="0">

				</div>

				<div class="field">

					<label for="child">Child</label>
					<input type="number" name="child" id="child" placeholder="0">

				</div>

				<div class="field">

					<label for="senior">Senior</label>
					<input type="number" name="senior" id="senior" placeholder="0">

				</div>

				<div class="field">
					<input type="submit" value="Next">
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



.ticketSelection {
	display: inline-flex;
	flex-direction: column;
	width: 100%;
	justify-content: center;
	margin-bottom: 40px;
	margin-top: 20px;


}

/*#ticketTypeForm {
	text-align: center;
}*/



.ticketFields {
	display: inline-flex;
	flex-direction: column;
	gap: 20px;
	margin-top: 30px;
	width: 100%;
	align-items: flex-start;
	justify-content: center;
}

.field {
	display: inline-flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 10px;
	font-size: 20px;
	align-self: center;
}


input[type=submit] {
		align-self: center;
		padding: 20px;
		width: 100px;
		font-size: 90px;
		margin-left: 52px;
		margin-bottom: 50px;
	}
	
</style>


</html>








