
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
				<input name='var2' type='text' class='input-lg' placeholder='Stock Symbol 2' onkeyup="showResult(this.value)">
				<input name='pri2' type='text' class='input-lg' placeholder='Price'>
				<input name='vol2' type='text' class='input-lg' placeholder='Volume'>
				<br>
				<br>
				<input name='var3' type='text' class='input-lg' placeholder='Stock Symbol 3' onkeyup="showResult(this.value)">
				<input name='pri3' type='text' class='input-lg' placeholder='Price'>
				<input name='vol3' type='text' class='input-lg' placeholder='Volume'>
				<br>
				<br>
				<input name='var4' type='text' class='input-lg' placeholder='Stock Symbol 4' onkeyup="showResult(this.value)">
				<input name='pri4' type='text' class='input-lg' placeholder='Price'>
				<input name='vol4' type='text' class='input-lg' placeholder='Volume'>
				<br>
				<br>
				<input name='var5' type='text' class='input-lg' placeholder='Stock Symbol 5' onkeyup="showResult(this.value)">
				<input name='pri5' type='text' class='input-lg' placeholder='Price'>
				<input name='vol5' type='text' class='input-lg' placeholder='Volume'>
				<div id="livesearch"></div>
				<br>
				<br>
				<input name='Add' type='submit' class='btn btn-lg btn-success' value='Add'>
				<input name='Delete' type='submit' class='btn btn-lg btn-danger' value='Delete'>
				<br>
				<br>
			</form>
		</div>
	</body>
</html>

<?php
	require_once("inc/connection.inc.php");
	// If Add button is pressed
	if(isset($_POST['Add']))
	{ 
		// Checking whether first line is completely filled
		if(empty($_POST['var1']) or empty($_POST['pri1']) or empty($_POST['vol1']))
		{
			?><h1><center>To add values please fill atleast first row completely.</center></h1><?php
			die();
		}

		for($x=1;$x<=5;$x++)
		{
			$var = [];
			$pri = [];
			$vol = [];
			if (!empty($_POST['var'.$x]) and !empty($_POST['pri'.$x]) and !empty($_POST['vol'.$x])) 
			{
				$var[$x] = $_POST['var'.$x];
				$pri[$x] = $_POST['pri'.$x];
				$vol[$x] = $_POST['vol'.$x];
				$sql = "INSERT INTO portfolio 
					(stocks_symbol, price, volume)
					VALUES ('$var[$x]', $pri[$x], $vol[$x])
					ON DUPLICATE KEY UPDATE
					price=$pri[$x], volume=$vol[$x]";

				// Check if values are added successfully
				if(mysqli_query($conn, $sql))
				{
					?><h1><center><?php
					echo $x.". Values added.";
					?></h1><center><?php
				}
				else
				{
					?><h3><center><?php
					echo $x.". Error adding values to table". "<br>". $sql.
					"<br>". $conn->error;
					?></h3><center><?php
				}
			}
		}
		mysqli_close($conn);
	}


	// If Delete button is pressed
