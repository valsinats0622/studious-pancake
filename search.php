<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var arr = [];
			$(document).on("click", "#btn", function(e){
				
				var word = $("#word").val();

				var search = {
					'input' : word
				}

				$("#loader").load("syno.php", {'data':search}, function(e){
					var test = jQuery.parseJSON(e);
					arr["results"] = test;
					console.log(arr);
					$("#textarea").val(arr["results"]);
				});
			});
		});
	</script>
</head>
<body>
	<input type="text" name="search" id="word">
	<button type="submit" name="submit" id="btn">Search</button>
	<h3>Synonymer</h3>
	<textarea rows="20" cols="50" id="textarea"></textarea>
	<div id="loader" style="visibility: hidden;"></div>
</body>
</html>