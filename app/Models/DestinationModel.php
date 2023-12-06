<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinationModel extends Model
{
    public function getDestination($DestinationID = false)
    {
        if ($DestinationID) {
            return $this->db->table('destination')
                ->where(['destination.id' => $DestinationID])
                ->get()->getRowArray();
        } else {
            return $this->db->table('destination')
                ->get()->getResultArray();
        }
    }

    public function createDestination($dataDestination)
    {
        return $this->db->table('destination')->insert([
            'name' => $dataDestination['inputName']
        ]);
    }

    public function updateDestination($dataDestination)
    {
        return $this->db->table('destination')->update([
            'name' => $dataDestination['inputName']
        ], ['id' => $dataDestination['inputDestinationID']]);
    }

    public function deleteDestination($DestinationID)
    {
        return $this->db->table('destination')->delete(['id' => $DestinationID]);
    }
}
