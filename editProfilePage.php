<?php
    require('database.php');
    session_start();
	if(isset($_SESSION['admin'])){
    $isAdmin = $_SESSION['admin'];
	}
    if(isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    } else {
    header("location: loginPage.php");
    }
    $message = "";
    $numCards = 0;

	$userCheck = $db->prepare("SELECT subscribed FROM users WHERE userID = '$userID'");
	$userCheck->execute();
	$result = $userCheck->get_result();
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
		foreach ($row as $r) {
			$promotions = $r;
		}
	}

	if(isset($_POST['promoSubmit'])){
		if(isset($_POST['promotions'])){
			$promotions = 1;
			$message = "Promotions enabled.";
		}else{
			$promotions = 0;
			$message = "Promotions disabled.";
		}
		$statement = $db->prepare("UPDATE users SET subscribed=? WHERE userID=?");
				$statement->bind_param("si",$promotions,$userID);
				$statement->execute();
	}

	if(isset($_POST['passwordSubmit'])){
		$oldPassword = htmlspecialchars($_POST['oldPassword']);
		$newPassword = htmlspecialchars($_POST['newPassword']);
		$validInput = true;
		if(empty($newPassword)){
			$message.= 'New password is required. Please try again. ';
			$validInput = false;
		}
		if(empty($oldPassword)){
			$message.= 'Current password is required. Please try again. ';
			$validInput = false;
		}

		if($validInput){
			$userCheck = $db->prepare("SELECT password FROM users WHERE userID = '$userID'");
				$userCheck->execute();
				$result = $userCheck->get_result();
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					foreach ($row as $r) {
					$pw = $r;
					}
				}
			$verify = password_verify($oldPassword, $pw);
			//$encryptedOldPassword = password_hash($oldPassword, PASSWORD_DEFAULT);
	
			if($verify){//?!?!?!??!
				$null = 0;
				$zero = 0;
				$encryptedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
				$statement = $db->prepare("UPDATE users SET password=? WHERE userID=?");
				$statement->bind_param("si",$encryptedNewPassword,$userID);
				$statement->execute();
				$message = "Password updated";
			}
		}

	}

	if(isset($_POST['mailAddressSubmit'])){
		$state = htmlspecialchars($_POST['state']);
		$city = htmlspecialchars($_POST['city']);
		$mailAddress1 = htmlspecialchars($_POST['mailAddress1']);
		$address2 = htmlspecialchars($_POST['mailAddress2']);
		$zip = htmlspecialchars($_POST['zip']);
		$validInput = true;
		if(empty($mailAddress1)){
			$message.= 'New address is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($city)){
			$message.= 'City is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($state)){
			$message.= 'State is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($zip)){
			$message.= 'Zip code is required. Please try again. ';
			$validInput = false;
		} 
		if($validInput){
			$null = 0;
			$zero = 0;
			$statement = $db->prepare("DELETE FROM `addresses` WHERE userID=?");
			$statement->bind_param("i",$userID);
			$statement->execute();
			$statement = $db->prepare("INSERT INTO addresses VALUES (?,?,?,?,?,?,?)");
			$statement->bind_param("issssii",$null,$mailAddress1,$address2,$city,$state,$zip,$userID);//null is passed as userID so it is auto incremented, state and isAdmin are initialized to 0.
			$statement->execute();
			$message = "Mailing address updated";
		}
	}



	if(isset($_POST['cardSubmit'])){
		$fName = htmlspecialchars($_POST['fName']);
		$lName = htmlspecialchars($_POST['lName']);
		$cvv = htmlspecialchars($_POST['cvv']);
		$expMonth = htmlspecialchars($_POST['expMon']);
		$expYear = htmlspecialchars($_POST['expYear']);
		$cardNum = htmlspecialchars($_POST['cardNum']);
		$validInput = true;
		$state = htmlspecialchars($_POST['state']);
		$city = htmlspecialchars($_POST['city']);
		$billAddress1 = htmlspecialchars($_POST['billAddress1']);
		$billAddress2 = htmlspecialchars($_POST['billAddress2']);
		$zip = htmlspecialchars($_POST['zip']);
		$validInput = true;
		if(empty($billAddress1)){
			$message.= 'New address is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($city)){
			$message.= 'City is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($state)){
			$message.= 'State is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($zip)){
			$message.= 'Zip code is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($cvv)){
			$message.= 'Card CVV is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($expMonth)){
			$message.= 'Expiration month is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($expYear)){
			$message.= 'Expiration year is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($cardNum)){
			$message.= 'Card number is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($fName)){
			$message.= 'Card name is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($lName)){
			$message.= 'Card name is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($billAddress2)){
			$billAddress2 = " ";
		} 
		$ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$encryption_iv = '1234567891011121';
		$userCheck = $db->prepare("SELECT cardEncryptionKey FROM securityKeys");
		$userCheck->execute();
		$result = $userCheck->get_result();
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
			foreach ($row as $r) {
				$encryption_key = $r;
			}
		}
		//echo $encryption_key;
		$encryptionCard = openssl_encrypt($cardNum, $ciphering, $encryption_key, $options, $encryption_iv);
		//echo $encryptionCard;
		$encryptionCvv = openssl_encrypt($cvv, $ciphering, $encryption_key, $options, $encryption_iv);
		if($validInput){
			$null = 0;
			$zero = 0;
			$statement = $db->prepare("INSERT INTO paymentinfo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$statement->bind_param("isssssssssiii",$null,$encryptionCard,$billAddress1, $billAddress2,$city,$zip,$state,$fName,$lName,$expMonth,$expYear,$encryptionCvv,$userID);//null is passed as id
			$statement->execute();
			$message = "Card added";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Profile</title>
</head>
<body>


	<div class="navBar">
	  <div class="leftSideNav">
	    <h1>Turbo <br> Theatres</h1>
	    <a href="homepage.php" class="navBookMovie">Home</a>
	    <a href="bookMoviePage.php" class="navBookMovie">Get Tickets</a>
	  </div>

	  
	    <div class="rightSideNav">
	      <input type="text" placeholder="Search..">
	      <a href="signout.php" class="logoutButton">Log Out</a>
	    </div>
	  </div>
	</div>
	

	<div class="editProfile">

		<div> 


			<h4><?php 
								$userCheck = $db->prepare("SELECT firstName FROM users WHERE userID = '$userID'");
								$userCheck->execute();
								$result = $userCheck->get_result();
								while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
									foreach ($row as $r) {
										$fname = $r;
									}
								}
								echo $fname;

								echo " ";

								$userCheck = $db->prepare("SELECT lastName FROM users WHERE userID = '$userID'");
								$userCheck->execute();
								$result = $userCheck->get_result();
								while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
									foreach ($row as $r) {
										$lname = $r;
									}
								}
								echo $lname;
							?></h4>
							<h3><?php echo $message;?></h3><!--Prints feedback-->

			<div class="fullForm">

				<div>

			<div class="editProfileForm">

				<form class="field" action="editProfilePage.php" method = "POST">
						<h2>Email: </h2>
							<h3><?php 
								$userCheck = $db->prepare("SELECT email FROM users WHERE userID = '$userID'");
								$userCheck->execute();
								$result = $userCheck->get_result();
								while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
									foreach ($row as $r) {
										$email = $r;
									}
								}
								echo $email;
							?></h3>

							<div class="checkField">

								<input class="checkInput" type="checkbox" name="promotions" id="promotions" <?php if($promotions==1) { ?> checked <?php } ?> value="1">      <!-- fix value -->
								<label for="promotions">Recieve promotions</label>

							</div>

							<input type="submit" name="promoSubmit" value="Submit">

					</form>


					<form class="field" action="editProfilePage.php" method = "POST">
						<h2>Password: </h2>
							<label for="oldPassword">Old Password:</label>
							<input type="text" name="oldPassword" id="oldPassword" placeholder="Old Password">
							<label for="newPassword">New Password:</label>
							<input type="text" name="newPassword" id="newPassword" placeholder="New Password">

							<input type="submit" name="passwordSubmit" value="Submit">
					</form>


					<form class="field" action="editProfilePage.php" method="POST">
						<h2>Mailing Address: </h2>
							<h3><?php 
							  $address = "";
								$userCheck = $db->prepare("SELECT address1 FROM addresses WHERE userID = '$userID'");
								$userCheck->execute();
								$result = $userCheck->get_result();
								while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
									foreach ($row as $r) {
										$address = $r;
									}
								}
								echo $address;
							?></h3>
							<label for="mailAddress1">New Mailing Address:</label>
							<input type="text" name="mailAddress1" id="mailAddress1" placeholder="Address">

							<input type="text" name="mailAddress2" id="mailAddress2" placeholder="Address 2">

							<div class="addressDetails">
								<input type="text" name="city" id="city" placeholder="City">
								<input type="text" name="state" id="state" placeholder="State">   <!-- could make dropdown to look nicer -->
								
							</div>

								<input type="text" name="zip" id="zip" placeholder="Zip Code"> 

								<input type="submit" name="mailAddressSubmit" value="Submit">
						
					</form>
						<?php
						if(isset($_SESSION['admin'])){
						
						}else{

					
						echo "<br><h2>Current cards: </h2>";
							// Store the decryption key
									  $userCheck2 = $db->prepare("SELECT cardEncryptionKey FROM securityKeys");
									  $userCheck2->execute();
									  $result2 = $userCheck2->get_result();
									  while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
										  foreach ($row as $r) {
											  $decryption_key = $r;
										  }
									  }
									  $cardCheck = $db->prepare("SELECT paymentMethodID, cardNumber, streetAddress, streetAddress2, city, zipCode, state, expMonth, expYear FROM paymentInfo WHERE ownerID = '$userID'");
									  $cardCheck->execute();
									  $cardCheck->bind_result($paymentMethodID,$cardNumber,$streetAddress,$streetAddress2,$city,$zipCode,$state,$expMonth,$expYear);
									  //$result = $cardCheck->get_result();
									  while($cardCheck->fetch()){
											  echo '<br><h3>Card address: </h3><br>';
											  echo '<h2>' . $streetAddress .'<br></h2>';
											  echo '<h2>' . $streetAddress2 .'<br></h2>';
											  echo '<h2>' . $city .', '. $state.'<br></h2><br>';
											  echo '<h2>' . $zipCode.'<br></h2>';
											  echo '<br>';
											  
											  $ciphering = "AES-128-CTR";
											  $iv_length = openssl_cipher_iv_length($ciphering);
											  $options = 0;
											  $decryption_iv = '1234567891011121';
											  
												//$decryption_key="sup3rs3cr3tk3y";
												// Use openssl_decrypt() function to decrypt the data
											  $decryption=openssl_decrypt ($cardNumber, $ciphering, $decryption_key, $options, $decryption_iv);
											  echo '<h3>Card Number:</h3><br>';
											  echo '<h2>************'.substr($decryption,-4).'<br>';//displays last 4 digits of card
											  echo 'Expires: ' . $expMonth . '/' . $expYear . '</h2><br>';
		  
											  $numCards = $numCards+1;
		  
		  
											  echo '<form class="field" action="deleteCard.php" method = "POST">
											  <input type = "hidden" name = "paymentMethodID" value = '.
											   $paymentMethodID .'">
											   <input type="submit" name="submit" value="Delete card">
											  </form>';
							}
							/*
							while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
								foreach ($row as $r) {

									if ($stmt = $mysqli->prepare($query)) {
*/
    /* execute statement */
    //$stmt->execute();

    /* bind result variables */
    //$stmt->bind_result($name, $code);

    /* fetch values */
    //while ($stmt->fetch()) {
        //printf ("%s (%s)\n", $name, $code);
    //}

    /* close statement */
    //$stmt->close();
								
    					

		if($numCards < 3){echo '<br>
					<form class="field" action="editProfilePage.php" method="POST">
						<h2>Add Card: </h2>
							<label for="billAddress1">New Billing Address</label>
							<input type="text" name="billAddress1" id="billAddress1" placeholder="Address">

							<input type="text" name="billAddress2" id="billAddress2" placeholder="Address 2">

							<div class="addressDetails">
								<input type="text" name="city" id="city" placeholder="City">
								<input type="text" name="state" id="state" placeholder="State">   <!-- could make dropdown to look nicer -->
								
							</div>

						<input type="text" name="zip" id="zip" placeholder="Zip Code">
							<label for="fName">Name on Card</label>
							<input type="text" name="fName" id="fName" placeholder="First Name">
							<label for="lName">Name on Card</label>
							<input type="text" name="lName" id="lName" placeholder="Last Name">
							<label for="cardNum">Card Number</label>
							<input type="text" name="cardNum" id="cardNum" placeholder="xxxx-xxxx-xxxx-xxxx">
							<label for="expMon">Expiration Date</label>
							<div class="cardExp">
								<input type="number" name="expMon" id="expMon" min="1" max="12" placeholder="MM">
								<input type="number" name="expYear" id="expYear" min="2022" placeholder="YYYY">
							</div>

							<label for="cvv">CVV</label>
							<input type="text" name="cvv" id="cvv" placeholder="XXX">

							<input type="submit" name="cardSubmit" value="Submit">

					</form>';}
					}
					?>

			</div>

			</div>





			<!-- <input type="submit" value="Update"> -->
			</div>

				
		</div>

	</div>





