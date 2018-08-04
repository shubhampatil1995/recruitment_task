<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class LoginController extends AppController
{
	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
    public function index()
    {
		$this->layout= 'career_home';
		
		if($this->request->is('post')) {
			$username=$this->request->data('username');
			$password=$this->request->data('password');
			
			$this->loadModel('Admin');
			
			$result=$this->Admin->find()->where(['username'=>$username,'password'=>$password]);
			$result2=iterator_to_array($result);
			
			if(!empty($result2))
			{
				$session = $this->getRequest()->getSession();
				$session->write('username', $username);
				$session->write('loggedin', 1);
				
				return $this->redirect(['controller' => 'Recruitment','action' => 'index']);
			}
			else{
				$this->Flash->set('Username or Password is incorrect');
			}
		}
    }
}