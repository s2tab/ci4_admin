<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    public function getVehicle($VehicleID = false)
    {
        if ($VehicleID) {
            return $this->db->table('vehicle')
                ->where(['vehicle.id' => $VehicleID])
                ->get()->getRowArray();
        } else {
            return $this->db->table('vehicle')
                ->get()->getResultArray();
        }
    }
    public function createVehicle($dataVehicle)
    {
        
        return $this->db->table('vehicle')->insert([
            'vehicle_name' => $dataVehicle['inputVehicleName'],
            'vehicle_number' => $dataVehicle['inputVehicleNumber'],
            'business_name' => $dataVehicle['inputBusinessName'],
            'insurance_no' => $dataVehicle['inputInsuranceNo'],
            'insurance_valid_from' => $dataVehicle['inputInsuranceValidFrom'],
            'insurance_valid_till' => $dataVehicle['inputInsuranceValidTill'],
            'vehicle_capacity' => $dataVehicle['inputVehicleCapacity'],
            'vehicle_size' => $dataVehicle['inputVehicleSize']
        ]);
    }

    public function updateVehicle($dataVehicle)
    {
        return $this->db->table('vehicle')->update([
            'vehicle_name' => $dataVehicle['inputVehicleName'],
            'vehicle_number' => $dataVehicle['inputVehicleNumber'],
            'business_name' => $dataVehicle['inputBusinessName'],
            'insurance_no' => $dataVehicle['inputInsuranceNo'],
            'insurance_valid_from' => $dataVehicle['inputInsuranceValidFrom'],
            'insurance_valid_till' => $dataVehicle['inputInsuranceValidTill'],
            'vehicle_capacity' => $dataVehicle['inputVehicleCapacity'],
            'vehicle_size' => $dataVehicle['inputVehicleSize'],
           
        ], ['id' => $dataVehicle['inputVehicleID']]);
    }

    public function deleteVehicle($VehicleID)
    {
        return $this->db->table('vehicle')->delete(['id' => $VehicleID]);
    }

}
