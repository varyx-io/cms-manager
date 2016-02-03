<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends VARYX_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->template
						->set_layout('sessions');
	}
	
	public function login()
	{
		
		//	First let's validate the form
		$this->load->library('form_validation');
		
		if($this->input->post('login')){
				
			$form_data = $this->input->post();
			$user_data = $form_data['user'];

			// Validate login credentials
			$this->form_validation->set_rules('user[handle]', 'Username', 'trim|required|callback__user_handle_check');
			$this->form_validation->set_rules('user[passphrase]', 'Password', 'required|callback__user_passphrase_check[' . $user_data['handle'] . ']');
			if( $this->form_validation->run() === true && !is_numeric($user_data['handle']) ){
				$this->user->do_login($user_data['handle']);
			}
		}
		
		$this->template
							->build('content/users/sessions/login');
	}
	
	public function logout()
	{
		$this->user->do_logout();
	}
	
	public function reset($code = null)
	{
		if(!is_null($code))
		{
			$user_reset = $this->user->fetch_user_reset($code);
			if(!is_null($user_reset))
			{
				$user = $this->user->fetch_user($user_reset->user_id);
				if(!is_null($user))
				{
					$user_id = $user->id;
					if($this->input->post('passphrase-save'))
					{
						//	First let's validate the form
						$this->load->library('form_validation');
						
						$this->form_validation->set_rules('user_passphrase[passphrase]', 'New Password', 'trim|required');
						$this->form_validation->set_rules('user_passphrase[confirm]', 'Confirm New Password', 'trim|required|callback__check_passphrase_match');

						$form_data = $this->input->post();
						$password = $form_data['user_passphrase']['passphrase'];
						if( strlen($password) < 10){
							redirect('/login/reset/' . $code);
						}

						if($this->form_validation->run() == true)
						{

							$user_passphrase = $form_data['user_passphrase'];
							$user_passphrase_result = $this->user->save_user_passphrase($user_id,$user_passphrase['passphrase']);
							if(is_numeric($user_passphrase_result))
							{
								$this->user->delete_user_reset($code);

								//	Log user password change.

								redirect('login');
							}
						}
						else
						{
							
						}
					}
					else
					{
						$this->template->set('confmsg',false);
						$this->template->set('showform',true);
					}
					$this->template
									->build('content/users/sessions/reset');
				}
				else
				{
					$this->alert->set('error','Invalid reset code.');
					redirect('login');
				}				
			}

			echo $code;
		}
	}
	
	// --------------------------------------------------------------------------
		//	FORM CHECKS
		// --------------------------------------------------------------------------
	
		/**
			* _publisher_user_handle_check function.
			*
			* checks for an email in the db and checks to make sure registration link
			* has been clicked.
			*
			* @access public
			* @param string $handle
			* @return bool
			*/

		public function _user_handle_check($handle)
		{
			$return = false;
			$user = $this->user->fetch_user($handle);
			if(is_null($user))
			{
				$this->form_validation->set_message('_user_handle_check', 'User Not Found.');
			}
			else
			{
				if($user->status !== 'active') $this->form_validation->set_message('_user_handle_check', 'User is inactive.');
				else $return = true;
			}
			return $return;
		}

		/**
		 * passphrase_check: copied from controllers/user/session.php
		 * @param type $user_passphrase
		 * @param type $user_handle
		 * @return boolean
		 */
		public function _user_passphrase_check($form_user_passphrase,$form_user_handle){
			
			$return = false;
			$user = $this->user->fetch_user($form_user_handle);
			
			if(!is_null($user))
			{
				$user_passphrase = $this->user->fetch_user_passphrase($user->id);
				$user_activation = $this->user->fetch_user_activation();
				$user_reset = $this->user->fetch_user_reset();
				
				if(is_null($user_activation) && is_null($user_reset))
				{
					if(!is_null($user_passphrase))
					{
						//	Load configuration for user system
						$this->config->load('users',true);
						$this->load->helper('encrypt_helper');

						//	Is the password expired?
						if((time() - (60*60*24*10000)) < strtotime($user_passphrase->created))
						{
							//	SALT unencrypted passphrase and prepare to compare it to what is in the record
							$salt_length = $this->config->item('salt_length','users');
							$salt_length = (intval($salt_length) > 16) ? 16 : intval($salt_length);
							$salt = substr($user_passphrase->passphrase, 0, $salt_length);
							$form_user_passphrase = encrypt_passphrase($form_user_passphrase, $salt);

							if ($form_user_passphrase === $user_passphrase->passphrase)
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
						$this->form_validation->set_message('_user_passphrase_check', 'Password Null');
					}
						
				}
				else
				{
					if(!is_null($user_activation))
					{
						$this->form_validation->set_message('_user_passphrase_check', 'This user is not activated.  Please see your email for instructions on activating your login publisher.');
					}
					elseif(!is_null($user_reset))
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
			$user = $this->user->do_fetch_user($email_address);
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
	
}
