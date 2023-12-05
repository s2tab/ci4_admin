<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class Adduser extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Add User'
				]);
				return view('adduserList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Add User'
				]);
				return view('adduserForm', $data);
			}
		}
		