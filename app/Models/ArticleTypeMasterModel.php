<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleTypeMasterModel extends Model
{
	public function createArticletype($dataArticletype)
    {
        return $this->db->table('articletype')->insert([
          'name'     	=> $dataArticletype['inputName'] 
        ]);
    }

    public function getArticletype($ArticletypeID = false)
    {
        if ($ArticletypeID) {
            return $this->db->table('articletype')
            ->where(['articletype.id' => $ArticletypeID])
            ->get()->getRowArray();
        } else {
            return $this->db->table('articletype')
            ->get()->getResultArray();
        }
    }
}
