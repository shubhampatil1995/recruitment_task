<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3>Post Job Post</h3>
			<hr>
			<?php echo $this->Form->create("Recruitment",array('url'=>'/recruitment/add')); ?>
				<div class="col-md-6">
					<?php echo $this->Form->input('job_post', array('type' => 'text','label' => 'Job Post','class' => 'form-control','placeholder'=>'Job Post','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('req_exp', array('type' => 'text','label' => 'Required Experience','class' => 'form-control','placeholder'=>'Experience Required','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php $emptypes=$this->Global->getEmployType();?>
					<?php echo $this->Form->input('emp_type', array('type' => 'select','options' => $emptypes, 'label' => 'Employment Type','class' => 'form-control','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('ctc_pa', array('type' => 'text','label' => 'CTC Per Annum','class' => 'form-control','placeholder'=>'CTC Per Annum','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('job_desc', array('type' => 'textarea','label' => 'Job Description','class' => 'form-control','placeholder'=>'Job Description','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('skills_req', array('type' => 'textarea','label' => 'Skills  Required','class' => 'form-control','placeholder'=>'Required Skills for Job','required'=>'true')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('qualification', array('type' => 'text','label' => 'Educational Qualification','class' => 'form-control','placeholder'=>'Educational Qualification','required'=>'true')); ?>
				</div>
				<div class="col-md-6 text-right">
					<br/><div style="height:10px;"></div>
					<?php echo $this->Form->button('Save',array('type' => 'submit','class' => 'btn btn-success'));?>
				</div>
			<?php echo $this->Form->end();	?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>