</body>

<style >


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
	font-style: italic;
}

h2 {
	/*font-size: 15px;*/
	margin-bottom: 15px;
}

h3 {
	font-size: 15px;
	margin-bottom: 10px;
}


.navBar {
  display: inline-flex;
  flex-direction: row;
  width: 100%;
  justify-content: space-between;

  background-image: linear-gradient(to right, black , #040194);
  color: white;
  align-items: center;
  padding-bottom: 5px;
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
	background-color: #292791;
	color: white;


}


.logoutButton {
	float: right;
	text-decoration: none;
	color: white;

}

.logoutButton:visited {
	color: white;
	text-decoration: none;
}


.editProfile {
	display: inline-flex;
	flex-direction: column;
	align-items: center;
	width: 100%;
}


.editProfileForm {
	width: 100%;
	display: grid;
	grid-template-columns: repeat(2, 1fr);

}


.field {
	display: inline-flex;
	flex-direction: column;
	margin-top: 10px;
	margin-bottom: 30px;
	margin-right: 40px;
}

.checkField {
			display: inline-flex;
			flex-direction: row;
			align-items: center;
			font-size: 16px;
			margin-top: 20px;
			/*margin-bottom: 10px;*/
}


.checkInput {
			height: 25px;
			width: 25px;
			margin-right: 10px;
}

.fullForm {
	display: inline-flex;
	flex-direction: column;
	align-items: center;
	width: 100%;
}


h4 {
	padding-top: 20px;
	padding-bottom: 20px;
	font-size: 35px;
}


input {
	height: 30px;
	width: 150px;
	font-size: 15px;
}

input[type=submit] {
	font-size: 15px;
	font-family: "Montserrat", sans-serif;
	margin-bottom: 30px;
	margin-top: 20px;
	/*text-align: center;*/
}

label {
	margin-top: 10px;
}



	
</style>


</html>
