<?php

namespace App\Controllers;

class Controller
{
	public function __missing($method, $args = [])
	{
		print_r($method);
		print_r($args);
	}


	/*final public function __call($method, $args)
	{
		if ($method == '__missing')
		{
			$this->__missing($args);
		}
	}*/
}