<?php

	error_reporting(0);

	include $_SERVER["DOCUMENT_ROOT"] . "/globals.php";
	include $_SERVER["DOCUMENT_ROOT"] . "/lang/" . $globals["SITE_LANG"] . ".php";

	session_start();
	$conn = mysqli_connect($globals["DB_HOST"], $globals["DB_USER"], $globals["DB_PASS"] , $globals["DB_NAME"]);
	if(!$conn) {
		echo "There's been an error trying to connect to the Database";
	}

?>
