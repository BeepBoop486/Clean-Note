<div class="row welcome">
	<div class="login-page">

		<div class="row">

			<div class="col-md-4 col-md-offset-4">
				<img src="/img/prism.png">
				<h1>CleanNote</h1>
				<form class="frm animated fadeInRight" method="POST" role="form" action="/usrs/index.php">
					<div class="form-content">

						<div class="form-group">
							<input class="form-control input-underline input-lg" type="text" placeholder="<?php echo $lang["Username..."]; ?>" name="pname">
						</div>

						<div class="form-group">
							<input class="form-control input-underline input-lg" type="password" placeholder="<?php echo $lang["Password..."]; ?>" name="ppass">
						</div>

					</div>

					<input type="submit" name="login" value="<?php echo $lang["Log in"]; ?>" class="btn btn-info btn-lg">
					<input type="submit" name="register" value="<?php echo $lang["Signup"]; ?>" class="btn btn-info btn-lg">

				</form>
			</div>

		</div>

	</div>
</div>
