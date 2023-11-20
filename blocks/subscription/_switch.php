<?php  if ( ! defined('_VALID_BBC')) exit('No direct script access allowed');

// Menampilkan Subcription
$output = array();

include tpl(@$config['template'].'.html.php', 'default.html.php');
