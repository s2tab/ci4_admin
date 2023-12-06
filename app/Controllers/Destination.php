<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		use App\Models\DestinationModel;
		class Destination extends BaseController
		{

			protected $DestinationModel;

			function __construct()
			{
				$this->DestinationModel = new DestinationModel();
			}
			public function index()
			{
				$data = array_merge($this->data, [
					'title'     => "Destination",
					'Destination'    => $this->DestinationModel->getDestination()
				]);
				return view('destination/destinationList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Destination'
				]);
				return view('destination/destinationForm', $data);
			}
			public function createDestination()
			{
				$createDestination = $this->DestinationModel->createDestination($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($createDestination) {
					session()->setFlashdata('notif_success', '<b>Successfully added new Destination</b>');
					return redirect()->to(base_url('destination'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to add new Destination</b>');
					return redirect()->to(base_url('destination'));
				}
			}

			public function editDestination()
			{
				$id = $this->request->getGet('id');
		
				$data = array_merge($this->data, [
					'title' => "Articletype",
					'destination' => $this->DestinationModel->getDestination($id),
				]);
				return view('destination/destinationEdit', $data);
			}
			public function updateDestination()
			{
				$updateDestination = $this->DestinationModel->updateDestination($this->request->getPost(null, FILTER_UNSAFE_RAW));
				if ($updateDestination) {
					session()->setFlashdata('notif_success', '<b>Successfully update Destination</b>');
					return redirect()->to(base_url('destination'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to update Destination</b>');
					return redirect()->to(base_url('destination'));
				}
			}

			public function deleteDestination()
			{
				$DestinationID =  $this->request->getGet("id");

				if (!$DestinationID) {
					return redirect()->to(base_url('destination'));
				}
				$deleteDestination = $this->DestinationModel->deleteDestination($DestinationID);
				if ($deleteDestination) {
					session()->setFlashdata('notif_success', '<b>Successfully delete Destination</b>');
					return redirect()->to(base_url('destination'));
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to delete Destination</b>');
					return redirect()->to(base_url('destination'));
				}
			}
		}
		