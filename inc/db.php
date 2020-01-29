<?php

	session_start();
	$conn = mysqli_connect("localhost", "root", "gtaindrive", "clean");
	if(!$conn) {
		echo "There's been an error trying to connect to the Database";
	}

?>
