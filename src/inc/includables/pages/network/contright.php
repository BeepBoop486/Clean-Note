<!-- right content -->
<div class="profile-info col-ld-8 animated fadeInRight">
	<div class="panel">

		<form action="/" method="post" enctype="multipart/form-data">
			<textarea class="form-control input-lg p-text-area" placeholder="<?php echo $lang['What\'s in your mind today?']; ?>" rows="2" name="topostpostcontent"></textarea>
			<div class="panel-footer">
				<input type="submit" name="psubmit" class="btn btn-info pull-right" value="Post">

				<ul class="nav nav-pills">
					<!-- TODO: All of this -->
					<li>
				        <a href="#"><i class="fa fa-map-marker"></i></a>
					<li>
						<a href="#"><i class="fa fa-camera"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-film"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-microphone"></i></a>
					</li>
				</ul>

			</div>
		</form>

	</div>
</div>

<!-- Posts -->
<?php

	//TODO: Select posts only from the accounts i follow
	$stmt1 = $conn->prepare("SELECT * FROM posts ORDER BY id DESC"); //For now i'll just select all posts
	if($stmt1->execute()) {
		$stmt1->bind_result($post_id, $post_content, $post_uploader, $post_date);

		while($stmt1->fetch()) {
			echo '

				<script>CheckIfILiked('.$post_id.', '.$_SESSION["uid"].', 1)</script>

				<div class="panel panel-white post panel-shadow">

					<div class="post-heading">
						<div class="pull-left image">
							<img class="avatar" src="/img/pp.jpg">
						</div>
						<div class="pull-left meta">
							<div class="title h5">
				              			<a href="/p/'.$post_uploader.'" class="post-user-name">'.$post_uploader.'</a>
				              			'.$lang["Posted:"].'
				          		</div>
							<h6 class="text-muted time">'.$post_date.'</h6>
						</div>
					</div>

					<div class="post-description">
						<p>'.nl2br($post_content).'</p>
						<a href="/post/'.$post_id.'">'.$lang['Click here for full view'].'</a>
						<div class="stats">
							<a class="stat-item" id="like_button_'.$post_id.'" onclick="CheckIfILiked('.$post_id.', '.$_SESSION["uid"].', 0)"><i class="fa fa-thumbs-up icon"></i> <k id="likes_value_'.$post_id.'"> 0</k></a>
							<a class="stat-item" id="retweet_button_'.$post_id.'"><i class="fa fa-retweet icon"></i></a>
							<a class="stat-item" id="comment_button_'.$post_id.'"><i class="fa fa-comments icon"></i> </a>
						</div>
					</div>

					<div class="post-footer">
						<div class="form-group mx-sm-3 mb-2">
							<input class="form-control add-comment-input" id="comment_box_'.$post_id.'" placeholder="'.$lang["Add a comment"].'">
							<button class="btn btn-primary mb-2" onclick="Comment('.$post_id.')">'.$lang["Comment"].'</button>
						</div>
					</div>

				</div>

			';
		}

	} else {
		echo $lang["There's been an error trying to fetch the posts"];
	}
	$stmt1->close();

?>
<!-- end Posts -->

<!-- end right content -->