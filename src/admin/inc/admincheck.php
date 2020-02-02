<?php 

	include $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';

	if (isset($_SESSION["uid"])) {
		$stmt = $conn->prepare("SELECT isadmin FROM users WHERE name=?");
		$stmt->bind_param("s", $_SESSION["name"]);
		$stmt->execute();
		$stmt->bind_result($amiadmin);
		$stmt->fetch();
		if ($amiadmin != 1) {
			echo '<script>window.location.href="/"</script>';
		}
		$stmt->close();
	} else {
		echo '<script>window.location.href="/"</script>';
	}

 ?>