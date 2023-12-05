<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class akshay extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => '/akshay'
				]);
				return view('akshay', $data);
			}
		}
		