<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$_setting = array(
	'caption'	=> array(
		'text' => 'Caption',
		'type' => 'text',
		'default' => 'Your mail'
	),
	'info'	=> array(
		'text' => 'Info',
		'type' => 'text',
		'default' => 'By subscribing you will receive new articles in your email.'
	),
	'list_id'	=> array(
		'text' => 'List ID',
		'type' => 'text',
		// 'default' => '395406e297'
	),
	'api'	=> array(
		'text' => 'Api Key',
		'type' => 'text',
		// 'default' => '1f42f8a6bfb60caac8b8c8443257f2fb-us21'
	),
);
?>