<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
		* alert
		* 
		* Tools to alert and set/get flashdata from ci_alerts.
		* 
		* @file		ci_alerts.php
		* @version		1.1.7
		* @date		03/28/2012
		*/

	// --------------------------------------------------------------------------

	/**
		* alert class.
		*/

	class Alert
	{
		// --------------------------------------------------------------------------

		/**
			* CI
			*
			* holds the codeigniter superobject.
			* 
			* @var mixed
			* @access private
			*/
		private $CI;

		// --------------------------------------------------------------------------

		/**
			* __construct function.
			* 
			* @access public
			* @return void
			*/
		public function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->library('session');
			$this->CI->config->load('alert',true);
			log_message('debug', 'Alerts: Library loaded.');
		}

		// --------------------------------------------------------------------------

		/**
			* set function.
			*
			* adds an item to the specified flasydata array.
			* 
			* @access public
			* @param string $type
			* @param string $msg
			* @return bool
			*/
		public function set($type, $msg)
		{
			// retrive the flashdata, add to the array, set it again
			$arr = $this->CI->session->userdata($this->CI->session->flashdata_key.':new:'.$type);
			if ($arr == FALSE || $arr == '') { $arr = array(); }

			// remove duplicates if configured to do so
			if (config_item('remove_duplicates')) { $arr = array_unique($arr); }

			$arr[] = $msg;
			$this->CI->session->set_flashdata($type, $arr);
		}

		// --------------------------------------------------------------------------

		/**
			* get function.
			*
			* gets all items or just items by the specified type as an array.
			* 
			* @access public
			* @param string $type (default: '')
			* @return array
			*/
		public function get($type = '')
		{
			// if it's all alerts
			if ($type == '')
			{
				$arr = array(
					'error' => $this->CI->session->flashdata('error'),
					'success' => $this->CI->session->flashdata('success'),
					'warning' => $this->CI->session->flashdata('warning'),
					'info' => $this->CI->session->flashdata('info')
				);
				return $arr;
			}
			else
			{
				return $this->CI->session->flashdata($type);
			}
		}

		// --------------------------------------------------------------------------

		/**
			* display function.
			*
			* returns html wrapped items, either all or limited to a specific type.
			* 
			* @access public
			* @param string $type (default: '')
			* @return string
			*/
		public function display($type = '')
		{	
			//	Configuration
			$this->CI->config->load('alert',true);
			
			$out = '';

			// if no type is passed, add all message data to output
			if ($type == '')
			{
				$arr = $this->get();

				if ($arr == FALSE) { $arr = array(); }

				foreach ($arr as $type => $items)
				{
					if (is_array($items))
					{
						$out .= $this->CI->config->item('before_all','alert');
						foreach ($items as $item)
						{
							$out .= $this->_wrap($item, $type);
						}
						$out .= $this->CI->config->item('after_all','alert');
					}
				}
			}
			else
			{	
				$arr = $this->get($type);

				if($arr == FALSE)
				{
					$arr = array();
				}

				if(is_array($arr))
				{
					$out .= $this->CI->config->item('before_all','alert');
					foreach($arr as $item)
					{	
						$out .= $this->_wrap($item, $type);
					}
					$out .= $this->CI->config->item('after_all','alert');
				}
			}
			return $out;
		}

		// --------------------------------------------------------------------------

		/**
			* _wrap function.
			*
			* wraps an item in it's configured html and returns the value.
			* 
			* @access private
			* @param string $msg
			* @param string $type
			* @return string
			*/
		private function _wrap($msg, $type)
		{	
			$out = '';
			$out .= $this->CI->config->item('before_each','alert');
			if($type != '') 
			{
				$out .= $this->CI->config->item('before_' . $type,'alert');
			}
			else
			{
				$out .= $this->CI->config->item('before_no_type','alert');
			}
			$out .= $msg;
			$out .= $this->CI->config->item('after_each','alert');
			if($type != '') 
			{
				$out .= $this->CI->config->item('after_' . $type,'alert');
			}
			else
			{
				$out .= $this->CI->config->item('after_no_type','alert');
			}
			return $out;
		}

		// --------------------------------------------------------------------------
	}

/* End of file ci_alerts.php */
/* Location: ./ci_authentication/libraries/ci_alerts.php */
