<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TT Manage Movies</title> <!-- decide on name -->
  <!-- <link rel="stylesheet" href="adminStyles.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

</head>
<body>

  <!-- Navbar (sit on top) -->
<div class="navBar">
  <div class="leftSideNav">
    <h1>Turbo <br> Theatres</h1>
    <a href="adminHome.html" class="navBookMovie">Admin view</a>
  </div>
  
  <div class="rightSideNav">
      <a href="adminLogin.html" class="logoutButton">Log Out  |</a>
      <a href="" class="logoutButton">View Profile</a>
    </div>
  </div>


  <div class="adminBody">

    <h3>Manage Movies</h3>

      <div class="adminTools">


        <h3>Add Movie</h3>

        <h3>Remove Movie</h3>

        <form class="manageForms">

          <div class="fields">

            <label for="newMovieForm">Title:</label>
            <input type="text" id="movieTitle" name="movieTitle">
            <label for="newMovieForm">Rating:</label>
            <input type="text" id="trailerLink" name="trailerLink">
            <label for="newMovieForm">Trailer Link:</label>
            <input type="text" id="promoImgLink" name="promoImgLink">
            <label for="newMovieForm">Poster Link:</label>
            <input type="text" id="rating" name="rating">
            <label for="newMovieForm">Plot:</label>
            <input type="text" id="rating" name="rating">

          </div>

          <input type="submit" value="Submit">
          
        </form>


        <form class="manageForms">

          <div class="fields">
            <label for="removeMovieForm">Title:</label>
            <input type="text" id="movieTitle" name="movieTitle">
          </div>
          <input type="submit" value="Submit">
        </form>

        <h3>Add Showing</h3>
        <h3>Remove Showing</h3>


        <form class="manageForms">

          <div class="fields">

            <label for="addShowingForm">Title:</label>
            <input type="text" id="movieTitle" name="movieTitle">
            <label for="addShowingForm">Time:</label>
            <input type="text" id="showingTime" name="showingTime">
            <label for="addShowingForm">Theater:</label>
            <input type="text" id="showingTheater" name="showingTheater">

          </div>

          <input type="submit" value="Submit">
          
        </form>


        <form class="manageForms">

          <div class="fields">

            <label for="deleteShowingForm">Title:</label>
            <input type="text" id="movieTitle" name="movieTitle">
            <label for="deleteShowingForm">Time:</label>
            <input type="text" id="showingTime" name="showingTime">
            <label for="deleteShowingForm">Theater:</label>
            <input type="text" id="showingTheater" name="showingTheater">

          </div>

          <input type="submit" value="Submit">
          
        </form>


    </div>
    

  </div>


  <div class="nowShowing">
  <h3>Movies with current/future showings</h3>

  <br>

  <div class="allMovies">

    <div class="movieRow">

    <div class="movie">
      <img class="homeMovieImg" src="movie1.jpg">
      <div class="details">
        <p>Death on the Nile</p>
        <div class="times">
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie2.jpg">
      <div class="details">
        <p>Scream</p>
        <div class="times">
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie3.jpg">
      <div class="details">
        <p>Blacklight</p>
        <div class="times">
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
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
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie5.jpg">
      <div class="details">
        <p>Encanto</p>
        <div class="times">
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
        </div>
      </div>
    </div>

    <div class="movie">
      <img class="homeMovieImg" src="movie6.jpg">
      <div class="details">
        <p>Fallout</p>
        <div class="times">
          <h5>12:45 PM <br> Theater 2</h5>
          <h5>3:00 PM <br> Theater 5</h5>
        </div>
      </div>
    </div>

    </div>

  </div>

  <div class="comingSoon">

    <h3>Movies not showing</h3>

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

    h3 {
      /*used on homepage & reg confirmation page*/
      font-size: 30px;
      text-align: center;
      margin-top: 30px;
    }

    h5 {
      margin-top: 30px;
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

  .adminTools {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    margin-bottom: 50px;
  }

  .manageForms {
    display: inline-flex;
    flex-direction: column;
    padding: 10px 70px 30px 70px;
  }

  .fields {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 20px;

  }

  input {
      font-size: 15px;
    }

    input[type=submit] {
      font-size: 20px;
      font-family: "Montserrat", sans-serif;
      width: 100px;
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
    width: 155px;
    height: auto;
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
    /*gap: 30px;*/
  }


  .comingSoon {
    display: inline-flex;
    flex-direction: column;
    width: 100%;
    margin-top: 20px;
  }


</style>


</html>










