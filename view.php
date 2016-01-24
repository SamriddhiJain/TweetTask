<!DOCTYPE html>
<html>
<head>
  <title>News Integrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>

    html, body, .container-fluid, .row {
        height: 100%;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 2500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
    	<div class="container">
			<div class="jumbotron">
			    <?php
					$string= $_GET['url'];
					echo '<iframe src='.$string.' width="1000" height="1500"/>';
				?>
			</div>    
		</div>
        
        <div class="col-sm-4">
          <div class="well">
            <label>Text :</label>
            <input id="text" type="text">
            <button id="myBtn" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search"></span> Search
            </button>
        </div>
        </div>
   
</body>
</html>