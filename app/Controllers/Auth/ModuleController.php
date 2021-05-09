<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

/**
 * Class ModuleController
 *
 * @package App\Controllers\Auth
 */
abstract class ModuleController extends BaseController
{
    /**
     * Redirect to home url if success {register, login, pass reset}
     *
     * @var string $redirectIfSuccess
     */
    protected $homeUrl = '/';
}
