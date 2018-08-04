<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;
	use Cake\Validation\Validator;

	class InterviewschedulesTable extends Table
	{
		public function initialize(array $config)
		{
			$this->belongsTo('Recruitment')->setForeignKey('application_id');
			$this->belongsTo('Applicants')->setForeignKey('applicant_id');
		}
	}

?>