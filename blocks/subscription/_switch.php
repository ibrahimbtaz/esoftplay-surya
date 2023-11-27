<?php  if ( ! defined('_VALID_BBC')) exit('No direct script access allowed');

// Menampilkan Subcription
$output = array();
	include _ROOT.'modules/magazine/mailchimp.php';

include tpl(@$config['template'].'.html.php', 'default.html.php');
