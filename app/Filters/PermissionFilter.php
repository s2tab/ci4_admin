<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $url = $request->uri->getSegment(1);
        $roleId = session()->get('role');
        // Logic to check permissions before the route is executed
        if (!$this->checkPermission($roleId, $url)) {
            // Redirect to a forbidden page or handle unauthorized access
            return redirect()->to('Welcome');
        }
        return $request;
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
    private function checkPermission($roleId, $url)
    {

        // $ci = &get_instance();
        $userModel = new \App\Models\UserModel();
        $permission = $userModel->getAccessMenu($roleId);
        echo "<pre>";
        print_r($permission);
        $found = false;
        foreach ($permission as $item) {
            if ($item['url'] === $url) {
                $found = true;
                break; // URL found, no need to continue searching
            }
        }

        if ($found) {
           return true;
        } else {
            return false;
        }
        die;
        return true; // For demonstration purposes, always allowing access
    }
}
