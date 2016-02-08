<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Notifier Configuration
| -------------------------------------------------------------------
| This file contains an array of Gas ORM configuration.
|
*/

/*
| -------------------------------------------------------------------
|  Models path
| -------------------------------------------------------------------
| Prototype:
|
|  key for namespace, value for path
|  eg, the default was :
|
|  $config['models_path'] = array('Model' => APPPATH.'models');
|
|  Above mean, if within your script you requesting something like :
|
|  $user = Model\User::all();
|
|  Then Gas autoloader will find 'user.php' within APPPATH.'models'
|
*/



$config['smtp_host'] = 'smtp.mandrillapp.com';
$config['smtp_port'] = '587';
$config['smtp_username'] = 'support@varyx.io';
$config['smtp_password'] = 'EjhhESX5NM2bbkDdOXUY5A';

$config['email_type'] = 'html';

$config['email_from_address'] = 'support@varyx.io';
$config['email_from_name'] = 'Var YX Support';
$config['email_reply_to_address'] = 'support@varyx.io';
$config['email_contact_phone_number'] = '';
$config['email_template_view_directory'] = 'email/';
$config['static_site_url'] = 'http://manager.varyx.io/';
