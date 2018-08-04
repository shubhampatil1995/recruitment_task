<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3>Current Openings</h3>
			<hr>
			<table class="table table-bordered">
				<?php 
					$emptype=$this->Global->getEmployType();
					$i=0; foreach ($result as $row): 
					$i++;
				?>
				<div class="main_wrapper" >
					<div class="inside_content" id="post_<?php echo $i;?>">
						<div class="title">
							<h3><?= $row->job_post; ?></h3>
						</div>
						<div class="row exp_ctc_row">
							<div class="col-md-3">
								<span class="req_title">Required Experience</span><br/><?= $row->req_exp; ?> Years
							</div>
							<div class="col-md-3">
								<span class="req_title">Required Qualification</span><br/><?= $row->qualification; ?>
							</div>
							<div class="col-md-3">
								<span class="req_title">CTC Per Annum</span><br/>RS. <?= $row->ctc_pa; ?>
							</div>
							<div class="col-md-3">
								<span class="req_title">Employment Types</span><br/><?= $emptype[$row->emp_type]; ?>
							</div>
						</div>
						<div class="job_desc">
							<h4>Job Description</h4>
							<p><?= $row->job_desc; ?></p>
						</div>
						<div class="job_skills">
							<h4>Skills Required</h4>
							<p><?= $row->skills_req; ?></p>
						</div>
						<div class="button_div">
								<?php echo $this->Html->link('Apply Now',array(
									'controller' => 'career',
									'action' => 'applynow',$row->req_post_id), ['class' => 'btn btn-primary']); 
								?>
						</div>
					</div>
					<div class="readmore" id="read_more_<?php echo $i;?>">
						<a onclick="display_full('<?php echo $i;?>')" id="display_more_<?php echo $i?>"><h5>Read More</h5></a>
						<a onclick="display_less('<?php echo $i;?>')" class="display_less" id="display_less_<?php echo $i;?>"><h5>Display Less</h5></a>
					</div>
				</div>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.display_less').hide();
	});
	function display_full(id)
	{
		$('#post_'+id).removeClass('display_less');
		$('#post_'+id).addClass('display_more');
		$('#display_more_'+id).hide();
		$('#display_less_'+id).show();
	}
	
	function display_less(id)
	{
		$('#post_'+id).removeClass('display_more');
		$('#post_'+id).addClass('display_less');
		$('#display_less_'+id).hide();
		$('#display_more_'+id).show();
	}
</script>
<style>
	.display_more
	{
		height:auto;
	}
	.display_less
	{
		height:90px;
	}
</style>