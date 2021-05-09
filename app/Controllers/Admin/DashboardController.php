<?php

namespace App\Controllers\Admin;

/**
 * Class DashboardController
 *
 * @package App\Controllers\Admin
 */
class DashboardController extends ModuleController
{
    /**
     * @return string
     */
    public function index(): string
    {
        return view('Templates/Admin/Dashboard/index');
    }
}
