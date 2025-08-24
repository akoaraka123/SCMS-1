<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Please log in to access this page.');
            return redirect()->to('/login');
        }
        
        // Check if user is active (optional)
        if (isset($arguments[0]) && $arguments[0] === 'active') {
            if (!$session->get('user_active')) {
                $session->setFlashdata('error', 'Your account is deactivated.');
                return redirect()->to('/login');
            }
        }
        
        // Check role-based access (optional)
        if (isset($arguments[0]) && in_array($arguments[0], ['admin', 'manager', 'user'])) {
            $userRole = $session->get('user_role');
            if ($userRole !== $arguments[0] && $userRole !== 'admin') {
                $session->setFlashdata('error', 'You do not have permission to access this page.');
                return redirect()->to('/dashboard');
            }
        }
    }

    /**
     * We don't have anything to do here.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
