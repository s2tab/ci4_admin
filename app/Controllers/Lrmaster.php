<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		use App\Models\BranchModel;
		use App\Models\LRModel;

		class Lrmaster extends BaseController
		{
			protected $BranchModel;
			protected $LrDetailsModel;
			function __construct()
			{
				$this->BranchModel = new BranchModel();
				$this->LrDetailsModel = new LRModel();
			}
			public function index()
			{
				
				$data = array_merge($this->data, [
					'title'         => 'L-R',
					'Branch'    => $this->BranchModel->getBranch(),
					'LrDetails'    => $this->LrDetailsModel->getLrDetails()

				]);
				return view('lrMaster/lrmasterList', $data);
			}

			public function getLrMasterList(){
				$period = $this->request->getPost('period');
				$fromDate = $this->request->getPost('fromDate');
				$toDate = $this->request->getPost('toDate');

				$returnData = $this->LrDetailsModel->filterLRDetails($period, $fromDate, $toDate);
			     return json_encode($returnData);
			}

			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'L-R',
					'Branch'    => $this->BranchModel->getBranch()

				]);
				return view('lrMaster/lrmasterForm', $data);
			}

			public function createLrDetails()
			{
				$createLrDetails = $this->LrDetailsModel->createLrDetails($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($createLrDetails) {
					session()->setFlashdata('notif_success', '<b>Successfully added new Lr Details</b>');
					return redirect()->to(base_url('lrmaster'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to add new Lr Details</b>');
					return redirect()->to(base_url('lrmaster'));
				}
			}

			public function updateLrDetails()
			{
				$updateLrDetails = $this->LrDetailsModel->updateLrDetails($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($updateLrDetails) {
					session()->setFlashdata('notif_success', '<b>Successfully update Lr Details</b>');
					return redirect()->to(base_url('lr_details'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to update Lr Details</b>');
					return redirect()->to(base_url('lr_details'));
				}
			}

			
			public function deleteLrDetails($LrDetailsID)
			{
				if (!$LrDetailsID) {
					return redirect()->to(base_url('lr_details'));
				}
				$deleteLrDetails = $this->LrDetailsModel->deleteLrDetails($LrDetailsID);
				if ($deleteLrDetails) {
					session()->setFlashdata('notif_success', '<b>Successfully delete Lr Details</b>');
					return redirect()->to(base_url('lr_details'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to delete Lr Details</b>');
					return redirect()->to(base_url('lr_details'));
				}
			}
				 
		}
		