<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Class AuthFilter
 *
 * @package App\Filters
 */
class AuthFilter implements FilterInterface
{
    /**
     * @var string $loginUrl
     */
    private $loginUrl = 'login';

    /**
     * @param RequestInterface $request
     * @param null             $arguments
     *
     * @return mixed|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = service('session');
        if (!$session->isLoggedIn) {
            return redirect()->to($this->loginUrl);
        }
    }

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param null              $arguments
     *
     * @return mixed|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
