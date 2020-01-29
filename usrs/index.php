<?php

	include "../inc/db.php";

	$pname = $_POST["pname"];
	$ppass = $_POST["ppass"];

	if(isset($_POST["register"])) {
		$finalpass = password_hash($ppass, PASSWORD_BCRYPT);
		$canregister = 0;

		if($stmt1 = $conn->prepare("SELECT * FROM users WHERE name=?")) {
			$stmt1->bind_param("s", $pname);
			$stmt1->execute();
			$stmt1->store_result();
			if($stmt1->num_rows > 0) {
				$canregister = 0;
			} else {
				$canregister = 1;
			}
			$stmt1->close();
		}

		if($canregister == 1) {

			//Some other nedded parameters
			$defbio = "¡Hi there!. I'm using CleanNote";
			$regdate = date("d/m/Y");

			$stmt = $conn->prepare("INSERT INTO users(name, pass, bio, regdate) VALUES(?,?,?,?)");
			$stmt->bind_param("ssss", $pname, $finalpass, $defbio, $regdate);
			if($stmt->execute()) {
				echo '<script>window.location.href = "/"</script>';
			} else {
				echo "There's been an error creating an account " . $conn->errno . " " . $conn->error;
			}
			$stmt->close();
		} else {
			echo "The username you've entered already exists";
		}
	}

	if(isset($_POST["login"])) {

		$canlogin = 0;

		$stmt1 = $conn->prepare("SELECT * FROM users WHERE name=?");
		$stmt1->bind_param("s", $pname);
		$stmt1->execute();
		$stmt1->store_result();
		if($stmt1->num_rows > 0) {
			$canlogin = 1;
		} else {
			$canlogin = 0;
		}
		$stmt1->bind_result($dbid, $dbname, $dbpass, $bio, $regdate);
		while($stmt1->fetch()) {
			$dbpass = $dbpass;
		}
		$stmt1->close();

		if($canlogin) {
			if(password_verify($ppass, $dbpass)) {
				$_SESSION["name"] = $pname;
				echo '<script>window.location.href = "/"</script>';
			} else {
				echo "Your password is wrong";
			}
		} else {
			echo "This username doesn't exist";
		}
	}

?>
