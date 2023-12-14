<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Filters\PermissionFilter;
use App\Models\VehicleModel;

class Vehicle extends BaseController
{

    protected $VehicleModel;
    public function __construct()
    {
        // $this->checkPermissions();
        $this->VehicleModel = new VehicleModel();
    }
    // public function checkPermissions(){
    //     $permission = new PermissionFilter();
    //     $roleId = session()->get('role');
    //     if (!$permission->checkPermission($roleId, 'vehicle')) {
    //         return redirect()->to(base_url('akshay'));
    //     }
    // }
    public function index()
    {
        // return redirect()->to(base_url('wavares'));

        $data = array_merge($this->data, [
            'title' => "Vehicle",
            'Vehicle' => $this->VehicleModel->getVehicle(),
        ]);
        return view('vehicle/vehicleList', $data);
    }
    public function createVehicle()
    {

        $createVehicle = $this->VehicleModel->createVehicle($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createVehicle) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        }
    }

    public function editVehicle()
    {
        $id = $this->request->getGet('id');

        $data = array_merge($this->data, [
            'title' => "Vehicle",
            'vehicle' => $this->VehicleModel->getVehicle($id),
        ]);
        return view('vehicle/vehicleEdit', $data);
    }

    public function updateVehicle()
    {
        $updateVehicle = $this->VehicleModel->updateVehicle($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($updateVehicle) {
            session()->setFlashdata('notif_success', '<b>Successfully update Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to update Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        }
    }
    public function deleteVehicle()
    {
        $VehicleID = $this->request->getGet("id");
        if (!$VehicleID) {
            return redirect()->to(base_url('vehicle'));
        }
        $deleteVehicle = $this->VehicleModel->deleteVehicle($VehicleID);
        if ($deleteVehicle) {
            session()->setFlashdata('notif_success', '<b>Successfully delete Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to delete Vehicle</b>');
            return redirect()->to(base_url('vehicle'));
        }
    }
    public function form()
    {
        $data = array_merge($this->data, [
            'title' => 'Vehicle',
        ]);
        return view('vehicle/vehicleForm', $data);
    }
}
