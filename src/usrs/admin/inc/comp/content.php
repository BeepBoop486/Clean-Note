<!-- Content -->
<div id="content-wrapper" class="d-flex flex-column">
	<div id="main-content">

		<!-- Navbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="/">Home</a></li>
			</ul>
		</nav>
		<!-- End of navbar -->

		<!-- Container fluid -->
		<div class="container-fluid">

			<!-- Page heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800"><?php echo $lang["Admin Panel"]; ?></h1>
			</div>

			<!-- Content row -->
			<div class="row">

				<!-- Card -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">

								<div class="col-mr-2">
									<?php
										$stmt = $conn->prepare("SELECT * FROM users");
										$stmt->execute();
										$stmt->store_result();
										$total_users = $stmt->num_rows;
										$stmt->close();
									?>
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $lang["Total users: "]; ?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users; ?></div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- End card-->

				<!-- Card -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">

								<div class="col-mr-2">
									<?php
										$stmt = $conn->prepare("SELECT * FROM posts");
										$stmt->execute();
										$stmt->store_result();
										$total_posts = $stmt->num_rows;
										$stmt->close();
									?>
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $lang["Total posts"]; ?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_posts; ?></div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- End card-->

				<!-- Card -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">

								<div class="col-mr-2">
									<?php
										$stmt = $conn->prepare("SELECT * FROM follows");
										$stmt->execute();
										$stmt->store_result();
										$total_follows = $stmt->num_rows;
										$stmt->close();
									?>
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $lang["Total follows"]; ?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_follows; ?></div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- End card-->

				<!-- Card -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">

								<div class="col-mr-2">
									<?php
										$stmt = $conn->prepare("SELECT * FROM likes");
										$stmt->execute();
										$stmt->store_result();
										$total_likes = $stmt->num_rows;
										$stmt->close();
									?>
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo $lang["Total likes"]; ?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_likes; ?></div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- End card-->

			</div>
			<!-- End content row -->

			<?php include "notes.php"; ?>

		<!-- End container fluid -->
		</div>

	</div>
</div>

<!-- End of content -->