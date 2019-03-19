<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/


// Memory Limit Increase
$hook['pre_system'][] = array(
						'class'    => 'Memory_limit_increase',
						'function' => 'increase_mem_limit',
						'filename' => 'Memory_limit_increase.php',
						'filepath' => 'hooks'
                      );


// Cloudflare IP Detection
$hook['pre_system'][] = array(
						'class'    => 'Cloodflare',
						'function' => 'resetIp',
						'filename' => 'Cloodflare.php',
						'filepath' => 'hooks'
                      );