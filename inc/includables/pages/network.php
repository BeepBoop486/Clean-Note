<?php

	if(!isset($_SESSION["name"])) {
		die("You must to be logged in");
	}

	include "network/control/post.php";
	include "network/header.php";
	include "network/container.php";

?>
