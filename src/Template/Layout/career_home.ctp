<?php
$cakeDescription = 'Recruitment - Admin';
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
			<?= $cakeDescription ?>:
			<?= $this->fetch('title') ?>
		</title>
		<?= $this->Html->meta('icon') ?>

		<?= $this->Html->css('bootstrap.css') ?>
		<?= $this->Html->css('font-awesome.css') ?>
		<?= $this->Html->css('ionicons.css') ?>
		<?= $this->Html->css('my_style.css') ?>
		
		<?= $this->Html->script('bootstrap.min.js') ?>
		<?= $this->Html->script('jquery.min.js') ?>
		<?= $this->Html->script('https://code.jquery.com/jquery-1.12.4.js') ?> 
		<?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') ?> 
		<?= $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') ?>
			
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Recruitment</a>
				</div>
			</div>
		</nav>
		<div class="container clearfix">
			<div class="col-md-12">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</body>
</html>