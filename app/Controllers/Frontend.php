<?php

namespace App\Controllers;

class Frontend extends BaseController
{
	public function index()
	{
		return view('frontend/login');
	}

	public function register()
	{
		return view('frontend/register');
	}

	//--------------------------------------------------------------------

}
