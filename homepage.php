<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Turbo Theatres</title> <!-- decide on name -->
  <!-- <link rel="stylesheet" href="projectStyleSheet.css"> -->
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
    <a href="bookMoviePage.html" class="navBookMovie">Get Tickets</a>
  </div>

  
  
    <!-- <a href="" class="homeButton">Turbo Theatres</a> -->
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="rightSideNav">
      <input type="text" placeholder="Search..">

      <?php 
    if(isset($_SESSION['userID'])) {
      
      if(isset($_SESSION['admin'])) { 
        echo '<a href="adminHome.php" class="logoutButton">Admin Portal |</a>';
      }
      
      echo '<a href="editProfilePage.php" class="logoutButton">Edit Profile |</a>';
      echo '<a href="signout.php" class="logoutButton">Log Out</a>';
    } else { 
      echo '<a href="loginPage.php" class="loginButton">Log In |</a>';
      echo '<a href="registrationPage.php" class="signUpButton">Sign Up</a>';
    }?>

    </div>
  </div>
</div>


<div class="promotions">

  <img class="homeMovieImg" src="movie5.jpg">

   <iframe width="604" height="340" src="https://www.youtube.com/embed/CaimKeDcudo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

   <div class="promoDetails">
    <h2>Encanto (G)</h2>
    <h3>Now Showing</h3>
    <br>
    <a href="bookMoviePage.html" class="bookMovie">Get Tickets</a>
   </div>

  
  <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/CaimKeDcudo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

  
</div>


<div class="nowShowing">
  <h3>Now Showing</h3>

  <br>

  <div class="allMovies">

    <div class="movieRow">

    <div class="movie">
      <img class="homeMovieImg" src="movie1.jpg">
      <div class="details">
        <p>Death on the Nile</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie2.jpg">
      <div class="details">
        <p>Scream</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie3.jpg">
      <div class="details">
        <p>Blacklight</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    </div>



    <div class="movieRow">

    <div class="movie">
      <img class="homeMovieImg" src="movie4.jpg">
      <div class="details">
        <p>Moonfall</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie5.jpg">
      <div class="details">
        <p>Encanto</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie6.jpg">
      <div class="details">
        <p>Fallout</p>
        <div class="times">
          <a class="bookTime" href="">12:45</a>
          <a class="bookTime" href="">3:00</a>
          <a class="bookTime" href="">7:15</a>
          <a class="bookTime" href="">11:30</a>
        </div>
      </div>
    </div>

    </div>

  </div>

  <div class="comingSoon">

    <h3>Coming Soon</h3>

    <div class="movieRow">

      <img class="homeMovieImg" src="movie7.jpg">
      <img class="homeMovieImg" src="movie8.jpg">
      <img class="homeMovieImg" src="movie9.jpg">

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


    h1 {
      /*used on homepage*/
      font-style: italic;
    }

    h2 {
      /*used on homepage*/
      font-size: 50px;
      margin-bottom: 10px;
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


  /*.homeButton {
    font-size: 30px;
    color: white;
    text-decoration: none;
    
  }*/

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
    
.logoutButton {
	float: right;
	text-decoration: none;
	color: white;

}

.logoutButton:visited {
	color: white;
	text-decoration: none;
}
    
  input {
  height: 40px;
  width: 200px;
  font-size: 15px;
}


  .promotions {
    display: inline-flex;
    flex-direction: row;
    gap: 0px;
  }

  .promoDetails {
    display: inline-flex;
    flex-direction: column;
    padding-left: 40px;
    padding-top: 20px;
  }


  h2 {
    font-size: 50px;
    margin-bottom: 10px;
  }

  .bookMovie {
    text-decoration: none;
    font-size: 30px;
    background-color: white;
    color: #08014a;
    text-align: center;
    padding: 10px 40px;
    border-radius: 3px;

  }


  .nowShowing {
    margin-top: 40px;
  }



  .allMovies {
    display: inline-flex;
    flex-direction: column;
    /*gap: 40px;*/
    width: 100%;
  }

  .homeMovieImg {
    width: 225px;
    height: auto;
  }

  .homeMovieImg:hover {
    opacity: 0.3;
  }

  .movieRow {
    display: inline-flex;
    flex-direction: row;
    width: 100%;
    justify-content: space-evenly;   
    /*gap: 30px;*/
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .movie {
    display: inline-flex;
    flex-direction: row;
    gap: 30px;


  }

  .details {
    display: inline-flex;
    flex-direction: column;
  }

  .times {
    display: inline-flex;
    flex-direction: column;
    gap: 30px;
  }


  .bookTime {
    text-decoration: none;
    background-color: white;
    color: #08014a;
    text-align: center;
    padding: 10px 40px;
    border-radius: 3px;
  }

  .comingSoon {
    display: inline-flex;
    flex-direction: column;
    width: 100%;
    margin-top: 20px;
  }


  </style>

</html>


