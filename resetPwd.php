<?php

include_once("../dbQuery.php");

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

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", "#Btn", function(ev){
			ev.preventDefault();
			var pwd1 = $("#exampleInputPassword1").val();      
	        var pwd2 = $("#exampleInputPassword2").val();     
	        var mail = $("#exampleInputEmail1").val();

	        if (pwd1 != pwd2){
	        	alert("Passwords are not the same!");
	          	$("#exampleInputPassword1").val("");
	          	$("#exampleInputPassword2").val("");
	          	return false;
	        } else {
	        		$("#theform").submit();
	        		return true;
	        }
		});
	});
</script>

<form id="theform" action="/redempiton/resetPwdFolder/recoverPwd.php" class="col-md-6" method="POST">
  <div class="form-group col-md-8 mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pwd_new">
  </div>
  <div class="form-group col-md-8 mb-3">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="pwd_confirm">
  </div>
  <button type="submit" class="btn btn-primary" name="resetPwdBtn" id="Btn">Submit</button>
</form>

<div class="loader3" style="display: none;"></div>