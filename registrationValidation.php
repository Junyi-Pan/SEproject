<?php
    require('database.php');
    session_start();

	if(isset($_POST['submit'])){
		$email = htmlspecialchars($_POST['email']);
		$fName = htmlspecialchars($_POST['fName']);
		$lName = htmlspecialchars($_POST['lName']);
		$password = htmlspecialchars($_POST['password']);
		$encryptpass = password_hash($password, PASSWORD_DEFAULT);
		$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
		//username = htmlspecialchars($_POST['username']);
		$mailState = htmlspecialchars($_POST['mailState']);
		$mailCity = htmlspecialchars($_POST['mailCity']);
		$mailAddress1 = htmlspecialchars($_POST['mailAddress1']);
		$mailAddress2 = htmlspecialchars($_POST['mailAddress2']);
		$mailZip = htmlspecialchars($_POST['mailZip']);

		$state = htmlspecialchars($_POST['state']);
		$city = htmlspecialchars($_POST['city']);
		$address1 = htmlspecialchars($_POST['address1']);
		$address2 = htmlspecialchars($_POST['address2']);
		$zip = htmlspecialchars($_POST['zip']);
		$cvv = htmlspecialchars($_POST['cvv']);
		$expMonth = htmlspecialchars($_POST['expMon']);
		$expYear = htmlspecialchars($_POST['expYear']);
		$cardNum = htmlspecialchars($_POST['cardNum']);
		$cardName = htmlspecialchars($_POST['cardName']);
		$promos = 0;
		if (isset($_POST['promotions'])) {
			$promos = 1;	
		}

		$sameAddress = 0;
		if (isset($_POST['billAddress'])) {
			$sameAddress = 1;	
		}


		$validInput = true;
		$registered = false;



		/*
		//check if any field is empty, and set feedback message if form is missing a field
		$message = "All fields filled";
		if(empty($email)){
			$message.= 'Email is required. Please try again. ';
			$validInput = false;
		}
		if(empty($username)){
			$message.= 'Username is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($fName)){
			$message.= 'First name is required. Please try again. ';
			$validInput = false;
		}
		if(empty($lName)){
			$message.= 'Last name is required. Please try again. ';
			$validInput = false;
		} 
		if(empty($password)){
			$message.= 'Password is required. Please try again. ';
			$validInput = false;
		}
		if(empty($confirmPassword)){
			$message.= 'Password confirmation is required. Please try again. ';
			$validInput = false;
		} 
		*/
		
		//check if a user with same email or username already exists
		$userCheck = $db->prepare("SELECT email 
									FROM users 
									WHERE email = '$email'");
		$userCheck->execute();
		$user = $userCheck->fetch();
		if($user){
			$_SESSION['message'] = "Account with that email already exists";
			$validInput = false;
		}
	
		/*
		//check if passwords match
		if($password != $confirmPassword){
			$message.= 'Passwords do not match. Please try again.';
			$validInput = false;
		}
		*/

		if($validInput == true){
			//Prepared statement, parameter binding, and execution
			$null = null;
			$zero = 0;
			$NULL = null;
			$statement = $db->prepare("INSERT INTO users VALUES (?,?,?,?,?,?,?,?,?,?)");
			$statement->bind_param("issssiiiss",$null,$email,$encryptpass,$fName,$lName,$zero,$zero,$promos,$NULL,$NULL);//null is passed as userID so it is auto incremented, state and isAdmin are initialized to 0.
			$statement->execute();

			//Check that account was created
			$usernameCheck = mysqli_query($db,"SELECT * FROM users WHERE email ='".$email."';");
			if (empty($usernameCheck)) {
				$accountCreationError = "Error creating account: " . $db->error;
				echo "Error creating account: " . $db->error;
				$db->close();
			} else {
				//Gets UserID of new account
				$userCheck = $db->prepare("SELECT userID FROM users WHERE email = '$email'");
				$userCheck->execute();
				$result = $userCheck->get_result();
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					foreach ($row as $r) {
						$userID = $r;
					}
				}

				//Saves mailing address
				if(empty($address2)){
					$address2 = "";
				}
				$statement3=$db->prepare("INSERT INTO addresses VALUES (?,?,?,?,?,?,?)");
				$statement3->bind_param("isssssi",$null,$mailAddress1,$mailAddress2, $mailCity,$mailState,$mailZip,$userID);//null is passed as addressID so it is auto incremented.
				$statement3->execute();
				//echo $null." ".$mailAddress1." ".$mailAddress2." ". $mailCity." ".$mailState." ".$mailZip." ".$userID;

				//Saves entered payment info if box is checked
				// if (isset($_POST['addPayment'])) {
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
					//echo $encryptionCvv;
					if($sameAddress){//Uses mailing address as billing address if box is checked
						$statement2 = $db->prepare("INSERT INTO paymentInfo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$statement2->bind_param("issssssssiisi",$null,$encryptionCard,$mailAddress1,$mailAddress2,$mailCity,$mailZip,$mailState,$fName,$lName,$expMonth,$expYear,$encryptionCvv,$userID);//null is passed as userID so it is auto incremented, state and isAdmin are initialized to 0.
						$statement2->execute();
					}else{
						$userCheck = $db->prepare("SELECT userID FROM users WHERE email = '$email'");
						$userCheck->execute();
						$result = $userCheck->get_result();
						while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
							foreach ($row as $r) {
								$userID = $r;
							}
						}

						$fullAddress = $address1 . " " . $address2;
						$statement2 = $db->prepare("INSERT INTO paymentInfo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$statement2->bind_param("issssssssiisi",$null,$encryptionCard,$address1,$address2,$city,$zip,$state,$fName,$lName,$expMonth,$expYear,$encryptionCvv,$userID);//null is passed as userID so it is auto incremented, state and isAdmin are initialized to 0.
						$statement2->execute();
					}


				$db->close();
				//echo "Header";
				header('location: regConfirmationPage.php');
			// }
		}
	}else{
			$db->close();
			header('location: registrationPage.php');
		}
	}





?>
