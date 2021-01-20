<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ApiAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        $segment = ['api'];
        if (in_array($uri->getSegment(1), $segment) && $uri->getSegment(2) != 'login') {
            if (!session()->get('token')) {
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
