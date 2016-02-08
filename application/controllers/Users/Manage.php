<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Manage extends VARYX_Controller {

		public function __construct()
		{
			parent::__construct();
			$stylesheet_file_paths = array(
					'ux/libs/datatables/media/css/dataTables.bootstrap.min.css',
					'ux/libs/selectize/dist/css/selectize.default.css',
					'ux/libs/selectize/dist/css/selectize.bootstrap3.css',
					'ux/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
					'ux/libs/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
					'ux/libs/bootstrap-select/dist/css/bootstrap-select.min.css',
			);

			
			
			$javascript_file_paths = array(
					'ux/libs/datatables/media/js/jquery.dataTables.min.js',
					'ux/libs/datatables/media/js/dataTables.select.js',
					'ux/libs/datatables/media/js/dataTables.bootstrap.js',
					'ux/libs/selectize/dist/js/standalone/selectize.min.js',
					'ux/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
					'ux/libs/bootstrap-select/dist/js/bootstrap-select.min.js',
					'ux/js/modules/users.min.js',
			);
			
			$this->template
							->set('controller_javascript_files',$javascript_file_paths)
							->set('controller_stylesheet_files',$stylesheet_file_paths);
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
			if(is_numeric($user_id))
			{
				$user = $this->user->fetch_user($user_id);
				if(is_null($user))
				{
					$this->alert->set('error','Invalid user selected');
					redirect('users/manage/dashboard');
				}
			}
			else
			{
				$user_id = null;
			}

			if($this->input->post('user-save'))
			{
				//	First let's validate the form
				$this->load->library('form_validation');

				$success = true;
				
				//	if this is a new user, we set notify to true, otherwise false (can be changed later)
				$new_user = (is_null($user_id)) ? true : false;
//				$this->form_validation->set_rules('user[first_name]', 'First Name', 'trim|required');
//				$this->form_validation->set_rules('user[last_name]', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('user[email_address]', 'Email Address', 'trim|required|valid_email|callback__unique_user_email_address_check[' . $user_id . ']');
				$this->form_validation->set_rules('user[handle]', 'User Handle', 'trim|required|callback__unique_user_handle_check[' . $user_id . ']');

				if($this->form_validation->run() == true)
				{
					$form_data = $this->input->post();
					$user_data = array(
						'email_address' => $form_data['user']['email_address'],
						'handle' => $form_data['user']['handle'],
						//'type' => 'administrator'
					);

					$result = $this->user->save_user($user_data,$user_id);

					if(is_numeric($result))
					{
						$user_id = $result;
						$user = $this->user->fetch_user($user_id);
						
						if($new_user || $user_data['email_address'] !== $user->email_address)
						{
							
							
							if($new_user)
							{
								$this->user->save_user_activation($user->id);
							}
							
							if(!$this->_activation_request_notification($user->id,$new_user))
							{
								$this->alert->set('error','A email was not sent to this user.');
							}
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
				}
				
				redirect('users/');

			}

			$data = array();

			$data['user'] = array(
				'id' => (!is_null($user)) ? $user->id : null,
				'email_address' => (!is_null($user)) ? $user->email_address : null,
				'handle' => (!is_null($user)) ? $user->handle : null,
				'created' => (!is_null($user)) ? date('m-d-Y',strtotime($user->created)) : null,
				'modified' => (!is_null($user)) ? date('m-d-Y',strtotime($user->modified)) : null,
			);
			
			$this->template
							->set('active','users')
							->set('page_title','User Settings:')
							->set('page_sub_title', !is_null($data['user']['handle']) ? $data['user']['handle'] : 'New User')
							->build('content/users/manage/form',$data);
		}

		// --------------------------------------------------------------------------
		
		public function delete($user_id = null)
		{
			if(is_numeric($user_id))
			{
				$user = $this->user->fetch_user($user_id);
				if(!is_null($user))
				{
					$user_result = $this->user->delete_user($user_id);
					if($user_result)
					{
						$this->alert->set('info','The user ' . $user->handle . ' was deleted.');
					}
					else
					{
						$this->alert->set('error','There was an error deleting the user ' . $user->handle . '.');
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
			redirect('users');
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
		
		public function _unique_user_handle_check($handle,$user_id = null)
		{
			$return = false;
			$user = $this->user->fetch_user($handle);
			if(!is_null($user))
			{
				if(is_numeric($user_id) && $user->id == $user_id) $return = true;
				else $this->form_validation->set_message('_unique_user_handle_check', 'User Login ID must be unique.');
			} else $return = true;
			return $return;
		}
		
		public function _unique_user_email_address_check($email_address,$user_id = null)
		{
			$return = false;
			$user = $this->user->fetch_user($email_address);
			if(!is_null($user))
			{
				if(is_numeric($user_id) && $user->id == $user_id) $return = true;
				else $this->form_validation->set_message('_unique_user_email_address_check', 'This email address already exists.  User Email Address must be unique.');
			} else $return = true;
			return $return;
		}

		public function _check_passphrase_match()
		{
			$return = false;
			$form_data = $this->input->post();
			$user_passphrase = array_key_exists('user_passphrase',$form_data) ? $form_data['user_passphrase'] : null;
			if(array_key_exists('passphrase',$user_passphrase) && array_key_exists('confirm',$user_passphrase))
			{
				if($user_passphrase['passphrase'] === $user_passphrase['confirm'])
				{
					$return = true;
				}
				else
				{
					$this->form_validation->set_message('_check_passphrase_match', 'Confirmation password does not match new password.');
				}
			}
			else
			{
				$this->form_validation->set_message('_check_passphrase_match', 'Error occured while comparing passphrases.  Aborting.');
			}
			return $return;
		}

		public function _activation_request_notification($user_id = null, $new = false)
		{
			//	Load our config and notify library
			$this->config->load('notifications', TRUE);
			$this->load->library('notify');
			
			$email_template_directory = $this->config->item('email_template_view_directory', 'notifications');
			
			$return = false;
			if(is_numeric($user_id))
			{
				$data = array();
				//	Get our data for the base reservation
				$user = $this->user->fetch_user_activation($user_id);
				if($user)
				{
				
						$notify_recipient = '"' . $user->handle . '" <' . $user->email_address . '>';

						$data['user'] = array(
								'id' => $user->id,
								'handle' => $user->handle,
								'email_address' => $user->email_address,
								'activation' => array(
									'code' => $user->activation->code,
								),
						);

						$data['activation_link'] = site_url('login/activate') . '/' . $user->activation->code;

						if(!is_null($notify_recipient) && is_array($data))
						{

							if($new)
							{
								$subject = "Your new VarYX user account";
								$html_body = $this->load->view($email_template_directory . 'user/activation_request_html', $data, true);
								$plaintext_body = $this->load->view($email_template_directory . 'user/activation_request_text', $data, true);
							}
							else
							{
								$subject = "Your VarYX user account";
								$html_body = $this->load->view($email_template_directory . 'user/reactivation_request_html', $data, true);
								$plaintext_body = $this->load->view($email_template_directory . 'user/reactivation_request_text', $data, true);
							}

							$return = $this->notify->send(
									$notify_recipient,
									$subject,
									$html_body,
									$plaintext_body
							);
						}
				}
				else
				{
					$this->alert->set('error', 'The user was not found. (uid: ' . $user_id . ')');
				}
			}
			else
			{
				$this->alert->set('error', 'The user id was invalid. (uid: ' . $user_id . ')');
			}

			return $return;
		}
	}

/* End of file manage.php */
/* Location: ./application/controllers/users/manage.php */
