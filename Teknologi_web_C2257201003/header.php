<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='description' content='Aplikasi Menu Nakaya Caffe'>
	<meta name='author' content='Muhammad Chova Redira Ramadhana'>

	<title>Aplikasi Menu Nakaya Cafe</title>

	<link rel='stylesheet' href='aset/library/paper.min.css'>
	
	<style>
		h1, h2, h3, h4, h5, h6 { margin: 0; }
		.mb0 { margin-bottom: 0; }
	</style>
</head>

<body>

<div id="top"></div>

<div class="container container-md">
	<div class="row flex-center">
		<div class="text-center">
			<a href="index.php" class="text-primary">
				<h1>MENU NAKAYA CAFE</h1>
			</a>
			<h4>Portal informasi menu Nakaya Cafe</h4>
		</div>
	</div>
	
	<p class="text-center text-success">
		<?php echo tampilkanWaktu(); ?>
	</p>
	
	<hr><br><br>
	
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>