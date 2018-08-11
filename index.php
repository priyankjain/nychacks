<!DOCTYPE html>
<html lang="en">
  <head>
    <title>University Matcher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Kirang+Haerang" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Hanalei+Fill|Kirang+Haerang" rel="stylesheet">
  </head>
  <body>

    <div class="container">
      <h1>University Matcher</h1>
      <br><p style= "animation: 1s pop-in">Enter in your SAT score below: </p>

      <form action="result.php" target="_self" method="post">
        <div class="input-group" style="animation: 1s fade-slide-left">
          <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
          <input type="text" class="form-control" name="math" placeholder="SAT Math">
        </div>
        <br/>
        <div class="input-group" style="animation: 1s fade-slide-left">
          <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
          <input type="text" class="form-control" name="reading" placeholder="SAT Reading">
        </div>
        <br/>
        <div class="input-group" style="animation: 1s fade-slide-left">
          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <input type="text" class="form-control" name="writing" placeholder="SAT Wrtiting">
        </div>
        <br>
        <br/>
        <p style= "animation: 1s pop-in" >Enter parent's yearly income:<br></p>
        <div class="input-group" style="animation: 1s fade-slide-left">
          <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
          <input type="text" class="form-control" name="income" placeholder="Amount">
        </div>
      <br/>
      <p style= "animation: 1s pop-in">Select State you live in:<br></p>
      <div class="input-group form-group" style="animation: 1s fade-slide-left">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <select name="location" class="form-control">
          <option value="ALL">All States</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
          <option value="AS">American Samoa</option>
          <option value="GU">Guam</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="PR">Puerto Rico</option>
          <option value="UM">United States Minor Outlying Islands</option>
          <option value="VI">Virgin Islands</option>
        </select>
      </div>
      <br/>
      <!--<div class ="input-group" position="center">-->
        <!--<button type="button" class="btn btn-danger"style="animation: 2s pop-in">Submit</button>-->
          <input type="submit" class="form-control btn-danger btn"  value="Submit"/>
      <!--</div>-->
   

      </form>
    <br>


    </div>

  </body>
</html>