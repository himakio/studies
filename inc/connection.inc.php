<?php
// Establishing Connection to SQL
$servername = 'localhost';
$username = 'root';
$password = 'password';

// Create Connection
$conn = mysqli_connect($servername, $username, $password);

// Check Connection
if(!$conn) {
	die('Connection to SQL failed:' . mysqli_conne