<nav class="navbar navbar-default navbar-fixed-top navbar-principal">

	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
         		</button>

			<a class="navbar-brand" href="/">
				<b><?php echo $globals["SITE_NAME"]; ?></b>
			</a>

		</div>

		<div id="navbar" class="collapse navbar-collapse">
			
			<div class="col-md-5 col-sm-5">
				<form class="navbar-form" method="GET" action="/s">
					<div class="form-group" style="display: inline;">
						<div class="input-group" style="display: table;">
							<input class="form-control" name="query" placeholder="<?php echo $lang["Search..."]; ?>" autocomplete="off" type="text">
							<span class="input-group-addon" style="width: 1%;">
								<span class="glyphicon glyphicon-search"></span>
							</span>
						</div>
					</div>
				</form>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<!-- TODO: Go to the profile AND PP Preview -->
					<a href="/p/<?php echo $_SESSION['name'];?>"><?php echo $_SESSION["name"]; ?></a>
				</li>
				<li>
					<a href="/"><?php echo $lang["Home"]; ?></a>
				</li>
				<li>
					<!-- TODO: Messages -->
					<a href="#">
						<i class="fa fa-comments"></i>
					</a>
				</li>
				<li>
					<?php if(isset($_SESSION["admin"])) : ?>
						<a href="/admin">
							Admin panel
						</a>
					<?php endif; ?>
				</li>
				<li>
					<!-- TODO: logout -->
					<a href="/logout">
						<?php echo $lang["Logout"]; ?>
					</a>
				</li>
			</ul>
		</div>

	</div>

</nav>
