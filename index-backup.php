<!doctype html>
<html lang="en">
  <head>
  	<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	?> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Hello, world!</title>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <style>
    .animateDown {
        max-height:356px;
        transition: max-height 300ms;
    }
    .animateUp {
        max-height:546px;
        transition: max-height 300ms;
    }
    </style>
    <script>
    	$(document).ready(function(){

            $(document).on("click","#filterBtn",function(ev){
                if($("#inboxwrapper").hasClass("animateUp")){
                    $("#inboxwrapper").removeClass("animateUp");
                    $("#inboxwrapper").addClass("animateDown");
                } else {
                    $("#inboxwrapper").removeClass("animateDown");
                    $("#inboxwrapper").addClass("animateUp");
                }
            });

            // here the filter inbox jquery begins

    		$(document).on("click",".dropdown-item",function(ev){
    			console.log($(this).data("system"));
    			console.log($(this).data("matter"));
    			var mat = $(this).data("matter");
    			var sys = $(this).data("system");
    			$("#loader").load("filterinbox.php",{matter:mat,system:sys},function(e){
    				//console.log(e);
    				var jsonObj = jQuery.parseJSON(e);
    				console.log(jsonObj);
    				
  
    				if(jsonObj.length == 0){
    					alert("inga inlägg finns!");
    				} else {
	    				var strHtml = '<div class="col-12 temp" style="overflow: auto;" oncontextmenu="return false;">';
		  				for(var i = 0; i < jsonObj.length; i++){

	    					console.log(jsonObj[i]);

		    				strHtml += '<div class="inbox" style="border-top: solid 1px #000000; border-botton: solid 1px #000000;">';
		    				strHtml += '<div class="message_box" data-msgid="8">System: ' + jsonObj[i]['system'] + '<br>Matter: ' + jsonObj[i]['matter'] + '<br>Meddelande: ' + jsonObj[i]['description'] + '<br>Time sent: ' + jsonObj[i]['timeSent'] + '</div>';
	    					strHtml += '</div>';

	    				}
	    				strHtml += '</div>';

	    				$("#inboxdiv").html(strHtml);
    				}
    			});
    		});
    	});

    </script>

  </head>
  <body>   
    <?php 
	include "form.php";
		//echo "<div class='container-fluid'>";
	//echo "</div>";
	?>

 
<div id="loader" style="display:none;"></div>
  </body>
</html>