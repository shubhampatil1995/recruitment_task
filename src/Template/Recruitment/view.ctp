<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php  $emptypes=$this->Global->getEmployType(); ?>
			<h3>Current Recruitments</h3>
			<hr/>
			<table class="table table-bordered">
				<tr>
					<th class="text-center">SL No.</th>
					<th class="text-center">Job Post</th>
					<th class="text-center">Req. Experience</th>
					<th class="text-center">Employment Type</th>
					<th class="text-center">CTC</th>
					<th class="text-center">Job Description</th>
					<th class="text-center">Skills Req.</th>
					<th class="text-center">Qualification</th>
					<th class="text-center">Action</th>
				</tr>
				<?php $i=0; foreach ($recruitment as $row): 
						$i++;
					?>
					<tr>
						<td class="text-center"><?= $i; ?></td>
						<td> <?= $row->job_post; ?> </td>
						<td> <?= $row->req_exp; ?> </td>
						<td> <?= $emptypes[$row->emp_type]; ?> </td>
						<td> <?= $row->ctc_pa; ?> </td>
						<td> <?= $row->job_desc; ?> </td>
						<td> <?= $row->skills_req; ?> </td>
						<td> <?= $row->qualification; ?> </td>
						<td class="link_button text-center"><?= $this->html->link('Edit',['action'=> 'edit',$row->req_post_id]);?>&nbsp;&nbsp;&nbsp;<?= $this->html->link('Delete',['action'=> 'deleteRecord',$row->req_post_id]);?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<style>
	.page_link{
		text-align:right;
	}
	.page_link li
	{
		background:#EFF0F1;
		font-size:14px;
		border:1px solid #D6D9DC;
		list-style:none;
		padding:6px 10px;
		float:left;
		color:#D6D9DC;
		font-weight:bold;
		text-align:center;
	}
</style>