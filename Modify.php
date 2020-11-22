
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

				if (window.XMLHttpRequest) 
				{
					xmlhttp=new XMLHttpRequest();
				}

				xmlhttp.onreadystatechange=function() 
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200) 
					{
						document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
						document.getElementById("livesearch").style.border="1px solid #A5ACB2";
					}
				}
				xmlhttp.open("POST","livesearch.php?q="+str,true);
				xmlhttp.send();
			}
		</script>
		<!--  -->
		<!--  -->
		<!--  -->
		<!--  -->
		<!--  -->
	</head>
	<body>
		<div class='jumbotron'>
			<h1>Stock Monitor and Portfolio Manager</h1>
		</div>
		
		<div class='text-center'>
			<form action='Modify.php' method='POST'>
				<input name='var1' type='text' class='input-lg' placeholder='Stock Symbol 1' onkeyup="showResult(this.value)">
				<input name='pri1' type='text' class='input-lg' placeholder='Price'>
				<input name='vol1' type='text' class='input-lg' placeholder='Volume'>
				<br>
				<br>