<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Custom Ragnarok Server Configurations can be changed and added here

$config['header_title'] = 'PHPMonkeys Ragnarok Cpanel';
$config['site_url'] = 'http://example.com';


// Set MD5 password true or false according to your server's configutations
$config['pass_md5'] = false;

//Services availability configuration
$config['register_service'] = true;	$config['register_service_message'] = '<i>Registration Service is currently Disabled</i>';


//Home menu links edit here
$config['home'] = $config['site_url'];
$config['forum'] = '#';
$config['downloads'] = '#';
$config['login'] = '#';
$config['register'] = 'register';
$config['server_info'] = '#';
$config['item_db'] = '#';