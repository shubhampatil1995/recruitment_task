<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h3>To Apply for this Job Please Provide Your Details </h3>
			<hr>
			<?php echo $this->Form->create("applynow",array('type'=>'file','url'=>"/career/applynow/$id")); ?>
				<div class="col-md-6">
					<?php echo $this->Form->input('first_name', array('type' => 'text','label' => 'First Name','class' => 'form-control','required'=>'true','pattern'=>"[A-Za-z]{3,20}",'title'=>"Use Only Characters. Limit 20","placeholder"=>'First Name')); ?>
					
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('last_name', array('type' => 'text','label' => 'Last Name','class' => 'form-control','required'=>'true','pattern'=>"[A-Za-z]{3,20}",'title'=>"Use Only Characters","placeholder"=>'Last Name')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('email', array('type' => 'text','label' => 'EmailId','class' => 'form-control','required'=>'true','pattern'=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$",'title'=>"Provide Valid Email Address","placeholder"=>'Email')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('mobile_no', array('type' => 'text','label' => 'Mobile No','class' => 'form-control','required'=>'true','pattern'=>"[56789]{1}[0-9]{9}",'title'=>"Enter Valid Mobile Number","placeholder"=>'Mobile No')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('total_experience', ['type' => 'text','label' => 'Total Experience','class' => 'form-control','required'=>'true','pattern'=>"[a-zA-Z0-9 -]{1,30}",'title'=>"Use Only Characters, Numbers","placeholder"=>'Total Experience']); ?>
				</div>
				
				<div class="col-md-6">
					<?php echo $this->Form->input('qualification', array('type' => 'text','label' => 'Educational Qualification','class' => 'form-control','required'=>'true','pattern'=>"[a-zA-Z .]{2,70}",'title'=>"Use Only Characters","placeholder"=>'Qualification')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('skills', array('type' => 'textarea','label' => 'Skills','class' => 'form-control','required'=>'true',"placeholder"=>'Skills')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('resume_name', ['type' => 'file', 'class' => 'form-control','required'=>'true']); ?>
				</div>
				<div class="col-md-6 text-right">
					<br/><div style="height:10px;"></div>
					<?php echo $this->Form->button('Save',array('type' => 'submit','class' => 'btn btn-success'));?>
				</div>
				
			<?php echo $this->Form->end();	?>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>