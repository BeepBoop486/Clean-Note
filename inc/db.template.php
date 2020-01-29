<?php

	session_start();
	$conn = mysqli_connect("host", "user", "password", "db_name");
	if(!$conn) {
		echo "There's been an error trying to connect to the Database";
	}

?>
