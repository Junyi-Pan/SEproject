<?php
  $user = 'root';
  $pass = '';
  $db = 'cinemadatabase';
  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


/*try{
$dsn = 'mysql:host=localhost;dbname=cinemadatabase';
$username = 'root';
$password = '';
$db = new PDO($dsn,$username,$password);
} catch(PDOException $e) {
  $error_message = $e -> getMessage();
  echo "<p> An error occured while connecting to the database: $error_message </p>";
} catch(Exception $e) {
  $error_message = $e -> getMessage();
  echo "<p> An error occured while connecting to the database: $error_message </p>";
}
*/
?>
