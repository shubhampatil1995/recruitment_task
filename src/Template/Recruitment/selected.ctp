<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php
			$intratings=$this->Global->getInterviewRatings();
			
			if(!empty($data['selected'])) {
		?>
			<h3>Selected Candidates</h3>
			<table class="table table-bordered">
				<tr>
					<th class="text-center">SL No.</th>
					<th class="text-center">Job Post</th>
					<th class="text-center">Applicants Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Mobile No.</th>
					<th class="text-center">Interview Rating</th>
					<th class="text-center">Summary</th>
				</tr>
				<?php 
					$i=0; foreach($data['selected'] as $row): $i++; ?>
					<tr>
						<td class="text-center"><?= $i; ?></td>
						<td> <?= $row->recruitment->job_post; ?></td>
						<td> <?= $row->applicant->first_name.' '.$row->applicant->last_name; ?> </td>
						<td> <?= $row->applicant->email; ?> </td>
						<td> <?= $row->applicant->mobile_no; ?> </td>
						<td> <?= $intratings[$row->interview_ratings]; ?> </td>
						<td> <?= $row->summary; ?> </td>
					</tr>
				<?php endforeach; 
				?>
			</table>
			<?php 	} ?>
			<hr/>
			<?php
			if(!empty($data['on_hold'])) {
			?>
			<h3>Candidates On Hold</h3>
			<table class="table table-bordered">
				<tr>
					<th class="text-center">SL No.</th>
					<th class="text-center">Job Post</th>
					<th class="text-center">Applicants Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Mobile No.</th>
					<th class="text-center">Interview Rating</th>
					<th class="text-center">Summary</th>
				</tr>
				<?php 
					$i=0; foreach($data['on_hold'] as $row): $i++; ?>
					<tr>
						<td class="text-center"><?= $i; ?></td>
						<td> <?= $row->recruitment->job_post; ?></td>
						<td> <?= $row->applicant->first_name.' '.$row->applicant->last_name; ?> </td>
						<td> <?= $row->applicant->email; ?> </td>
						<td> <?= $row->applicant->mobile_no; ?> </td>
						<td> <?= $intratings[$row->interview_ratings]; ?> </td>
						<td> <?= $row->summary; ?> </td>
					</tr>
				<?php endforeach; 
				?>
			</table>
			<?php 	} ?>
		</div>
	</div>
</div>