<?php 

	include '../../inc/db.php';

	if (isset($_POST["followed_id"]) && isset($_SESSION["uid"])) {
		$followed_id = $_POST["followed_id"];
		$follower_id = $_SESSION["uid"];

		$doifollow = 0;
		$success = 0;

		$stmt = $conn->prepare("SELECT * FROM follows WHERE follower_id=? AND followed_id=?");
		$stmt->bind_param("ii", $follower_id, $followed_id);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$doifollow = 1;
		} else {
			$doifollow = 0;
			$success = 0;
		}
		$stmt->close();

		if ($doifollow == 1) {
			$stmt = $conn->prepare("DELETE FROM follows WHERE follower_id=? AND followed_id=?");
			$stmt->bind_param("ii", $follower_id, $followed_id);
			if ($stmt->execute()) {
				$success = 1;
			}
			$stmt->close();
		}
		
		echo $success;
	}

 ?>