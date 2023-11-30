<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

switch($Bbc->mod['task']){
	default:
		echo 'Invalid action <b>'.$Bbc->mod['task'].'</b> has been received...';
		break;
}