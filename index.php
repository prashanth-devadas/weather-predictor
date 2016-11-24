<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather scrapper</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">

    html, body {
      height: 100%;
      text-align: center;
      color: #ADCBE0;
      font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }


    .container {
      background-image: url(images/background-0.jpg);
      width:100%;
      height:100%;
      background-size: cover;
      background-position: center;
    }

    #findMyWeather {
      margin-bottom: 20px;
    }

    .alert {
      display: none;

          }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3">
          <h1><strong>Weather Predictor</strong></h1>

          <form>

            <div class="form-group">

              <label for="city">Select your city</label>
              <input id="city" type="text" name="city" class="form-control" placeholder="Eg. London, Paris, Mumbai.." />

            </div>

            <input id="findMyWeather" type="submit" name="submit" class="btn btn-success btn-lg" value="Check weather">

          </form>

          <div id="success" class="alert alert-success"></div>
            <div id="failure" class="alert alert-danger">Could not find weather data for that city. Please try again</div>
            <div id="cityNotFound" class="alert alert-danger">Please enter a city name</div>
          
          
        </div>




      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">

      $('#findMyWeather').click( function() {

        event.preventDefault();

        $(".alert").hide();

        if($('#city').val()!="") { 
                                            
                       

        $.get("/php/weather/scraper.php?city="+$('#city').val(),  function(data) {

          $('#alert').html(data).fadeIn();           

          if (data=="") {

            $('#failure').fadeIn();
             

          } else {

            $('#success').html(data).fadeIn();
             
          }
        }); 

      }  else  {
          $(".alert").hide();
          $('#cityNotFound').fadeIn();
          

      }

      });

    </script>
  </body>
</html>