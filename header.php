<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		$(document).on("click", "#submit-message", function(e){
			$("#loader").load("includes/messageForm.php", {}, function(e){
			});
		});

	</script>

</head>
<body>