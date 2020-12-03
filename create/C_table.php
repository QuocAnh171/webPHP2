<?php
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "customers";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

// create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT(30) NOT NULL,
image VARCHAR(30) NOT NULL,
status INT(6) NOT NULL,
creat_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql))
{
	echo "Table MyGuests created successfully";
}
else{
	echo "Error creating table: " . mysqli_error($conn);
}

$conn = null;
?>