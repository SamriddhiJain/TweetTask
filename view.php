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
    
        <div id="search" class="col-sm-12">
	        <div class="well">
	        	<input id="text" type="text">
	        	<p>Select text and click on the button to get the related tweets</p>
	            <button id="myBtn" type="button" class="btn btn-info">
		            <span class="glyphicon glyphicon-search"></span> Search
		        </button>

		        <script>
		        	function getIframeSelectionText(iframe) {
						  var win = iframe.contentWindow;
						  var doc = win.document;

						  if (win.getSelection) {
						    return win.getSelection().toString();
						  } else if (doc.selection && doc.selection.createRange) {
						    return doc.selection.createRange().text;
						  }
					}

		        	document.getElementById("myBtn").addEventListener("click", function(event){
              			event.preventDefault();
			        	var text=document.getElementById('text').value;

			        	var req="";
			        	//call nlp api
			        	$.ajax({
	                        type: "POST",
	                        url: "shell.php?",
	                        dataType: 'text',
	                        data: "val="+text,
	                        success: function(data) {
	                        	//alert(data);
	                      	    req=data;

	                      	    var query="<?php echo $_GET['val'] ?>"+req;

								//get tweets
					        	var Tvalue="";
					        	$.ajax({
			                      type: "POST",
			                      url: "ret_net.php?",
			                      dataType: 'text',
			                      data: "val="+ query,
			                      //timeout: 10000,
			                      success: function(data) {
			                        var result=JSON.parse(data);
			                        var user;

			                        for (var i in result){
			                          user=result[i].user;
			                          Tvalue += '<div class="well">'
			                          Tvalue += user.name;
			                          Tvalue += "<br>"
			                          Tvalue += result[i].created_at;
			                          Tvalue += user.time_zone;
			                          Tvalue += "<br>"
			                          Tvalue += result[i].text;
			                          Tvalue += '</div>'
			                        }
			                        alert(Tvalue);
			                        document.getElementById("news-Display").innerHTML=Tvalue;
			                        //alert("Done");
			                      },
			                      error: function(xhr){
			                        alert("An error occured: " + xhr.status + " " + xhr.statusText);
			                      }
			                    });

	                        },
		                    error: function(xhr){
		                        alert("An error occured: " + xhr.status + " " + xhr.statusText);
		                      }
		                });

			        });
		        </script>
	        </div>

	        <div class="col-sm-12">
	        	<p id="news-Display"></p>
	        </div>
        </div>
        <div class="col-sm-12">
	        <div class="well">
	           <?php
					$string= $_GET['url'];
					echo '<iframe id="news" src='.$string.' width="800" height="1500" />';
				?>
	        </div>
        </div>
   
</body>
</html>