<?php 

	include '../../inc/db.php';

	if (isset($_POST["followed_id"]) && isset($_SESSION["uid"])) {
		$followed_id = $_POST["followed_id"];
		$follower_id = $_SESSION["uid"];

		$success = 0;
		$alreadyfollowed = 0;

		$stmt = $conn->prepare("SELECT * FROM follows WHERE follower_id=? AND followed_id=?");
		$stmt->bind_param("ii", $follower_id, $followed_id);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$alreadyfollowed = 1;
			$success = 0;
		} else {
			$alreadyfollowed = 0;
		}
		$stmt->close();

		if ($alreadyfollowed == 0) {
			$stmt = $conn->prepare("INSERT INTO follows(follower_id,followed_id) VALUES(?,?)");
			$stmt->bind_param("ii", $follower_id, $followed_id);
			if ($stmt->execute()) {
				$success = 1;
			} else {
				$success = 0;
			}
			$stmt->close();
		} else {
			$success = 0;
		}

		echo $success;
	}

 ?>