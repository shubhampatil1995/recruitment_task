<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h3>Update Job Post</h3>
		<hr>
		<?php echo $this->Form->create("Recruitment",array('url'=>'/recruitment/edit/'.$data->req_post_id)); ?>
			<div class="col-md-6">
				<?php echo $this->Form->input('job_post', array('type' => 'text','label' => 'Job Post','class' => 'form-control','value'=>$data->job_post,'required'=>'true')); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->input('req_exp', array('type' => 'text','label' => 'Required Experience','class' => 'form-control','value'=>$data->req_exp,'required'=>'true')); ?>
			</div>
			<div class="col-md-6">
				<?php $emptypes=$this->Global->getEmployType();?>
				<?php echo $this->Form->input('emp_type', array('type' => 'select','options' => $emptypes, 'label' => 'Employment Type','class' => 'form-control','value'=>$data->emp_type)); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->input('ctc_pa', array('type' => 'text','label' => 'CTC Per Annum','class' => 'form-control','value'=>$data->ctc_pa,'required'=>'true')); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->input('job_desc', array('type' => 'textarea','label' => 'Job Description','class' => 'form-control','value'=>$data->job_desc,'required'=>'true')); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->input('skills_req', array('type' => 'textarea','label' => 'Skills  Required','class' => 'form-control','value'=>$data->skills_req,'required'=>'true')); ?>
			</div>
			<div class="col-md-6">
				<?php $getquali=$this->Global->getQualification();?>
				<?php echo $this->Form->input('qualification', array('type' => 'text','label' => 'Educational Qualification','class' => 'form-control','value'=>$data->qualification,'required'=>'true')); ?>
			</div>
			<div class="col-md-6 text-right btn_div">
			<br/><br/>
				<?php echo $this->Form->button('Update',array('type' => 'submit','class' => 'btn btn-success'));?>
				<?php echo $this->Form->button('Cancel',array('type' => 'submit','class' => 'btn btn-default'));?>
			</div>
		<?php echo $this->Form->end();	?>
	</div>
	<div class="col-md-2"></div>
</div>