
<html>
	<head>
	  	<meta charset="UTF-8">
		<meta name="description" content="Stock Monitor and Portfolio Manager">
		<meta name="keywords" content="HTML,CSS,PHP">
		<meta name="author" content="Anirudh Goel">
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Modify.css">
		<link rel="stylesheet" href="http://csinsit.org/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<!--  -->
		<!--  -->
		<!-- Script to display live search suggestions -->
		<!--  -->
		<!--  -->
		<script>
			function showResult(str) 
			{
				if (str.length==0) 
				{
					document.getElementById("livesearch").innerHTML="";
					document.getElementById("livesearch").style.border="0px";
					return;
				}
