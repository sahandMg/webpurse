<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memory_limit_increase
{
    function increase_mem_limit()
    {
		ini_set("memory_limit","128M");
    }
}