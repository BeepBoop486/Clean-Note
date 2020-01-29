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
				<b>Clean-Note</b>
			</a>

		</div>

		<div id="navbar" class="collapse navbar-collapse">
			<!-- TODO: Search box -->
			<ul class="nav navbar-nav navbar-right">
				<li>
					<!-- TODO: Go to the profile AND PP Preview -->
					<a href=""><?php echo $_SESSION["name"]; ?></a>
				</li>
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<!-- TODO: Messages -->
					<a href="#">
						<i class="fa fa-comments"></i>
					</a>
				</li>
				<li>
					<!-- TODO: logout -->
					<a href="/usrs/logout.php">
						Logout
					</a>
				</li>
			</ul>
		</div>

	</div>

</nav>

<div class="row text-center cover-container">
	<a href="#">
		<img src="/img/pp.jpg">
	</a>
	<h1 class="profile-name"><?php echo $_SESSION["name"]; ?></h1>
	<p class="user-text">
		¡Hi there!. I'm using Clean-Note
	</p>
</div>
