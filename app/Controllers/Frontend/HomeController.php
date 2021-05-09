<?php

namespace App\Controllers\Frontend;

/**
 * Class HomeController
 *
 * @package App\Controllers\Frontend
 */
class HomeController extends ModuleController
{
    /**
     * @return string
     */
	public function index(): string
	{
		return view('welcome_message');
	}
}
