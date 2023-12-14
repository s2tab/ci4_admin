<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
	public function getBranch($BranchID = false)
    {
        if ($BranchID) {
            return $this->db->table('branch')
            ->where(['branch.id' => $BranchID])
            ->get()->getRowArray();
        } else {
            return $this->db->table('branch')
            ->get()->getResultArray();
        }
    }

	public function createBranch($dataBranch)
    {
        return $this->db->table('branch')->insert([
          'name'     	=> $dataBranch['inputName']
        ]);
    }

	public function updateBranch($dataBranch)
    {
        return $this->db->table('branch')->update([
          'name'     	=> $dataBranch['inputName']
            ], ['id' => $dataBranch['inputId']]);
    }

	public function deleteBranch($BranchID)
	{
		return $this->db->table('branch')->delete(['id' => $BranchID]);
	}
}
