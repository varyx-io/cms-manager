<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class VARYX_Controller extends CI_Controller {
		
		private $_logged_in;
		private $_auth_redirect;
		
		private $_unsecure = array(
				'login',
		);
		
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('user');
			
			//	Set template build defaults
			$this->template
							->set('page_title','')
							->set_partial('ga', 'layouts/_global/ga')
							->set_layout('default');
			
			//	Basic authority check. 
			//	-- we want to know if we need to redirect to either a login page or an unauthorized page...
			
			//First, are we logged in?
			$this->_logged_in = $this->session->has_userdata('user_id') ? true : false;
			
			$module_segment = $this->uri->segment(1);
			if(!$this->_logged_in && !in_array($module_segment, $this->_unsecure))
			{
				$this->session->redirect = $this->uri->uri_string();
				redirect('login');
			}
		}
	}