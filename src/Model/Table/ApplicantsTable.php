<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;
	use Cake\Validation\Validator;

	class ApplicantsTable extends Table
	{
		public function initialize(array $config)
		{
			$this->belongsTo('Recruitment')->setForeignKey('job_application_id');
		}
	}

?>