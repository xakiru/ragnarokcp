<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Custom Ragnarok Server Configurations can be changed and added here

$config['header_title'] = 'PHPMonkeys Ragnarok Cpanel';
$config['site_url'] = 'http://example.com';


// Set MD5 password true or false according to your server's configutations
$config['pass_md5'] = false;

//Services availability configuration
$config['register_service'] = true;	$config['register_service_message'] = '<i>Registration Service is currently Disabled</i>';
$config['login_service'] = true;	$config['login_service_message'] = '<i>Login Service is currently Disabled</i>';
$config['my_account_service'] = false;	$config['my_account_service_message'] = '<i>My Account Service is currently Disabled</i>';
$config['change_password_service'] = false;	$config['change_password_service_message'] = '<i>Change Password Service is currently Disabled</i>';

//Data restriction config
$config['account_id_view'] = '40'; // Set minimum account level here to view account id in control panel