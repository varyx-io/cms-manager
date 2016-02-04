<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class User extends CI_Model {

		public function __construct() {
			parent::__construct();
			
			$this->config->load('users', TRUE);
		}
		/**
		 * Types of model methods
		 * 
		 * filter, fetch, save, delete, do_
		 */

		public function filter_users()
		{
			$return = array(
					'count' => 0,
					'users' => array()
			);


			$query = $this->db
							->select('`user`.`id` AS `user_id`')
							->select('`user`.`type` AS `user_type`')
							->select('`user`.`handle` AS `user_handle`')
							->select('`user`.`email_address` AS `user_email_address`')
							->select('`user`.`status` AS `user_status`')
							->select('`user`.`created` AS `user_created`')
							->select('`user`.`modified` AS `user_modified`')

							->select('`user_avatar`.`file_name` AS `user_avatar_file_name`')

							->join('`user_avatar`', '`user`.`id` = `user_avatar`.`user_id`', 'left')


							->from('`user`')
							->get();

			$return['count'] = $query->num_rows();
			if($return['count'] > 0)
			{
				foreach($query->result() as $row)
				{
					$user_avatar = new stdClass();
					$user_avatar->file_name = $row->user_avatar_file_name;

					$user = new stdClass();
					$user->id = $row->user_id;
					$user->type = $row->user_type;
					$user->handle = $row->user_handle;
					$user->email_address = $row->user_email_address;
					$user->avatar = $user_avatar;
					$user->status = $row->user_status;
					$user->created = $row->user_created;
					$user->modified = $row->user_modified;

					array_push($return['users'],$user);
				}
			}

			return $return;
		}
		
		public function fetch_user($ident = null)
		{
			$return = null;
			if(!is_null($ident))
			{
				$this->db
								->select('`user`.`id` AS `user_id`')
								->select('`user`.`type` AS `user_type`')
								->select('`user`.`handle` AS `user_handle`')
								->select('`user`.`email_address` AS `user_email_address`')
								->select('`user`.`status` AS `user_status`')
								->select('`user`.`created` AS `user_created`')
								->select('`user`.`modified` AS `user_modified`')

								->select('`user_avatar`.`file_name` AS `user_avatar_file_name`')

								->join('`user_avatar`', '`user`.`id` = `user_avatar`.`user_id`', 'left')
								->from('`user`');
				if(is_numeric($ident))
				{
					$this->db
									->where('`user`.`id`', $ident);
					
				}
				else
				{
					$this->db
									->where('`user`.`handle`', $ident)
									->or_where('`user`.`email_address`', $ident);
				}

				$query = $this->db->get();
				if($query->num_rows() == 1)
				{
					$row = $query->row();

					$user_avatar = new stdClass();
					$user_avatar->file_name = $row->user_avatar_file_name;

					$user = new stdClass();
					$user->id = $row->user_id;
					$user->type = $row->user_type;
					$user->handle = $row->user_handle;
					$user->email_address = $row->user_email_address;
					$user->avatar = $user_avatar;
					$user->status = $row->user_status;
					$user->created = $row->user_created;
					$user->modified = $row->user_modified;

					$return = $user;
				}
			}
			return $return;
		}
	
		public function fetch_user_passphrase($user_id = null)
		{
			$return = null;
			if(is_numeric($user_id))
			{
				$query = $this->db
								->select('`user_passphrase`.`user_id` AS `user_passphrase_user_id`')
								->select('`user_passphrase`.`passphrase` AS `user_passphrase_passphrase`')
								->select('`user_passphrase`.`created` AS `user_passphrase_created`')

								->where('user_id', $user_id)

								->order_by('`created`','DESC')
								->limit(1)
								->from('`user_passphrase`')
								->get();
				
				if($query->num_rows() == 1)
				{
					$row = $query->row();

					$user_passphrase = new stdClass();
					$user_passphrase->passphrase = $row->user_passphrase_passphrase;
					$user_passphrase->created = $row->user_passphrase_created;

					$return = $user_passphrase;
				}				
			}
			
			return $return;
		}
	
		public function fetch_user_activation($user_id = null)
		{
			$return = null;
			
			return $return;
		}
		
		public function fetch_user_reset($code = null)
		{
			$return = null;
			if(!is_null($code))
			{
				$query = $this->db
								->select('`user_reset`.`id` AS `user_reset_id`')
								->select('`user_reset`.`user_id` AS `user_reset_user_id`')
								->select('`user_reset`.`created` AS `user_reset_created`')
								
								->where('code', $code)
								
								->from('user_reset')
								->get();
				
				if($query->num_rows() == 1)
				{
					$row = $query->row();

					$user_reset = new stdClass();
					$user_reset->id = $row->user_reset_id;
					$user_reset->user_id = $row->user_reset_user_id;
					$user_reset->created = $row->user_reset_created;

					$return = $user_reset;
				}	
			}
			return $return;
		}
		
		public function save_user($user_data, $user_id = null)
		{
			$return = false;
			
			if(is_array($user_data))
			{
				if(is_numeric($user_id))
				{
					//	Is this a valid record?
					$query = $this->db
									->where('`id`', $user_id)
									->from('`user`')
									->get();

					if($query->num_rows() == 1)
					{
						$update = $this->db
										->set($user_data)
										->where('`id`', $user_id)
										->from('`user`')
										->update();

						if($update)
						{
							$return = $user_id;
						}
					}

				}
				elseif(empty($user_id))
				{
					$insert= $this->db
									->set($user_data)
									->set('`user`.`created`',date('Y-m-d H:i:s',time()))
									->from('`user`')
									->insert();

					if($insert)
					{
						$return = $this->db->insert_id();
					}
				}
			}

			return $return;
		}
		
		public function save_user_passphrase($user_id = null,$passphrase = null)
		{
			$return = false;
			if(is_numeric($user_id) && !is_null($passphrase))
			{
				$data = array(
						'user_id' => $user_id,
						'passphrase' => encrypt_passphrase($passphrase),
						'created' => date('Y-m-d H:i:s', time())
				);
				
				if($this->db->insert('user_passphrase', $data)){
					$return = $this->db->insert_id();
				}
			}

			return $return;
		}
		
		public function delete_user($user_id)
		{
			$return = null;
			if(!is_null($user_id))
			{
				$user = $this->fetch_user($user_id);
				if(!is_null($user))
				{
					$this->db
									->where('id', $user->id)
									->from('user')
									->delete();
					$return = true;
				}
			}
			return $return;
		}
		
		public function delete_user_reset($code = null)
		{
			$return = null;
			if(!is_null($code))
			{
				$user_reset = $this->fetch_user_reset($code);
				if(!is_null($user_reset))
				{
					$this->db
									->where('id', $user_reset->id)
									->from('user_reset')
									->delete();
					$return = true;
				}
			}
			return $return;
		}
		
		// --------------------------------------------------------------------------
		//	UTILITY METHODS
		// --------------------------------------------------------------------------

		public function is_logged_in()
		{
			$return = false;
			
			$user_id = $this->session->userdata('user_id');
			
			if(is_numeric($user_id) && intval($user_id) > 0) $return = true;
			return $return;
		}
		
		public function do_login($user_handle = null)
		{
			$return = false;
			if(!is_null($user_handle))
			{
				//	Does this user exist?
				$user = $this->fetch_user($user_handle);
				$this->do_set_session($user->id);
				
				if($this->session->has_userdata('redirect'))
				{
					echo "has redirect";
					$dest_url = $this->session->redirect;
				}
				else
				{
					$dest_url = $this->config->item('login_success_url','users');

					if ($user->type == 'administrator'){
						$dest_url = $this->config->item('login_success_admin_url','users');
					}
				}

				// redirect to login_success_url, either as a db field or a configured url
				//$this->alert->set('success', 'You have been logged in.');
				
				redirect($dest_url);
			}
			return false;
		}
		
		public function do_set_session($user_id = null)
		{
			$return = false;
			if(is_numeric($user_id))
			{
				//	Get user
				$user = $this->fetch_user($user_id);
				
				//	Check current user id and user data
				if($user_id == $this->session->user_id || is_null($this->session->userdata('user_id')))
				{
					//	User-specific data we want to save into the session.
					$user_data = array(
							'handle' => $user->handle,
							'email_address' => $user->email_address,
							'avatar' => array(
									'path' => 'path/to/images'
							),
							'created' => $user->created,
							'modified' => $user->modified
									
					);

					$session_userdata = array(
							'user_id' => $user->id,
							'user_data' => $user_data,
					);

					//	Store all that in a session
					$this->session->set_userdata($session_userdata);
				}
				else
				{
					//	Force logout because user_id should match the session.  If it doesn't you are doing something naughty.
					
					$return = false;
				}
				

			}
			return $return;
		}
		
		public function do_logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}
		
		
	}

/* End of file account.php */
/* Location: ./application/models/account.php */	
