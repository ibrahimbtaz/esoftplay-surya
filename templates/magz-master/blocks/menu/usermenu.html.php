<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';

echo magazine_horizontal_login($menus, $y, $x);
$block->title = '';
