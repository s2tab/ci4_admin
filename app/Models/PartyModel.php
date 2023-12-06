<?php

namespace App\Models;

use CodeIgniter\Model;

class PartyModel extends Model
{
    public function getParty($PartyID = false)
    {
        if ($PartyID) {
            return $this->db->table('party')
                ->where(['party.id' => $PartyID])
                ->get()->getRowArray();
        } else {
            return $this->db->table('party')
                ->get()->getResultArray();
        }
    }

    public function createParty($dataParty)
    {
        return $this->db->table('party')->insert([
            'name' => $dataParty['inputName'],
            'email' => $dataParty['inputEmail'],
            'contactNo' => $dataParty['inputContactno'],
            'partyType' => $dataParty['inputPartytype'],
            'address' => $dataParty['inputAddress'],
            'openingBalance' => $dataParty['inputOpeningbalance'],
            'contactPerson' => $dataParty['inputContactperson'],
            'gstin' => $dataParty['inputGstin'],
            'alternateContactNo' => $dataParty['inputAlternatecontactno'],
            'state' => $dataParty['inputState'],
            'branch' => $dataParty['inputBranch'],
            'bc' => $dataParty['inputBc']
        ]);
    }

    public function updateParty($dataParty)
    {
        return $this->db->table('party')->update([
            'name' => $dataParty['inputName'],
            'email' => $dataParty['inputEmail'],
            'contactNo' => $dataParty['inputContactno'],
            'partyType' => $dataParty['inputPartytype'],
            'address' => $dataParty['inputAddress'],
            'openingBalance' => $dataParty['inputOpeningbalance'],
            'contactPerson' => $dataParty['inputContactperson'],
            'gstin' => $dataParty['inputGstin'],
            'alternateContactNo' => $dataParty['inputAlternatecontactno'],
            'state' => $dataParty['inputState'],
            'branch' => $dataParty['inputBranch'],
            'bc' => $dataParty['inputBc']
        ], ['id' => $dataParty['inputId']]);
    }

    public function deleteParty($PartyID)
    {
        return $this->db->table('party')->delete(['id' => $PartyID]);
    }
}
