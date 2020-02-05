<?php

	include "../inc/db.php";

	$pname = $_POST["pname"];
	$ppass = $_POST["ppass"];

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
		$stmt1->bind_result($dbid, $dbname, $dbpass, $bio, $regdate, $fname, $lname, $country, $bday, $occupation, $mail, $phonen, $isadmin);
		while($stmt1->fetch()) {
			$dbpass = $dbpass;
		}
		$stmt1->close();

		if($canlogin) {
			if(password_verify($ppass, $dbpass)) {
				$_SESSION["name"] = $pname;
				$_SESSION["uid"] = $dbid;

				if ($isadmin == 1) {
					$_SESSION["admin"] = $isadmin;
				}

				echo '<script>window.location.href = "/"</script>';
			} else {
				echo "Your password is wrong";
			}
		} else {
			echo "This username doesn't exist";
		}
	}

?>
