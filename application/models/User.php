<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class User extends CI_Model {

		/**
		 * Types of model methods
		 * 
		 * filter, fetch, save, delete
		 */

		public function fetch_user($ident = null)
		{
			$return = null;
			if(!is_null($ident))
			{
				if(is_numeric($ident))
				{
					$query = $this->db
									->select('`user`.`id` AS `user_id`')
									->select('`user`.`handle` AS `user_handle`')
									->select('`user`.`email` AS `user_email`')
									->select('`user`.`created` AS `user_created`')
									->select('`user`.`modified` AS `user_modified`')

									->select('`user_avatar`.`file_name` AS `user_avatar_file_name`')

									->join('`user_avatar`', '`user`.`id` = `user_avatar`.`user_id`', 'left')

									->where('`user`.`id`', $ident)

									->from('`user`')
									->get();
				}
				else
				{
					$query = $this->db
									->select('`user`.`id` AS `user_id`')
									->select('`user`.`handle` AS `user_handle`')
									->select('`user`.`email` AS `user_email`')
									->select('`user`.`created` AS `user_created`')
									->select('`user`.`modified` AS `user_modified`')

									->select('`user_avatar`.`file_name` AS `user_avatar_file_name`')

									->join('`user_avatar`', '`user`.`id` = `user_avatar`.`user_id`', 'left')

									->where('`user`.`handle`', $ident)

									->from('`user`')
									->get();
				}

				if($query->num_rows() == 1)
				{
					$row = $query->row();

					$user_avatar = new stdClass();
					$user_avatar->file_name = $row->user_avatar_file_name;

					$user = new stdClass();
					$user->id = $row->user_id;
					$user->handle = $row->user_handle;
					$user->email = $row->user_email;
					$user->avatar = $user_avatar;
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
		
		/**
		 * passphrase_check: copied from controllers/user/session.php
		 * @param type $user_passphrase
		 * @param type $user_handle
		 * @return boolean
		 */
		public function passphrase_check($user_passphrase,$user_handle){
			
			$return = false;
			$user = $this->user->fetch_user($user_handle);
			
		
			if(!is_null($user))
			{
				$user_passphrase = $this->user->fetch_user_passphrase($user->id);
				$user_activation = $this->user->fetch_user_activation();
				
				if(!is_null($user_activation) && !is_null($user_passphrase))
				{
					//	Load configuration for user system
					$this->config->load('user',true);
					$this->load->helper('encrypt_helper');
					
					//	Is the password expired?
					if((time() - (60*60*24*10000)) < strtotime($user_passphrase->created))
					{
						//	SALT unencrypted passphrase and prepare to compare it to what is in the record
						$salt_length = $this->config->item('salt_length','user');
						$salt_length = (intval($salt_length) > 16) ? 16 : intval($salt_length);
						$salt = substr($passphrase->passphrase, 0, $salt_length);
						$user_passphrase = encrypt_passphrase($user_passphrase, $salt);

						if ($user_passphrase === $passphrase->passphrase)
						{
							$return = true;
						}
						else
						{
							$this->form_validation->set_message('_user_passphrase_check', 'Incorrect password.');
						}
					}
					else
					{
						redirect('login/expired');
					}
				}
				else
				{
					if(count($user->activation()) > 0)
					{
						$this->form_validation->set_message('_user_passphrase_check', 'This user is not activated.  Please see your email for instructions on activating your login publisher.');
					}
					elseif(count($user->reset()) > 0)
					{
						$this->form_validation->set_message('_user_passphrase_check', 'A password reset is in effect.  Please see your email for instructions on resetting your password.');
					}
				}
			}
			else
			{
				$this->form_validation->set_message('_user_passphrase_check', 'User is not enabled for login.');
			}

			return $return;
		}
		
		
		
	}

/* End of file account.php */
/* Location: ./application/models/account.php */	
