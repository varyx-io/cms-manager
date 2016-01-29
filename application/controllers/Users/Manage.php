<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Manage extends VARYX_Controller {

		public function __construct()
		{
			parent::__construct();

		}

		// --------------------------------------------------------------------------
		//	User Management Methods
		// --------------------------------------------------------------------------

		public function dashboard()
		{
      $users = $this->user->filter_users();

			$this->template
							->set('active','users')
							->set('page_title','System Settings:')
							->set('page_sub_title','User Accounts')
							->build('content/users/manage/dashboard',$users);
		}
		
		// --------------------------------------------------------------------------

		public function detail($user_id = null)
		{
			
		}
		
		// --------------------------------------------------------------------------

		// --------------------------------------------------------------------------

		/**
			* record function
			*
			* displays publisher form, handles validation, runs authentication library 
			* method on success.
			* 
			* @access public
			* @return void
			*/

		public function record($user_id = null)
		{
			//	Fetch requested Data
			$user = null;
			if(is_numeric($user_id))
			{
				$user = $this->user->fetch_user($user_id);
				if(is_null($user))
				{
					$this->alert->set('error','Invalid user selected');
					redirect('users/manage/dashboard');
				}
			}

			if($this->input->post('user-save'))
			{
				$success = true;
				
				//	if this is a new user, we set notify to true, otherwise false (can be changed later)
				$activate = (!is_null($user_id)) ? false : true;
				
				$this->form_validation->set_rules('user[first_name]', 'First Name', 'trim|required');
				$this->form_validation->set_rules('user[last_name]', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('user[email_address]', 'Email Address', 'trim|required|valid_email|callback__unique_user_email_address_check[' . $user_id . ']');
				$this->form_validation->set_rules('user[handle]', 'User Handle', 'trim|required|callback__unique_user_handle_check[' . $user_id . ']');

				if($this->form_validation->run() == true)
				{
					$form_data = $this->input->post();
					$user_data = array(
						'first_name' => $form_data['user']['first_name'],
						'last_name' => $form_data['user']['last_name'],
						'email_address' => $form_data['user']['email_address'],
						'handle' => $form_data['user']['handle'],
						'type' => 'administrator'
					);
					$result = $this->user->do_save_user($user_id,$user_data);

					if(is_numeric($result))
					{
						$user_id = $result;
						
						if(!$activate && $user_data['email_address'] !== $user->email_address){
							$this->_reactivation_request_notification($user_id);
						}
						elseif($activate){
							$this->_activation_request_notification($user_id);
						}
					} else{
						$success = false;
					}
				} else{
					$success = false;
				}
				
				if($success)
				{
					$this->alert->set('success','User details were saved.');
					redirect('users/manage/detail/' . $user_id);
				}
			}

			$data = array();

			$data['user'] = array(
				'id' => (!is_null($user)) ? $user->id : null,
				'email' => (!is_null($user)) ? $user->email : null,
				'handle' => (!is_null($user)) ? $user->handle : null,
				'created' => (!is_null($user)) ? date('m-d-Y',strtotime($user->created)) : null,
				'modified' => (!is_null($user)) ? date('m-d-Y',strtotime($user->modified)) : null,
			);
			
			$this->template
							->set('active','users')
							->set('page_title','User Settings:')
							->set('page_sub_title',$user->handle)
							->build('content/users/manage/form',$data);
		}

		// --------------------------------------------------------------------------
		
		public function delete($user_id = null,$undo = null)
		{
			if(is_numeric($user_id))
			{
				$user = $this->user->do_fetch_user($user_id);
				if(!is_null($user))
				{
					if($undo === 'undo')
					{
						$user_result = $this->user->do_remove_user($user_id,true);
						if($user_result)
						{
							$this->alert->set('info','The user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . ' was restored.');
						}
						else
						{
							$this->alert->set('error','There was an error restoring the user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . '.');
						}
					}
					else
					{
						$user_result = $this->user->do_remove_user($user_id);
						if($user_result)
						{
							$this->alert->set('info','The user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . ' was deleted. <a href="' . site_url('users/manage/delete/' . $user_id . '/undo') . '">Undo</a>');
						}
						else
						{
							$this->alert->set('error','There was an error deleting the user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . '.');
						}
					}
				}
				else
				{
					$this->alert->set('error','The referenced user_id was not found in the system.');
				}
			}
			else
			{
				$this->alert->set('error','Illegal user ID.');
			}
			redirect('users/manage/dashboard');
		}
		
		public function activate($user_id = null)
		{
			//	Fetch requested Data
			$user = $this->user->do_fetch_user($user_id);
			if(is_null($user))
			{
				$this->alert->set('error','Invalid user selected');
				redirect('users/manage/dashboard');
			}

			if($this->_reactivation_request_notification($user_id))
			{
				$this->alert->set('info','User activation resent');
			}
			else
			{
				$this->alert->set('error','Failed to resend user activation');				
			}
			redirect('users/manage/dashboard');
		}
		
		public function suspend($user_id = null,$undo = null)
		{
			if(is_numeric($user_id))
			{
				$user = $this->user->do_fetch_user($user_id);
				if(!is_null($user))
				{
					if($undo === 'undo')
					{
						$user_result = $this->user->do_suspend_user($user_id,true);
						if($user_result)
						{
							$this->alert->set('info','The user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . ' was restored.');
						}
						else
						{
							$this->alert->set('error','There was an error restoring the user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . '.');
						}
					}
					else
					{
						$user_result = $this->user->do_suspend_user($user_id);
						if($user_result)
						{
							$this->alert->set('info','The user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . ' was suspended. <a href="' . site_url('users/manage/delete/' . $user_id . '/undo') . '">Undo</a>');
						}
						else
						{
							$this->alert->set('error','There was an error deleting the user publisher belonging to ' . $user->first_name . ' ' . $user->last_name . '.');
						}
					}
				}
				else
				{
					$this->alert->set('error','The referenced user_id was not found in the system.');
				}
			}
			else
			{
				$this->alert->set('error','Illegal user ID.');
			}
			redirect('users/manage/dashboard');
		}
		// --------------------------------------------------------------------------

		public function properties($user_id = null)
		{
			if ($this->input->post('user-properties-save'))
			{
				//	Save `property` record
				$user_property_data = ($this->input->post('property')) ? $this->input->post('property') : array();
				$result = $this->user->do_save_user_properties($user_id,$user_property_data);
				if($result === true) {
					$this->alert->set('success', 'Changes to your property selections have been saved.');
				} else {
					foreach($result as $error)
					{
						$this->alert->set('error', $error);
					}
				}
				redirect('users/manage/properties/' . $user_id);
			}
			
			$user = $this->user->do_fetch_user($user_id);
			
			$data['user'] = array(
					'id' => $user->id,
					'type' => $user->type,
					'full_name' => $user->first_name . ' ' . $user->last_name,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
			);
			
			//	Build property regions array for this publisher
			$user_properties = array();
			foreach($user->properties() as $property)
			{
				$user_properties[$property->id] = $property;
			}
			
			$properties = $this->property->do_fetch_properties();
			
			$filter_parameters['property.status'] = array(
					'keyword' => 'AND',
					'arguments' => array(
							array(
									'operator' => '<>',
									'value' => 'suspended',
							),
					),
			);
			
			$sort_parameters = array(
				'sort_table' => 'property',
        'sort_column' => 'name',
        'sort_order' => 'ASC',
      );
			
			$properties = $this->property->do_filter_properties($filter_parameters,$this->filtering->prepare_paging_sorting($sort_parameters,true));
			$data['properties'] = array();
			foreach($properties['data'] as $property)
			{
				$property_physical_address = null;
				foreach($property->addresses() as $address)
				{
					if($address->type !== 'physical') continue;
					$property_physical_address_state = (!is_null($address->state())) ? $address->state() : null;
					$property_physical_address_state_country = (!is_null($property_physical_address_state) && !is_null($property_physical_address_state->country())) ? $property_physical_address_state->country() : null;
					$property_physical_address = array(
							'state' => array(
									'id' => !is_null($property_physical_address_state) ? $property_physical_address_state->id : null,
									'abbr' => !is_null($property_physical_address_state) ? $property_physical_address_state->abbr : null,
									'name' => !is_null($property_physical_address_state) ? $property_physical_address_state->name : null,
									'country' => array(
											'id' => !is_null($property_physical_address_state_country) ? $property_physical_address_state_country->id : null,
											'name' => !is_null($property_physical_address_state_country) ? $property_physical_address_state_country->name : null,
											'abbr' => !is_null($property_physical_address_state_country) ? $property_physical_address_state_country->abbr : null,
									),
							),
					);
				}
				
				$areas = null;
				foreach($property->areas() as $area)
				{
					$areas .= $area->name . ', ';
				}
				
				$areas = (!is_null($areas)) ? trim(trim($areas),',') : null;
				
				$data['properties'][$property->id] = array(
						'name' => $property->name,
						'areas' => $areas,
						'state' => $property_physical_address['state'],
						'checked' => ((array_key_exists($property->id,$user_properties)) ? ' checked="checked"' : null),
				);
			}

			$this->template
							->set('active','users-dashboard')
							->set('page_title','Property Extranet Assignments:')
							->set('page_sub_title', $user->first_name . ' ' . $user->last_name)
							->set_partial('header','layouts/global/html/header')
							->set_partial('footer','layouts/global/html/footer')
							->set_partial('layout_header','layouts/global/html/layout_header',$data)
							->set_partial('leftnav','layouts/nav/administration/system_settings/left',$data)
							->set_layout('2column_leftnav')
							->build('content/users/manage/properties');
		}
		
		public function publishers($user_id = null)
		{
			if ($this->input->post('user-publishers-save'))
			{
				//	Save `property` record
				$user_publisher_data = ($this->input->post('publisher')) ? $this->input->post('publisher') : array();
				$result = $this->user->do_save_user_publishers($user_id,$user_publisher_data);
				if($result === true) {
					$this->alert->set('success', 'Changes to your property selections have been saved.');
				} else {
					foreach($result as $error)
					{
						$this->alert->set('error', $error);
					}
				}
				redirect('users/manage/publishers/' . $user_id);
			}
			
			$user = $this->user->do_fetch_user($user_id);
			
			$data['user'] = array(
					'id' => $user->id,
					'type' => $user->type,
					'full_name' => $user->first_name . ' ' . $user->last_name,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
			);
			
			//	Build property regions array for this publisher
			$user_publishers = array();
			foreach($user->publishers() as $publisher)
			{
				$user_publishers[$publisher->id] = $publisher;
			}
			
			$publishers = $this->publisher->do_fetch_publishers();
			$data['publishers'] = array();

			foreach($publishers as $publisher)
			{
				$data['publishers'][$publisher->type][$publisher->id] = array(
						'name' => $publisher->name,
						'checked' => ((array_key_exists($publisher->id,$user_publishers)) ? ' checked="checked"' : null),
				);
			}

			$this->template
							->set('active','users-dashboard')
							->set('page_title','User publisher:')
							->set('page_sub_title','publishers assigned to ' . $user->first_name . ' ' . $user->last_name)
							->set_partial('header','layouts/global/html/header')
							->set_partial('footer','layouts/global/html/footer')
							->set_partial('layout_header','layouts/global/html/layout_header',$data)
							->set_partial('leftnav','layouts/nav/administration/system_settings/left',$data)
							->set_layout('2column_leftnav')
							->build('content/users/manage/publishers');
		}
		
		/**
			* profile method
			*
			* desplays current user profile data
			* 
			* @access public
			* @return void
			*/

		public function profile()
		{
			
			$user = $this->user->do_fetch_user($this->session->userdata('user_id'));
			
			$user_publishers = $user->publishers();
			$user_properties = $user->properties();
			$data['user'] = array(
					'properties' => array(
						'count' => count($user_properties),
						'modified' => (count($user_properties) > 0) ? date('M j, Y h:i A',strtotime($user_properties[0]->created)) : 'Never',
					),
					'publishers' => array(
						'count' => count($user_publishers),
						'modified' => (count($user_publishers) > 0) ? date('M j, Y h:i A',strtotime($user_publishers[0]->created)) : 'Never',
					),
					'id' => $user->id,
					'type' => array(
							'type' => $user->type,
							'display' => '<b>' . ucfirst($user->type) . '</b>'
					),
					'handle' => $user->handle,
					'email_address' => $user->email_address,
					'full_name' => $user->first_name . ' ' . $user->last_name,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'status' => array(
							'status' => $user->status,
							'display' => $this->lang->line('user_status_' . $user->status),
					),
					'created' => date('M j, Y h:i A',strtotime($user->created)),
					'modified' => (!is_null($user->modified)) ? date('M j, Y h:i A',strtotime($user->modified)) : 'Never',
			);
			
			$this->template
							->set('active','users')
							->set('page_title','User Settings:')
							->set('page_sub_title',$user->first_name . '&nbsp;' . $user->last_name)
							->set_partial('header','layouts/global/html/header')
							->set_partial('footer','layouts/global/html/footer')
							->set_partial('layout_header','layouts/global/html/layout_header',$data)
							->set_partial('leftnav','layouts/nav/administration/system_settings/left',$data)
							->set_layout('1column')
							->build('content/users/manage/profile');
		}
	
		// --------------------------------------------------------------------------

		// --------------------------------------------------------------------------
		//	Utility Methods
		// --------------------------------------------------------------------------
	}

/* End of file manage.php */
/* Location: ./application/controllers/users/manage.php */
