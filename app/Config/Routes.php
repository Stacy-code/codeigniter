<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}


/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
//$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Routes {Authentication}
 * --------------------------------------------------------------------
 */
$routes->group('', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    // Registration
    $routes->get('register', 'RegistrationController::register', ['as' => 'register']);
    $routes->post('register', 'RegistrationController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'RegistrationController::activateAccount', ['as' => 'activate-account']);

    // Login/out
    $routes->get('login', 'LoginController::login', ['as' => 'login']);
    $routes->post('login', 'LoginController::attemptLogin');
    $routes->get('logout', 'LoginController::logout');

    // Forgotten password and reset
    $routes->get('forgot-password', 'PasswordController::forgotPassword', ['as' => 'forgot-password']);
    $routes->post('forgot-password', 'PasswordController::attemptForgotPassword');
    $routes->get('reset-password', 'PasswordController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'PasswordController::attemptResetPassword');

    // Account settings
    $routes->get('account', 'AccountController::account', ['as' => 'account']);
    $routes->post('account', 'AccountController::updateAccount');
    $routes->post('change-email', 'AccountController::changeEmail');
    $routes->get('confirm-email', 'AccountController::confirmNewEmail');
    $routes->post('change-password', 'AccountController::changePassword');
    $routes->post('delete-account', 'AccountController::deleteAccount');
});


/*
 * --------------------------------------------------------------------
 * Routes {Admin}
 * --------------------------------------------------------------------
 */
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

});


/*
 * --------------------------------------------------------------------
 * Routes {Site}
 * --------------------------------------------------------------------
 */
$routes->group('', ['namespace' => 'App\Controllers\Frontend'], function ($routes) {
    $routes->get('/', 'HomeController::index');
});
