
<html>
	<head>
	  	<meta charset="UTF-8">
		<meta name="description" content="Stock Monitor and Portfolio Manager">
		<meta name="keywords" content="HTML,CSS,PHP">
		<meta name="author" content="Anirudh Goel">
		<META HTTP-EQUIV="refresh" CONTENT="40">
		<!-- This refresh time is so chosen that even if the webpage runs 24 hours, it won't run out of API calls. -->
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Portfolio.css">
		<link rel="stylesheet" href="http://csinsit.org/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class='jumbotron'>
			<h1>Portfolio</h1>
		</div>
	</body>


<?php
	require_once("inc/connection.inc.php");

	// Initialising variables to store extracted information
	$name = [];
	$symbol = [];
	$exchange = [];
	$open = [];
	$close = [];
	$high = [];
	$low = [];
	$lastprice = [];
	$y = 0;
	$z = '';
	$key = "93dcc722279c3a7577f248b09ef6167f";


	// Retreiving information from database
	$sql = "SELECT * FROM portfolio";
	$result = mysqli_query($conn, $sql);

	// Check if databse is empty
	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$sym[$y] = $row["stocks_symbol"];
			$pri[$y] = $row["price"];
			$vol[$y] = $row["volume"];
			$y += 1;
		}
	}
	// If database empty
	else 
	{
		?><h1><center><?php
		echo "Portfolio Empty";
		?></h1></center><?php
		die();
	}
	mysqli_close($conn);

	// Adding all stocks names in one variable to enable API call
	for($a=0;$a<$y;$a++)
	{
		$z = $z.$sym[$a].',';
	}

	$z = rtrim($z,",");

	// API call
	$contents = file_get_contents("http://marketdata.websol.barchart.com/getQuote.json?key=$key&symbols=$z&mode=R");
	$contents = json_decode($contents, true);

	// Check successfull API call
	if($contents["status"]["code"] == 200) 
	{
		foreach($contents['results'] as $result) 
		{
			array_push($name,$result['name']);
			array_push($symbol,$result['symbol']);
			array_push($exchange,$result['exchange']);
			array_push($open,$result['open']);
			array_push($close,$result['close']);
			array_push($high,$result['high']);