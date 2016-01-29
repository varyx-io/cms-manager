<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------------
/**
 * role_id_field
 *
 * The field used to assign role_id on register.
 */
$config['role_id_field'] = '';

// --------------------------------------------------------------------------
/**
 * login_with_encryption_key
 * 
 * If true, password string is mixed with the configured encryption key.
 * Leave this true for security!
 */
$config['login_with_encryption_key'] = TRUE;


// --------------------------------------------------------------------------
/**
 * remember_me_timeout (int)
 *
 * The time, in seconds, that the remember_me cookie lasts.
 */
$config['remember_me_timeout'] = 60 * 60 * 24 * 365;

// --------------------------------------------------------------------------
/**
 * salt_length (int)
 *
 * The length of the salt string to be added to / parsed from the password.
 * Max of 16 or it breaks....
 */
$config['salt_length'] = 16;

// --------------------------------------------------------------------------
/**
 * access_denied_message
 *
 * The notification to save to flashdata when access is denied.
 */
$config['access_denied_message'] = 'You do not have access to view this page.';

// --------------------------------------------------------------------------
/**
 * logged_out_message
 *
 * The notification to save to flashdata when logged out.
 */
$config['logged_out_message'] = 'You have been logged out.';

// --------------------------------------------------------------------------
/**
 * login_required_message
 *
 * The notification to save to flashdata when a user is not logged in but
 * tries to access a page that requires login.
 */
$config['login_required_message'] = 'Please login to continue.';

// --------------------------------------------------------------------------
/**
 * register_success_message
 *
 * The notification to save to flashdata when user succeeds in verifying
 *  registration request.
 */
$config['register_success_message'] = 'A confirmation has been sent to your email address. Please click the link there to continue.';

// --------------------------------------------------------------------------
/**
 * register_success_title
 *
 * Saves to flashdata alert_page_title.
 */
$config['register_success_title'] = 
$config['request_reset_success_title'] = 'Almost Done!';

// --------------------------------------------------------------------------
/**
 * confirm_register_success_message
 *
 * The notification to save to flashdata when user succeeds in verifying
 * registration request.
 */
$config['confirm_register_success_message'] = 'Registration confirmed. Please login.';

// --------------------------------------------------------------------------
/**
 * confirm_register_fail_message
 *
 * The notification to save to flashdata when user fails in verifying
 * registration request.
 */
$config['confirm_register_fail_message'] = 'Registration confirmation failed. Please try logging in. If that does not work, please try registering again.';

// --------------------------------------------------------------------------
/**
 * request_reset_success_message
 *
 * The notification to save to flashdata when user succeeds in requesting a
 * new password.
 */
$config['request_reset_success_message'] = 'A confirmation has been sent to your email address. Please click the link there to reset your password.';

// --------------------------------------------------------------------------
/**
 * request_reset_success_title
 *
 * Saves to flashdata alert_page_title.
 */
$config['request_reset_success_title'] = 'Almost Done!';

// --------------------------------------------------------------------------
/**
 * confirm_reset_success_message
 *
 * The notification to save to flashdata when user succeeds in confirming a
 * new password.
 */
$config['confirm_reset_success_message'] = 'Password reset. Your new password has been emailed to you. Please retrieve it and login.';

// --------------------------------------------------------------------------

/*
| -------------------------------------------------------------------
|  REDIRECTION URLS
| -------------------------------------------------------------------
*/

// --------------------------------------------------------------------------
/**
 * Login Success Redirection URL
 *
 * Prototype:
 * $config['login_success_url'] = 'application/url/path';
 */
$config['login_success_url'] = 'dashboard';
$config['login_success_admin_url'] = 'dashboard';

/**
 * logged_out_url
 *
 * There to redirect when login_check fails.
 */
$config['logged_out_url'] = 'login';

// --------------------------------------------------------------------------
/**
 * logout_success_url
 *
 * There to redirect on logout.
 */
$config['logout_success_url'] = 'login';

// --------------------------------------------------------------------------
/**
 * register_success_url
 *
 * There to redirect on register success.
 */
$config['register_success_url'] = 'login';

// --------------------------------------------------------------------------
/**
 * confirm_register_success_url
 *
 * Where to redirect on confirm success.
 */
$config['confirm_register_success_url'] = 'home/login';

// --------------------------------------------------------------------------
/**
 * confirm_register_fail_url
 *
 * Where to redirect on confirm fail.
 */
$config['confirm_register_fail_url'] = 'home/login';

// --------------------------------------------------------------------------
/**
 * confirm_reset_url
 *
 * The url for the reset password link. Without the trailing slash.
 */
$config['confirm_reset_url'] = 'home/confirm_reset_password';

// --------------------------------------------------------------------------
/**
 * request_reset_success_url
 *
 * Where to redirect on request reset password.
 */
$config['request_reset_success_url'] = 'alert';

// --------------------------------------------------------------------------
/**
 * confirm_reset_success_url
 *
 * Where to redirect on confirm reset password.
 */
$config['confirm_reset_success_url'] = 'home/login_new_password';

// --------------------------------------------------------------------------
/**
 * access_denied_url
 *
 * Where to redirect when a user reaches a page they do not have access to.
 */
$config['access_denied_url'] = 'alert';



/* End of file ci_authentication.php */
/* Location: ./ci_authentication/config/ci_authentication.php */
