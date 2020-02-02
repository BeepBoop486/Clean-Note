<?php 

	include '../checkmod.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $globals["SITE_NAME"]; ?></title>
	<meta charset="utf-8">

	<meta name="description" content="<?php echo $globals['SITE_DESC']; ?>">
	<meta name="keywords" content="<?php echo $globals['SITE_TAGS']; ?>">
	<meta name="author" content="<?php echo $globals['SITE_AUTH']; ?>">

	<link rel="stylesheet" type="text/css" href="/usrs/admin/css/sb-admin.css">
</head>
<body>

	<div id="wrapper">
		<?php 

			include 'comp/sidebar.php';
			include 'comp/content.php';

		 ?>
	</div>

</body>
</html>