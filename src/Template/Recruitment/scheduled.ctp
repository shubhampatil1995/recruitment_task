<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Scheduled Interviews</h3>
			<hr>
			<table class="table table-bordered">
				<tr>
					<th class="text-center">SL No.</th>
					<th class="text-center">Job Post</th>
					<th class="text-center">Applicants Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Mobile No.</th>
					<th class="text-center">Qualification</th>
					<th class="text-center">Interview Date</th>
					<th class="text-center">Interview Timing</th>
					<th class="text-center">Resume</th>
					<th class="text-center">Interview Ratings</th>
				</tr>
				<?php if(!empty($scheduled)) {
						$i=0; foreach ($scheduled as $row): $i++; ?>
					<tr>
						<td class="text-center"><?= $i; ?></td>
						<td> <?= $row->recruitment->job_post; ?></td>
						<td> <?= $row->applicant->first_name.' '.$row->applicant->last_name; ?> </td>
						<td> <?= $row->applicant->email; ?> </td>
						<td> <?= $row->applicant->mobile_no; ?> </td>
						<td> <?= $row->applicant->qualification; ?> </td>
						<td> <?= date('d-M-Y',strtotime($row->interview_date)); ?> </td>
						<td> <?= $row->interview_time; ?> </td>
						<td class="link_button text-center"> <?= $this->Html->link('Download', ['controller' => 'Recruitment', 'action' => 'download',$row->applicant->applicant_id]) ?> </td>
						<td class="link_button text-center">
						<span class="span_button" onclick="schedule_interview('<?= $row->applicant->first_name." ".$row->applicant->last_name; ?>','<?= $row->schedule_id ?>')">Rate</span></td>
					</tr>
				<?php endforeach; 
					}
					else{
					?>
					<tr><td colspan="10" class="text-center"><h5>There are no Scheduled Interviews.</h5></td></tr>
				<?php	}
				?>
			</table>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<script>
	function schedule_interview(name,schedule_id)
	{
		document.getElementById("myNav").style.width = "100%";
		$('#applicant-name').val(name);
		$('#schedule-id').val(schedule_id);
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
		<?php echo $this->Form->create("applynow",array('type'=>'file','url'=>"/scheduled")); ?>
			<div class="col-md-12">	
				<h4>Interview Ratings</h4>
			</div>
			<div class="col-md-12">
				<?php echo $this->Form->input('schedule_id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->input('applicant_name', array('type' => 'text','label' => 'Applicants Name','class' => 'form-control','readonly'=>'true')); ?>
			</div>
			<div class="col-md-12">
				<?php $intstatus=$this->Global->getInterviewStatus();?>
				<?php echo $this->Form->input('interview_status', array('type' => 'select','options' => $intstatus, 'label' => 'Interview Status','class' => 'form-control','required'=>'true')); ?>
			</div>
			<div class="col-md-12">
				<?php $intratings=$this->Global->getInterviewRatings();?>
				<?php echo $this->Form->input('interview_ratings', array('type' => 'select','options' => $intratings, 'label' => 'Interview Rating','class' => 'form-control','required'=>'true')); ?>
			</div>
			<div class="col-md-12">
				<?php echo $this->Form->input('summary', array('type' => 'textarea','label' => 'Interview Summary','class' => 'form-control','required'=>'true')); ?>
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