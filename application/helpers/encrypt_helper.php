<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// --------------------------------------------------------------------------
// !Utility functions
// --------------------------------------------------------------------------

/**
	* Encrypt_this
	*
	* Obfuscates the password with a session-specific salt and a
	* few other things.
	*
	* @param string  $password
	* @param int $salt (default: '')
	* @return string
	*/
function encrypt_passphrase($plaintext, $salt = null)
{
	$_ci =& get_instance();
	//	Load configuration
	$_ci->config->load('users',true);
	$salt_length = $_ci->config->item('salt_length','users');
	$salt_length = (intval($salt_length) > 16) ? 16 : intval($salt_length);

	if ($salt === null)
	{
		$salt = substr(md5(uniqid(rand(), true)), 0, $salt_length);
	}
	else
	{
		$salt = substr($salt, 0, $salt_length);
	}

	return $salt . sha1($salt . $plaintext);
}

function generate_random_string($length = 10) {
	$return = '';
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	for ($i = 0; $i < $length; $i++) {
			$return .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $return;
}

// --------------------------------------------------------------------------

/* End of file encrypt_helper.php */
/* Location: ./booktrack/application/helpers/encrypt_helper.php */