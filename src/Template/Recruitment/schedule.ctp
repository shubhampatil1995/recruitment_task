<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<tr>
					<th class="text-center">SL No.</th>
					<th class="text-center">Applicants Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Mobile No.</th>
					<th class="text-center">Qualification</th>
					<th class="text-center">Total Experience</th>
					<th class="text-center">Skills</th>
					<th class="text-center">Resume</th>
					<th class="text-center">Schedule Interview</th>
				</tr>
				<?php 
					if(isset($applicants)) {
					$i=0; foreach ($applicants as $row): $i++; ?>
					<tr>
						<td><?= $i; ?></td>
						<td> <?= $row->first_name.' '.$row->last_name; ?> </td>
						<td> <?= $row->email; ?> </td>
						<td> <?= $row->mobile_no; ?> </td>
						<td> <?= $row->qualification; ?> </td>
						<td> <?= $row->total_experience; ?> </td>
						<td> <?= $row->skills; ?> </td>
						<td class="link_button text-center"> <?= $this->Html->link('Download', ['controller' => 'Recruitment', 'action' => 'download',$row->applicant_id]) ?> </td>
						<td class="link_button text-center">
						<?= $this->Html->link('Schedule', '', ['onclick' => 'schedule_interview('.$row->applicant_id.','.$row->job_application_id.')'])?><span style="font-size:30px;cursor:pointer" onclick="schedule_interview('<?= $row->applicant_id ?>','<?= $row->job_application_id;?>')">&#9776; open</span></td>
					</tr>
				<?php endforeach; }
					else{
					?>
					<tr><td colspan="9" class="text-center"><h5>There are not Applicants for the Job.</h5></td></tr>
				<?php	} ?>
			</table>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<script>
	function schedule_interview(applicant_id,job_application_id)
	{
		document.getElementById("myNav").style.width = "100%";
		$('#job-application-id').val(job_application_id);
		$('#applicant-id').val(applicant_id);
	}
</script>
<script>
	function closeNav() {
		document.getElementById("myNav").style.width = "0%";
	}
</script>
<div id="myNav" class="overlay">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<div class="overlay-content col-md-6">
		<?php echo $this->Form->create("applynow",array('type'=>'file','url'=>"/schedule")); ?>
			<div class="col-md-12">	
				<h4>Schedule Interview</h4>
			</div>
			<div class="col-md-12">
				<?php echo $this->Form->input('job_application_id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->input('applicant_id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->input('interview_date', array('type' => 'text','label' => 'Interview Date','class' => 'form-control')); ?>
			</div>
			<div class="col-md-12">
				<?php echo $this->Form->input('interview_time', array('type' => 'text','label' => 'Interview Time','class' => 'form-control')); ?>
			</div>
			<div class="col-md-12">
				<br/><br/>
				<?php echo $this->Form->button('Save',array('type' => 'submit','class' => 'btn btn-success'));?>
			</div>
		<?php echo $this->Form->end();	?>
	</div>
</div>

<script type="text/javascript">
	$('#interview-time').timepicker({
		template: false,
		showInputs: false,
		minuteStep: 5
	});
	$('#interview-date').datepicker({
		format: 'mm/dd/yyyy',
		startDate: 0
	});
</script>