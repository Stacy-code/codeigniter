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
    $routes->post('logout', 'LoginController::logout');

    // Forgotten password and reset
    $routes->get('forgot-password', 'PasswordController::forgotPassword', ['as' => 'forgot-password']);
    $routes->post('forgot-password', 'PasswordController::attemptForgotPassword');
    $routes->get('reset-password', 'PasswordController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'PasswordController::attemptResetPassword');
});


/*
 * --------------------------------------------------------------------
 * Routes {Admin}
 * --------------------------------------------------------------------
 */
$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'DashboardController::index');
    $routes->presenter('category', ['controller' =>'CategoryController']);
    $routes->presenter('post', ['controller' =>'PostController']);
});


/*
 * --------------------------------------------------------------------
 * Routes {Site}
 * --------------------------------------------------------------------
 */
$routes->group('', ['namespace' => 'App\Controllers\Frontend'], function ($routes) {
    $routes->get('/home', 'QuestionController::index');
    $routes->get('/', 'QuestionController::index');
    $routes->get('/create', 'QuestionController::new');
    $routes->post('/create', 'QuestionController::create');
    $routes->get('/question/view/(:num)', 'QuestionController::view/$1');
    $routes->post('/question/view/(:num)', 'AnswerController::create/$1');

});


