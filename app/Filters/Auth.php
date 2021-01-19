<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        $byPass = ['login', 'api'];
        if (!in_array($uri->getSegment(1), $byPass)) {
            if (!session()->get('logged_in')) {
                // then redirct to login page
                return redirect()->to('/login');
            }
        }
        // if user not logged in
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
