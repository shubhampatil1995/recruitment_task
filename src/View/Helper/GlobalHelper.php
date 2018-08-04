<?php
	namespace App\View\Helper;

	use Cake\View\Helper;
	use Cake\View\View;

	class GlobalHelper extends Helper 
	{
		public function getEmployType() 
		{
			$emptypes=array(''=>'-- Please Select--','1'=>'Internship','2'=>'Part Time','3'=>'Full Time');
			return $emptypes;
		}
		
		public function getQualification() 
		{
			$quali=array(''=>'-- Please Select--','1'=>'SSLC','2'=>'PUC','3'=>'Graduation','4'=>'Post Graduation');
			return $quali;
		}
		
		public function getFileExt($filename) 
		{ 
			$filename = strtolower($filename) ; 
			$exts = split("[/\\.]", $filename) ; 
			$n = count($exts)-1; 
			$exts = $exts[$n]; 
			return $exts; 
		}

		public function getInterviewStatus() 
		{
			$emptypes=array(''=>'-- Please Select--','1'=>'Selected','2'=>'Rejected','3'=>'On-Hold');
			return $emptypes;
		}
		
		public function getInterviewRatings() 
		{
			$emptypes=array(''=>'-- Please Select--','1'=>'Very Poor','2'=>'Poor','3'=>'Good','4'=>'Very Good','5'=>'Excellent');
			return $emptypes;
		}
	}
?>
