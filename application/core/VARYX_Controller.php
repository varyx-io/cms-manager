<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class VARYX_Controller extends CI_Controller {
		
		private $_logged_in;
		private $_auth_redirect;
		
		private $_unsecure = array(
				'Users/Sessions/login',
				'login',
		);
		
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('user');
			
			//	Set template build defaults
			$this->template
							->set_partial('ga', 'layouts/_global/ga')
							->set_layout('default');
			
			//	Basic authority check. 
			//	-- we want to know if we need to redirect to either a login page or an unauthorized page...
			
			//First, are we logged in?
			$this->_logged_in = !is_null($this->session->has_userdata('user_id')) ? true : false;
			
			if(!$this->_logged_in && !in_array($this->uri->uri_string(), $this->_unsecure))
			{
				$this->session->redirect = $this->uri->uri_string();
				redirect('login');
			}
		}
	}