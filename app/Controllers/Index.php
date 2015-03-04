<?php

namespace App\Controllers;

use View;

class Index extends Controller
{
	public function index()
	{
		echo 'index action is runningff';exit;
		return View::render('index');
	}

	/*public function __missing($args)
	{
		echo $args;exit;
	}*/
}