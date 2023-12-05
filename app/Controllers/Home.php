<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = array_merge($this->data, [
			'title' 	=> 'Users Page',
			'Users'		=> $this->userModel->getUser(),
			'UserRole'	=> $this->userModel->getUserRole()
		]);
		// return view('users/userList', $data);
        return view('dashboard',$data);
    }
}
