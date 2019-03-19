<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cloodflare
{
    function resetIp()
    {
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
		{
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
    }
}