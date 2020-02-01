<?php

	if(isset($_POST["psubmit"])) {

		$post_content = str_replace(chr(10), "\n", $_POST["topostpostcontent"]);
		$post_uploader = $_SESSION["name"];
		$post_date = date("d/m/Y");

		if($post_content) {
			//If post_content ain't blank
			$stmt = $conn->prepare("INSERT INTO posts(post_content, post_uploader, post_date) VALUES(?,?,?)");
			$stmt->bind_param("sss", $post_content, $post_uploader, $post_date);
			if(!$stmt->execute()) {
				die($lang["There's been an error trying to post"]);
			}
			$stmt->close();
		}

	}

?>
