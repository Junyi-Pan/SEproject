<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TT Manage Promotions</title> <!-- decide on name -->
  <!-- <link rel="stylesheet" href="adminStyles.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,600&display=swap" rel="stylesheet"> -->

</head>
<body>

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

    <h3>Manage Promotions</h3>

      <div class="adminTools">


        <h3>Add Promotion</h3>

        <h3>Remove Promotion</h3>

        <form class="manageForms">

          <div class="fields">

            <label for="fname">Percent Off:</label>
            <input type="text" id="newPromoPercent" name="newPromoPercent">
            <label for="fname"> Promo Code:</label>
            <input type="text" id="newPromoCode" name="newPromoCode">
            <!-- <label for="promotionsd">Percent or dollar based?</label>
            <input class="checkInput" type="checkbox" name="promoType" id="promoType" value="XX"> -->

          </div>

          <input type="submit" value="Submit">
          
        </form>


        <form class="manageForms">

          <div class="fields">
            <label for="fname"> Promo Code:</label>
            <input type="text" id="oldPromoCode" name="oldPromoCode">
          </div>
          <input type="submit" value="Submit">

        </form>



      </div>
    </div>


    <h3>Active Promotions</h3>

    <div class="promoTable">
      
      <table>

        <tr>
          <th>% Off Value</th>
          <th>Offer Code</th>
        </tr>
        <tr>
          <td>15</td>
          <td>SAVE15</td>
        </tr>
        <tr>
          <td>30</td>
          <td>SUPERSECRET30CODE</td>
        </tr>
        
      </table>

    </div>

    <h3>Inactive Promotions</h3>

    <div class="promoTable">

      <table>
        
        <tr>
          <th>% Off Value</th>
          <th>Offer Code</th>
        </tr>
        <tr>
          <td>15</td>
          <td>SAVE15</td>
        </tr>
        <tr>
          <td>30</td>
          <td>SUPERSECRET30CODE</td>
        </tr>
        
      </table>

    </div>



  <!-- <div class="comingSoon">

    <h3>Current Promotions</h3>

    <div class="horizontalSection">
<div class="tableDiv">
    <table class="promoTable">
      <tr>
        <th>% Off Value</th>
        <th>Offer Code</th>
      </tr>
      <tr>
        <td>15</td>
        <td>SAVE15</td>
      </tr>
      <tr>
        <td>30</td>
        <td>SUPERSECRET30CODE</td>
      </tr>
    </table><br><br><br><br>
  </div>

    </div>
    

  </div>

    <div class="comingSoon">

    <h3>Add Promotion</h3>

    <div><center><form>
      <label for="fname">Percent Off:</label>
      <input type="text" id="newPromoPercent" name="newPromoPercent"><br>
      <label for="fname"> Promo Code:</label>
      <input type="text" id="newPromoCode" name="newPromoCode"><br><br>
      <input type="submit" value="Submit"><br><br><br><br>
    </form></center></div>

    <h3>Remove Promotion</h3>

    <div><center><form>
        <label for="fname"> Promo Code:</label>
        <input type="text" id="oldPromoCode" name="oldPromoCode"><br>
        <input type="submit" value="Submit"><br><br>
    </form></center></div>
    

  </div>


  
</div> -->

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
      margin-bottom: 50px;
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
    /*margin-bottom: 20px;*/
  }

  .manageForms {
    display: inline-flex;
    flex-direction: column;
    padding: 10px 70px 10px 70px;
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

  .promoTable {
    display: inline-flex;
    flex-direction: column;
    width: 100%;
    align-items: center;
    margin-top: 10px;
  }

  th, td {
    text-align: center;
    border-bottom: 1px solid;
    padding: 10px;
  }
  

</style>
</html>











