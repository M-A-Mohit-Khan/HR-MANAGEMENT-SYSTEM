<?php
	session_start();
	if(!isset($_SESSION['flag']))
	{
		
		header('location: ../../view/signin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
</head>
<body>