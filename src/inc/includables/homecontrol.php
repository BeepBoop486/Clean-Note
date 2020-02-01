<?php

	//If the user ain't logged in, then the login/register screen will be shown
	if(!isset($_SESSION["name"])) {
		include "pages/welcome.php";
	} else {
		include "pages/network.php";
	}

?>