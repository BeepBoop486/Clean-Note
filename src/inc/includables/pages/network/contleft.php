<!-- left content -->

<div class="profile-nav col-md-4">

	<div class="panel panel-info">
		<!-- Ppl you may know -->
		<div class="panel-heading">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $lang["Ppl you may know"]; ?></h3>
			</div>
			<div class="panel-body">
				<div class="card">
					<div class="content">
						<ul class="list-unstyled team-members">
							<?php

								$val = 1;
								$cancont = 0;
								$stmt = $conn->prepare("SELECT name FROM users WHERE isadmin=? ORDER BY id ASC LIMIT 3");
								$stmt->bind_param("i", $val);
								$stmt->execute();
								$stmt->store_result();

								$stmt->bind_result($uname);
								while($stmt->fetch()) {
									echo '
									
									<li>
										<div class="row">
											
											<div class="col-xs-3">
												<div class="avatar">
													<img src="/img/pp.jpg" class="img-circle img-no-padding img-responsive">
												</div>
											</div>
											<div class="col-xs-6">
												<a href="/p/'.$uname.'">'.$uname.'</a>
											</div>
											<div class="col-xs-3 text-right">
											</div>

										</div>
									</li>
									
									';
								}

								$stmt->close();

							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- End ppl you may know -->

<!-- end left content -->
