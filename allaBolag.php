<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			var arr = [];
			$("#btn").on("click",function(e){

				var userinput = $("#userinput").val();

				var search = {
					"input" : userinput
				}

				$("#loader").load("scriptAllaBolag.php", {"data": search}, function(e){
					
					console.log(e);
					$("#display").val(e);
					/*var test = jQuery.parseJSON(e);
					arr["result"] = test;
					$("#display").val(arr["result"]);*/
				});
			});
		});
	</script>
</head>
<body>
	<input type="text" name="search" id="userinput" placeholder="Company"><br>
	<button type="submit" id="btn">Search</button><br>
	<h3>Result</h3>
	<textarea rows="50" cols="125" id="display"></textarea>

	<div id="loader" style="visibility: hidden;"></div>
</body>
</html>