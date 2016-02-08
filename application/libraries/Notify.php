<?php
class Notify {

    # Email API Configuration
    protected $_emailFromAddress    = null;
    protected $_emailFromName       = null;
    protected $_emailReplyToAddress = null;

		protected $CI;
		public function __construct()
		{
			$this->CI = &get_instance();

			$this->CI->config->load('notifications', TRUE);
			
			$this->_smtp_host = $this->CI->config->item('smtp_host', 'notifications');
			$this->_smtp_port = $this->CI->config->item('smtp_port', 'notifications');
			$this->_smtp_username = $this->CI->config->item('smtp_username', 'notifications');
			$this->_smtp_password = $this->CI->config->item('smtp_password', 'notifications');
			
			$this->_email_type = $this->CI->config->item('email_type', 'notifications');

			$this->_email_from_address = $this->CI->config->item('email_from_address', 'notifications');
			$this->_email_from_name= $this->CI->config->item('email_from_name', 'notifications');
			$this->_email_reply_to_address = $this->CI->config->item('email_reply_to_address', 'notifications');
			$this->_email_contact_phone_number = $this->CI->config->item('email_contact_phone_number', 'notifications');
			$this->_email_template_view_directory = $this->CI->config->item('email_template_view_directory', 'notifications');
			$this->_static_site_url = $this->CI->config->item('static_site_url', 'notifications');
		}

    /**
			* This function uses the built in CodeIgniter email class to send email
			* notifications.
			*
			* @param <string> $to - Email address of recipient
			* @param <string> $subject - Email subject
			* @param <string> $htmlMessage - HTML version of the email message
			* @param <string> $plainTextMessage - Plaintext fallback email message
			* @param <string> $attachmentPath - Attachment path relative to document root of app
			*/

    public function send($to, $subject, $html_message, $plaintext_message, $cc_to = '', $bcc_to = '', $attachmentPath = false, $data=null){

		if( !isset($this->CI->email) ) {
			$this->CI->load->library('email');
		}

		# Not sure if this is required, but set the mailtype to HTML
		$config = array(
			'mailtype' => $this->_email_type,
			'smtp_host' => $this->_smtp_host,
			'smtp_user' => $this->_smtp_username,
			'smtp_pass' => $this->_smtp_password,
			'smtp_port' => $this->_smtp_port,
			'protocol' => 'smtp'
		);

		$this->CI->email->initialize($config);

		# Set up message details
		$this->CI->email->from($this->_email_from_address, $this->_email_from_name);
		$this->CI->email->to($to);
		$this->CI->email->cc($cc_to);
		$this->CI->email->reply_to($this->_email_reply_to_address);
		$this->CI->email->subject($subject);
		$this->CI->email->message($html_message);
		$this->CI->email->set_alt_message($plaintext_message);

		# If there is an attachment supplied, attach it to the email
		if( $attachmentPath ){
			$this->CI->email->attach(APP_ROOT . $attachmentPath);
		}

		$sent = $this->CI->email->send();

		# Clear the email from memory so that i.e. attachments etc aren't sent
		# to emails sent after this.
		$this->CI->email->clear(TRUE);

		if ($sent) {
			return true;
		}

		return false;
	}
}
