<?php
	include $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CleanNote</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/animate.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/timeline.css">

	<script src="/js/jquery.js"></script>
	<script src="/js/custom.js"></script>
	<script src="/js/bootstrap.js"></script>

</head>
<body class="welcome-page animated fadeIn">

<?php

	//If the user ain't logged in, then the login/register screen will be shown
	if(!isset($_SESSION["name"])) {
		include "pages/welcome.php";
	} else {
		include "pages/network.php";
	}

?>
