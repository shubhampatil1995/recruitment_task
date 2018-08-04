<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class RecruitmentController extends AppController
{
	public $helpers = array('Global');
	
	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
		$this->loadComponent('Paginator');
    }
	
    public function index()
    {
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
        $this->set(compact('Recruitment/index'));
    }
	
	public function add()
    {
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$recruitment = $this->Recruitment->newEntity();
        if($this->request->is('post')) {
           
            $recruitment = $this->Recruitment->patchEntity($recruitment, $this->request->getData());
		
			$recruitment->added_dt=date('Y-m-d');
            if($this->Recruitment->save($recruitment)) 
			{
                return $this->redirect(['action' => 'view']);
            }
        }
	}
	
	public function view()
    {	
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
        $recruitment = $this->Recruitment->find('all',array('conditions' => array('is_deleted = 0')));
		$this->set('recruitment', $this->paginate($recruitment));
	}
	
	public function edit($id)
    {
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$this->loadModel('Recruitment');
        if($this->request->is('post')) 
		{
			$result = $this->Recruitment->get($id);
			
			$result->job_post 		= $this->request->data('job_post');
			$result->req_exp 		= $this->request->data('req_exp');
			$result->emp_type 		= $this->request->data('emp_type');
			$result->ctc_pa 		= $this->request->data('ctc_pa');
			$result->job_desc 		= $this->request->data('job_desc');
			$result->skills_req 	= $this->request->data('skills_req');
			$result->qualification 	= $this->request->data('qualification');
			
			if($this->Recruitment->save($result))
			{
				return $this->redirect(['action' => 'view']);
				
			}else{
				$this->Flash->error('Error!.');
			}
        }else{	
			$result = $this->Recruitment->get($id);
			$this->set('data',$result);
		}
    }
	
	public function deleteRecord($id)
    {
		$this->loadModel('Recruitment');
		$row = $this->Recruitment->get($id);
		$row->is_deleted=1;
		$this->Recruitment->save($row);
		
		return $this->redirect(['action' => 'view']);    
    }
	
	public function applicants()
	{
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$this->loadModel('Applicants'); 
        $applictin = $this->Applicants->find('all',array('conditions' => array('is_scheduled = 0')))->contain(['Recruitment']);
		
		$result=iterator_to_array($applictin);
        $this->set('applicants',$result);
	}
	
	public function download($id) 
	{ 
		$this->loadModel('Applicants'); 
		$applictin = $this->Applicants->get($id);
		//$filePath = WWW_ROOT .'uploads'. DS . $applictin->resume_name;
	
		$filePath='uploads/'.$applictin->resume_name;
		$this->response->file($filePath ,array('download'=> true, 'name'=> $applictin->resume_name));
		return $this->response;
	}
	
	public function schedule()
    {
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$this->loadModel('Interviewschedules');
		$this->loadModel('Applicants');
		
		$interview = $this->Interviewschedules->newEntity();
		
		if($this->request->is('post')) {
			$interview->interview_date = date("Y-m-d", strtotime($this->request->data['interview_date']));
			$interview->interview_time = $this->request->data['interview_time'];
			$interview->application_id = $this->request->data['job_application_id'];
			$interview->applicant_id = $this->request->data['applicant_id'];	

			$this->Interviewschedules->save($interview);
			
			$row=$this->Applicants->get($this->request->data['applicant_id']);
			$row->is_scheduled=1;
			$this->Applicants->save($row);
		}
	}
	
	public function scheduled()
	{
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$this->loadModel('Interviewschedules'); 

		$applictin = $this->Interviewschedules->find('all',array('conditions' => array('interview_status = 0')))->order(['interview_date'=>'ASC'])->contain(['Recruitment','Applicants']);
		$result=iterator_to_array($applictin);
  
		if($this->request->is('post')) {
			
			$row=$this->Interviewschedules->get($this->request->data['schedule_id']);
			$row->is_scheduled=1;
			
			$row->interview_status = $this->request->data['interview_status'];
			$row->interview_ratings = $this->request->data['interview_ratings'];
			$row->summary = $this->request->data['summary'];
			
			$this->Interviewschedules->save($row);
			return $this->redirect(['action' => 'scheduled']);   
		}
		
	    $this->set('scheduled',$result);
	}
	
	public function selected()
	{
		$session = $this->getRequest()->getSession();
		if($session->read('loggedin')!=1)
		{
			return $this->redirect(['controller' => 'Login','action' => 'index']);
		}
		
		$this->loadModel('Interviewschedules');
		$selec = $this->Interviewschedules->find('all',array('conditions' => array('interview_status = 1')))->contain(['Recruitment','Applicants']);
		
		$hold = $this->Interviewschedules->find('all',array('conditions' => array('interview_status = 2')))->contain(['Recruitment','Applicants']);
		
		$selected=iterator_to_array($selec);
		$on_hold=iterator_to_array($hold);
		
		$data['selected']=$selected;
		$data['on_hold']=$on_hold;
		
		$this->set('data',$data);
	}
	
	public function logout()
	{
		$session = $this->getRequest()->getSession();
		$session->write('username', '');
		$session->write('loggedin', 0);
		return $this->redirect(['controller' => 'Login','action' => 'index']);
	}
}