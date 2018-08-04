<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php echo $this->Form->create("Login",array('url'=>'/login/index')); ?>
			<div class="col-md-12 login_wrapper">
				<div class="login_title">
					<h3>Sign In</h3>
					<?= $this->Flash->render('flash');?>
				</div>
				<div class="col-md-12 login_rows">
					<?php echo $this->Form->input('username', array('type' => 'text','label' => 'Username','class' => 'form-control','placeholder'=>'Username','required'=>'true')); ?>
				</div>
				<div class="col-md-12 login_rows">
					<?php echo $this->Form->input('password', array('type' => 'password','label' => 'Password','class' => 'form-control','placeholder'=>'Password','required'=>'true')); ?>
				</div>
				<div class="col-md-12 login_rows text-center">
					<?php echo $this->Form->button('SignIn',array('type' => 'submit','class' => 'btn btn-primary'));?>
				</div>
			</div>
			<?php echo $this->Form->end();	?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
