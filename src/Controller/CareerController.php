<?php

namespace App\Controller;

class CareerController extends AppController
{
	public $helpers = array('Global');
	
	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
    public function index()
    {
		$this->loadModel('Recruitment'); 
		$query = $this->Recruitment->find('all',array('conditions' => array('is_deleted = 0')));
		$result=iterator_to_array($query);
  
		$this->layout= 'career_home';
        $this->set('result',$result);
    }
	
	public function applynow($id)
	{
		$this->loadModel('Applicants'); 
		if($this->request->is('post')) {
					
			//$fileName = $this->request->data['resume_name']['name'];
			//$extension=$this->Global->getFileExt('Recruitment_roject.docx');
			
			$file_nm = $this->request->data['resume_name']['name']; 
			$extension = pathinfo($file_nm, PATHINFO_EXTENSION);
			
			$fileName = date('Ymdhis') .".". $extension;
            $uploadPath = 'uploads/';
            $uploadFile = $uploadPath.$fileName;
            if(move_uploaded_file($this->request->data['resume_name']['tmp_name'],$uploadFile)){
				$applicants = $this->Applicants->newEntity();
				
				$applicants->job_application_id = $id;
				$applicants->first_name = $this->request->data['first_name'];
				$applicants->last_name = $this->request->data['last_name'];
				$applicants->email = $this->request->data['email'];
				$applicants->mobile_no = $this->request->data['mobile_no'];
				$applicants->total_experience = $this->request->data['total_experience'];
				$applicants->qualification = $this->request->data['qualification'];
				$applicants->skills = $this->request->data['skills'];
				
				$applicants->resume_name = $fileName;
				$applicants->applied_date = date("Y-m-d H:i:s");
				
				
				if ($this->Applicants->save($applicants)) {
					return $this->redirect(['action' => 'success']);   
				}else{
					$this->Flash->error(__('Unable to upload file, please try again.'));
				}
			
			}
		}
		
		$this->layout= 'career_home';
		$this->set('id',$id);
	}
	
	
	public function success()
    {
		$this->layout= 'career_home';
    }
}
?>