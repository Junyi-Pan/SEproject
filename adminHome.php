<?php 
  session_start();
  if(!isset($_SESSION["userID"])){
    header('Location: loginPage.php');
  } 
  if(!isset($_SESSION['admin'])) {
    header('Location: homepage.php');
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TT Admin Home</title> <!-- decide on name -->
  <!-- <link rel="stylesheet" href="adminStyles.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,600&display=swap" rel="stylesheet"> -->

</head>
<body>

  <!-- Navbar (sit on top) -->
<div class="navBar">
  <div class="leftSideNav">
    <h1>Turbo <br> Theatres</h1>
    <a href="adminHome.html" class="navBookMovie">Admin view</a>
  </div>

  <div class="rightSideNav">
      <a href="signout.php" class="logoutButton">Log Out  |</a>
      <a href="editProfilePage.php" class="logoutButton">View Profile</a>
    </div>
  </div>



  <div class="adminBody">

    <h3>Admin Tools</h3>

      <div class="adminTools">


        <a href="manageMovies.html" class="adminButtons">Manage Movies</a>
        <a href="managePromotions.html" class="adminButtons">Manage Promotions</a>

      </div>

      <a href="manageUsers.html" class="adminButtons">Manage Users</a>
    

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
      display: inline-flex;
      flex-direction: row;
      width: 100%;
      justify-content: space-between;
      background: #040194;
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

    .rightSideNav {
      padding-right: 20px;
      display: inline-flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
    }

    .navBookMovie {
      text-decoration: none;
      color: white;
      margin-left: 50px;
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


  .adminBody {
    display: inline-flex;
    flex-direction: column;
    align-items: center; 
    padding-top: 20px; 
    width: 100%;
  }


  .adminTools {
    display: inline-flex;
    flex-direction: row;
    padding-left: 40px;
    padding-top: 20px;
  }

  .adminButtons {
    text-decoration: none;
    font-size: 30px;
    background-color: white;
    color: #08014a;
    text-align: center;
    padding: 10px 40px;
    margin: 40px;
    /*margin-right:50px;
    margin-left: 50px;
    margin-bottom: 50px;*/
    border-radius: 3px;

  }





  
</style>


</html>




