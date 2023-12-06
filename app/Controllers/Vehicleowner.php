<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehicleOwnerModel;

class Vehicleowner extends BaseController
{
    protected $VehicleownerModel;
    public function __construct()
    {
        $this->VehicleownerModel = new VehicleOwnerModel();
    }

    public function index()
    {
        $data = array_merge($this->data, [
            'title' => "Vehicle Owner",
            'Vehicleowner' => $this->VehicleownerModel->getVehicleowner(),
        ]);
        return view('vehicleowner/vehicleOwnerList', $data);
    }
    public function form()
    {
        $data = array_merge($this->data, [
            'title' => 'Vehicle Owner',
        ]);
        return view('vehicleOwner/vehicleOwnerForm', $data);
    }

    /**
     * Create a new vehicle owner
     */
    public function createVehicleowner()
    {
        $createVehicleowner = $this->VehicleownerModel->createVehicleowner($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createVehicleowner) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        }
    }

	public function editVehicleOwner()
    {
        $id = $this->request->getGet('id');

        $data = array_merge($this->data, [
            'title' => "Vehicle owner",
            'vicleowner' => $this->VehicleownerModel->getVehicleowner($id),
        ]);
        return view('vehicleOwner/vehicleOwnerEdit', $data);
    }

    /**
     * update a vehicle owner
     */
    public function updateVehicleowner()
    {
        $updateVehicleowner = $this->VehicleownerModel->updateVehicleowner($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($updateVehicleowner) {
            session()->setFlashdata('notif_success', '<b>Successfully update Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to update Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        }
    }

    /**
     * Delete a Vehicle owner
     */
    public function deleteVehicleowner()
    {
		$VehicleownerID = $this->request->getGet("id");
        if (!$VehicleownerID) {
            return redirect()->to(base_url('vehicleowner'));
        }
        $deleteVehicleowner = $this->VehicleownerModel->deleteVehicleowner($VehicleownerID);
        if ($deleteVehicleowner) {
            session()->setFlashdata('notif_success', '<b>Successfully delete Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to delete Vehicleowner</b>');
            return redirect()->to(base_url('vehicleowner'));
        }
    }
}
