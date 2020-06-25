<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Administrator</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
</head>
<body>
	<div class="container">

<h2>Selamat datang <?php echo $this->nativesession->get('username'); ?></h2>
<a href="<?php echo base_url() ?>index.php/login/logout">Logout</a>
	</div>
</body>
</html>