<?php 

// Server name must be localhost 
$servername = "localhost"; 

// In my case, user name will be root 
$username = "root"; 

// Password is empty 
$password = ""; 

$data = "data";

// Creating a connection 
$con = new mysqli($servername, $username, $password, $data); 

// Check connection 
if ($con->connect_error) { 
	die("Connection failure: ". $con->connect_error); 
} 

?> 
