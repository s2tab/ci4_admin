<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		use App\Models\BranchModel;

		class Branch extends BaseController
		{
			protected $BranchModel;
			function __construct()
			{
				$this->BranchModel = new BranchModel();
			}


			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Branch',
					'Branch'    => $this->BranchModel->getBranch()
				]);
				return view('branch/branchList', $data);
			}

			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Branch'
				]);
				return view('branch/branchForm', $data);
			}

			/**
			 * Create a new branch
			 */
			public function createBranch()
			{
				$createBranch = $this->BranchModel->createBranch($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($createBranch) {
					session()->setFlashdata('notif_success', '<b>Successfully added new Branch</b>');
					return redirect()->to(base_url('branch'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to add new Branch</b>');
					return redirect()->to(base_url('branch'));
				}
			}

			/**
			 * Edit Branch
			 */
			public function editbranch()
			{
				$id = $this->request->getGet('id');
		
				$data = array_merge($this->data, [
					'title' => "Branch",
					'branch' => $this->BranchModel->getBranch($id),
				]);
				return view('branch/branchEdit', $data);
			}

			/**
			 * update a Branch
			 */
			public function updateBranch()
			{
				$updateBranch = $this->BranchModel->updateBranch($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($updateBranch) {
					session()->setFlashdata('notif_success', '<b>Successfully update Branch</b>');
					return redirect()->to(base_url('branch'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to update Branch</b>');
					return redirect()->to(base_url('branch'));
				}
			}

			/**
			 * Update Branch
			 */
			public function deleteBranch()
			{
				$BranchID = $this->request->getGet("id");
				if (!$BranchID) {
					return redirect()->to(base_url('branch'));
				}
				$deleteBranch = $this->BranchModel->deleteBranch($BranchID);
				if ($deleteBranch) {
					session()->setFlashdata('notif_success', '<b>Successfully delete Branch</b>');
					return redirect()->to(base_url('branch'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to delete Branch</b>');
					return redirect()->to(base_url('branch'));
				}
			}
		}
		