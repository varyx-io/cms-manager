<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class VARYX_Controller extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('user');
			
			//	Set template build defaults
			$this->template
							->set_partial('ga', 'layouts/_global/ga')
							->set_layout('default');
			
			//	Check to see if we have an active session
			if(is_null($this->session->has_userdata('user')) && $this->uri->uri_string() != 'login' && $this->uri->uri_string() != 'Users/Sessions/login')
			{
				$this->session->redirect = $this->uri->uri_string();
			}
			else
			{
				if($this->uri->uri_string() != 'login' && $this->uri->uri_string() != 'Users/Sessions/login')
				{
					//	Validate Session
					$user = $this->user->fetch_user($this->session->user['id']);
				}
			}
		}
	}