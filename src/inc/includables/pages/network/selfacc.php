<div class="row text-center cover-container">
	<a href="/p/<?php echo $_SESSION['name']; ?>">
		<img src="/img/pp.jpg">
	</a>
	<h1 class="profile-name"><?php echo $_SESSION["name"]; ?></h1>
	<p class="user-text">
		<?php

			$stmt = $conn->prepare("SELECT bio FROM users WHERE name=?");
			$stmt->bind_param("s", $_SESSION["name"]);
			$stmt->execute();
			$stmt->bind_result($selfbio);
			$stmt->fetch();
			$stmt->close();

			echo $selfbio;

		?>
	</p>
</div>