<?php
	require('database.php');
    session_start();
	

	if(isset($_POST['submit'])){
		$cardID = htmlspecialchars($_POST['paymentMethodID']);
	}
	$sql=$db->prepare("DELETE FROM paymentInfo WHERE paymentMethodID = ?");
	$stmt = $sql->bind_param('i', $cardID);
	$result = $sql->execute();

	header('location: editProfilePage.php');
?>
