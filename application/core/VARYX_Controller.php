<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class VARYX_Controller extends CI_Controller {
		
		private $_logged_in;
		private $_auth_redirect;
		
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model(array('user','route'));
			
			//	Set template build defaults
			$this->template
							->set('page_title','')
							->set_partial('ga', 'layouts/_global/ga')
							->set_layout('default');
			
			//	Basic authority check. 
			//	-- we want to know if we need to redirect to either a login page or an unauthorized page...
			
			//	Determine the actual URI sans parameters
			$ruri_parameters = '';
			foreach($this->uri->ruri_to_assoc() as $key => $value)
			{
				$ruri_parameters .= $key . '/' . $value . '/';
			}
			
			$ruri_string = trim(trim(trim(trim($this->uri->ruri_string()),'/'),trim(trim($ruri_parameters),'/')),'/');
			
			//	This should be in the route table.  So we are going to insert/edit it -- this will be removed later, methinks.
			//	Then we are going to fetch the route to do are ACL work, which right now is just .... are you logged in?
			$this->route->save_route(array('ruri' => $ruri_string),$ruri_string);
			$route = $this->route->fetch_route($ruri_string);
			
			//First, are we logged in?
			$this->_logged_in = $this->session->has_userdata('user_id') ? true : false;
			
			if(!$this->_logged_in && $route->secured === decbin(1))
			{
				$this->session->redirect = $this->uri->uri_string();
				redirect('login');
			}
		}
	}