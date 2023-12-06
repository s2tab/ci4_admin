<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleOwnerModel extends Model
{
    public function getVehicleowner($VehicleownerID = false)
    {
        if ($VehicleownerID) {
            return $this->db->table('vehicleowner')
                ->where(['vehicleowner.id' => $VehicleownerID])
                ->get()->getRowArray();
        } else {
            return $this->db->table('vehicleowner')
                ->get()->getResultArray();
        }
    }

    public function createVehicleowner($dataVehicleowner)
    {
        return $this->db->table('vehicleowner')->insert([
            'name' => $dataVehicleowner['inputName'],
            'email' => $dataVehicleowner['inputEmail'],
            'contactNo' => $dataVehicleowner['inputContactno'],
            'address' => $dataVehicleowner['inputAddress'],
            'openingBalance' => $dataVehicleowner['inputOpeningbalance'],
            'gstin' => $dataVehicleowner['inputGstin'],
            'state' => $dataVehicleowner['inputState'],
            'branch' => $dataVehicleowner['inputBranch'],
            'adhaarNo' => $dataVehicleowner['inputAdhaarno'],
            'panNo' => $dataVehicleowner['inputPanno']
        ]);
    }

    public function updateVehicleowner($dataVehicleowner)
    {
        return $this->db->table('vehicleowner')->update([
            'name' => $dataVehicleowner['inputName'],
            'email' => $dataVehicleowner['inputEmail'],
            'contactNo' => $dataVehicleowner['inputContactno'],
            'address' => $dataVehicleowner['inputAddress'],
            'openingBalance' => $dataVehicleowner['inputOpeningbalance'],
            'gstin' => $dataVehicleowner['inputGstin'],
            'state' => $dataVehicleowner['inputState'],
            'branch' => $dataVehicleowner['inputBranch'],
            'adhaarNo' => $dataVehicleowner['inputAdhaarno'],
            'panNo' => $dataVehicleowner['inputPanno']
        ], ['id' => $dataVehicleowner['id']]);
    }

    public function deleteVehicleowner($VehicleownerID)
    {
        return $this->db->table('vehicleowner')->delete(['id' => $VehicleownerID]);
    }
}
