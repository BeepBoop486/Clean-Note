<?php

	//If the user ain't logged in, then the login/register screen will be shown
	if(!isset($_SESSION["name"]) && !isset($inreg)) {
		include "pages/welcome.php";
	} else if(!isset($_SESSION["name"]) && isset($inreg)) {
		include "pages/register.php";
	} else {
		include "pages/network.php";
	}

?>