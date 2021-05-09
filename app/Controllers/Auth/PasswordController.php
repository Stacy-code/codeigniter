<?php

namespace App\Controllers\Auth;

use Config\Services;
use Auth\Models\UserModel;
use CodeIgniter\Session\Session;
use \ReflectionException;

/**
 * Class PasswordController
 *
 * @package App\Controllers\Auth
 */
class PasswordController extends ModuleController
{
    /**
     * Access to current session.
     *
     * @var Session $session
     */
    protected $session;

    /**
     * Start session
     */
    public function boot()
    {
        parent::boot();
        $this->session = Services::session();
    }

    /**
     * User forgot password
     */
    public function forgotPassword()
    {
        if ($this->session->isLoggedIn) {
            return redirect()->to($this->homeUrl);
        }

        return view('Templates/Auth/password-forgot');
    }

    /**
     * Attempt forgot user password
     *
     * @throws ReflectionException
     */
    public function attemptForgotPassword()
    {
        // validate request
        if (!$this->validate(['email' => 'required|valid_email'])) {
            return redirect()->back()->with('error', lang('Auth.wrongEmail'));
        }

        // check if email exists in DB
        $users = new UserModel();
        $user = $users->where('email', $this->request->getPost('email'))->first();
        if (!$user) {
            return redirect()->back()->with('error', lang('Auth.wrongEmail'));
        }

        // check if email is already sent to prevent spam
        if (!empty($user['reset_expires']) && $user['reset_expires'] >= time()) {
            return redirect()->back()->with('error', lang('Auth.emailAlreadySent'));
        }

        // set reset hash and expiration
        helper('text');
        $updatedUser['id'] = $user['id'];
        $updatedUser['reset_hash'] = random_string('alnum', 32);
        $updatedUser['reset_expires'] = time() + HOUR;
        $users->save($updatedUser);

        // send password reset e-mail
        helper('auth');
        send_password_reset_email($this->request->getPost('email'), $updatedUser['reset_hash']);

        return redirect()->back()->with('success', lang('Auth.forgottenPasswordEmail'));
    }

    //--------------------------------------------------------------------

    public function resetPassword()
    {
        // check reset hash and expiration
        $users = new UserModel();
        $user = $users->where('reset_hash', $this->request->getGet('token'))
            ->where('reset_expires >', time())
            ->first();

        if (!$user) {
            return redirect()->to('login')->with('error', lang('Auth.invalidRequest'));
        }

        return view('Templates/Auth/password-reset');
    }

    //--------------------------------------------------------------------

    public function attemptResetPassword()
    {
        // validate request
        $rules = [
            'token' => 'required',
            'password' => 'required|min_length[5]',
            'password_confirm' => 'matches[password]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', lang('Auth.passwordMismatch'));
        }

        // check reset hash, expiration
        $users = new UserModel();
        $user = $users->where('reset_hash', $this->request->getPost('token'))
            ->where('reset_expires >', time())
            ->first();

        if (!$user) {
            return redirect()->to('login')->with('error', lang('Auth.invalidRequest'));
        }

        // update user password
        $updatedUser['id'] = $user['id'];
        $updatedUser['password'] = $this->request->getPost('password');
        $updatedUser['reset_hash'] = null;
        $updatedUser['reset_expires'] = null;
        $users->save($updatedUser);

        // redirect to login
        return redirect()->to('login')->with('success', lang('Auth.passwordUpdateSuccess'));
    }
}
