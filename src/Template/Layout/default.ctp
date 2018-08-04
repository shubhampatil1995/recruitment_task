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
	<?= $this->Html->css('bootstrap-timepicker.min.css') ?>
	<?= $this->Html->css('bootstrap-datepicker.min.css') ?>
	
	<?= $this->Html->script('jquery.min.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('bootstrap-timepicker.min.js') ?>
	<?= $this->Html->script('bootstrap-datepicker.min.js') ?>	
		
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?php $action=$this->request->getParam('action'); ?>
    <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">Recruitment</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			  <li class="<?php echo ($action=='index')?'active':'';?>"><a href="index">Home</a></li>
			  <li class="<?php echo ($action=='add')?'active':'';?>"><a href="add">Add Recruitment</a></li>
			  <li class="<?php echo ($action=='view')?'active':'';?>"><a href="view">List Recruitment</a></li>
			  <li class="<?php echo ($action=='applicants')?'active':'';?>"><a href="applicants">Job Applicants</a></li>
			  <li class="<?php echo ($action=='scheduled')?'active':'';?>"><a href="scheduled">Scheduled Interviews</a></li>
			  <li class="<?php echo ($action=='selected')?'active':'';?>"><a href="selected">Shortlisted Candidate</a></li>
			  <li class="<?php echo ($action=='logout')?'active':'';?>"><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

    <div class="container clearfix">
		<div class="col-md-12">
			<?= $this->fetch('content') ?>
		</div>
	</div>
</body>
</html>
