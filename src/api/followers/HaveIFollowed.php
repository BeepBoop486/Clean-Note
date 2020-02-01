<?php 

	include '../../inc/db.php';

	if (isset($_POST["followed_id"]) || isset($_POST["uid"])) {
		$followed_id = $_POST["followed_id"];
		$follower_id = $_SESSION["uid"];

		$haveifollowed = 0;

		$stmt = $conn->prepare("SELECT * from follows WHERE follower_id=? AND followed_id=?");
		$stmt->bind_param("ii", $follower_id, $followed_id);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows > 0) {
			$haveifollowed = 1;
		} else {
			$haveifollowed = 0;
		}
		$stmt->close();

		echo $haveifollowed;
	}

 ?>