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
    .collapsing {
        transition: 400ms ease-in !important;
    }
    .animateDown {
        max-height:352px;
        transition: max-height 400ms ease-in;
    }
    .animateUp {
        max-height:546px;
        transition: max-height 400ms ease-in;
    }
    </style>
    <script type="text/javascript">
    	 $(document).ready(function(){

    	 	var pollTimer = 0;

    	 	function checkSession(){
    	 		console.log("checked");
    	 		clearTimeout(pollTimer);
    	 		pollTimer = setTimeout(function(){
    	 			$('#loader').load("timeout.php", function(e){
    	 				console.log(e);
    	 				if(e == 1){
    	 					console.log(e);
    	 					window.top.location.href="index.php"; 
    	 				} else {
    	 					checkSession();
    	 				}
    	 			});
    	 		}, 3000);
    	 	}
    	 	checkSession();

           $(document).on("click","#filterBtn",function(ev){
                $("#filterBtn").addClass("disabled");
                if($("#inboxwrapper").hasClass("animateUp")){
                    $("#inboxwrapper").removeClass("animateUp");
                    $("#inboxwrapper").addClass("animateDown");
                } else {
                    $("#inboxwrapper").removeClass("animateDown");
                    $("#inboxwrapper").addClass("animateUp");
                }
                setTimeout(function(){
                    $("#filterBtn").removeClass("disabled");
                },405);
            });

            // here the filter inbox jquery begins

    		$(document).on("click",".checkBoxItem",function(ev){
    			console.log("system: " + $(this).data("system"));
    			console.log("matter: " + $(this).data("matter"));

                var noneChecked = true;
                $(".checkBoxItem").each(function(e){
                    if($(this).is(":checked")){
                        noneChecked = false;
                    }
                });
                
                var choiceArr;

                if(noneChecked){
                    // $(".checkBoxItem").prop("checked", true);
                    choiceArr = {
                        "system" : {
                            "Albatross" : true,
                            "Turtle"    : true,
                            "Secure"    : true
                        },
                        "matter" : {
                            "Bug"       : true,
                            "Feature"   : true,
                            "Other"     : true                  
                        }
                    };
                } else {

                    choiceArr = {
                        "system" : {
                            "Albatross" : $("#alb").is(":checked"),
                            "Turtle"    : $("#turt").is(":checked"),
                            "Secure"    : $("#sec").is(":checked")
                        },
                        "matter" : {
                            "Bug"       : $("#bug").is(":checked"),
                            "Feature"   : $("#feat").is(":checked"),
                            "Other"     : $("#other").is(":checked")                  
                        }
                    };
                }
                console.log("NONCHECK: " + noneChecked);

                console.log("choicearr: " + choiceArr);

    			$("#loader").load("filterinbox.php",{"data" : choiceArr},function(e){
    				console.log(e);
    				var jsonObj = jQuery.parseJSON(e);
    				console.log(e);
  
    				if(jsonObj.length == 0){
    					alert("Fattas inlägg!");
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
	<div id="loader" style="display:none;"></div>
<div style="margin-top: 0%; margin-left: 0%;" class="main-page">
	
	<div class="col-sm-5 offset-1">	
		<ul class="nav nav-pills">
	        <li class="nav-item">
	            <a class="nav-link active" href="index.php">Log out</a>
	        </li>
	    </ul>
	</div>

	<form action="submited.php" method="POST">
	<div class="row">
	  <div class="form-group col-sm-5 offset-1">
	    <label for="exampleFormControlSelect1">System</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="system">
	      <option value="Albatross">Albatross</option>
	      <option value="Turtle">Turtle</option>
	      <option value="Secure">Secure</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-sm-5 offset-1">
	    <label for="exampleFormControlSelect1">Matter</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="matter">
	      <option value="Bug">Bug</option>
	      <option value="Feature">Feature</option>
	      <option value="Other">Other</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-12 offset-0 col-md-5 offset-1">
	    <label for="exampleFormControlSelect1">Message</label>
	    <textarea class="form-control" name="description" placeholder="Description"  style="resize: none;height:570px; overflow: auto;"></textarea>
	  </div>

	  <div class="form-group col-12 offset-0 col-md-5 offset-1">
		<p>
  			<a id="filterBtn" class="btn btn-primary" data-toggle="collapse" href="#checkBoxes" role="button" aria-expanded="false" aria-controls="checkBoxes">
    			<img src="images/menu.png" style="height: 26px; width:30px; display:block;" />
  			</a>
		</p>
		<div class="collapse card col-10" id="checkBoxes">
  			<div class="card-body">
  				<div class="container">
  					<div class="row">
	  					<div class="col-sm-6">
		  				<p>
		  					<h5>System</h5>
		  				</p>
		   				<div class="wrapper">
		   					<label class="Albatross" for="Albatross">Albatross
		   					<input type="checkbox" name="Albatross" id="alb" class="checkBoxItem" data-system="Albatross">
		   					</label>
		   					<br>
		   					<label class="Turle" for="Turle">Turle
		   					<input type="checkbox" name="Turle" id="turt" class="checkBoxItem" data-system="Turtle">
		   					</label>
		   					<br>
		   					<label class="Secure" for="Secure">Secure
		   					<input type="checkbox" name="Secure" id="sec" class="checkBoxItem" data-system="Secure">
		   					</label>
						</div>
					</div>	
					<div class="row">
		  				</div>
		  				<div class="col-sm-6">
			  				<p>
			  					<h5>Matter</h5>
							</p>
							<div class="wrapper">
								<label class="Bug" for="Bug">Bug
								<input type="checkbox" name="Bug" id="bug" class="checkBoxItem" data-matter="Bug">
								</label>
								<br>
								<label class="Feature" for="Feature">Feature
								<input type="checkbox" name="Feature" id="feat" class="checkBoxItem" data-matter="Feature">
								</label>
								<br>
								<label class="Other" for="Other">Other
								<input type="checkbox" name="Other" id="other" class="checkBoxItem" data-matter="Other">
								</label>
			   				</div>
		  				</div> 
		  			</div>	
		  		</div>
			</div>
		</div>

		<div>
		<?php
		echo "<div id='inboxwrapper' class='card col-10 animateUp' style='overflow: auto;'>";
		echo "<div' id='inboxdiv' class='col-12'>";
		include "inbox.php";
		echo "</div>";
		echo "</div>"
		?>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-5 offset-1">
		  <input class="form-group" type="submit" id="submit-message" value="Submit">
	  </div>
	</div>
	</form>
</div>
</body>