<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var arr = [];

			$(document).on("click", "#btn", function(e){
				var userinput = $("#userinput").val();

				var info = {
					"search": userinput
				};
				$("#loader").load("mediamarkScript.php", {"data": info}, function(ev){
					var test = jQuery.parseJSON(ev);
					arr["results"] = test;
					console.log(arr);
					$("#textarea").val(arr["results"][1]);
				});
			});
		});
	</script>

</head>
<body>
	<input type="text" name="input" placeholder="Input" id="userinput"><br>
	<button id="btn">Search</button><br>
	<textarea rows="20" cols="50" id="textarea"></textarea>
	<div id="loader" style="visibility: hidden;"></div>
</body>
</html>