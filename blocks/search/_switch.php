<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

//Menampilkan Search atau kolomn pencarian
include tpl(@$config['template'] . '.html.php', 'search.html.php');