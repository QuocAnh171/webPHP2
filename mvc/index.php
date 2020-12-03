<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Quản lý sản phẩm</title>
</head>
<body>
</body>
</html>
<?php
	include "Model/DBconfig.php";
	$db = new Database;
	$db->connect();

	require_once('Controller/index.php');
	
?>