<?php
// Establishing Connection to SQL
$servername = 'localhost';
$username = 'root';
$password = 'password';

// Create Connection
$conn = mysqli_connect($servername, $username, $password);

// Check Connection
if(!$conn) {
	die('Connection to SQL failed:' . mysqli_connect_error());
}

// Creating Database
$sql = 'CREATE DATABASE IF NOT EXISTS stocks';
if(mysqli_query($conn, $sql)) {} else {
	echo "Error creating database" . mysqli_error($conn);
	die();
}

// Establising Connection to Database
$db = "stocks";

// Create Connection
$dbconn = mysqli_select_db($conn, $db);

// Check Connection
if(!$dbconn) {
	die('Connection to Database failed:' . mysqli_connect_err