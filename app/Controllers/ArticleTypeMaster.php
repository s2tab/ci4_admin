<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleTypeMasterModel;
class ArticleTypeMaster extends BaseController
{
	function __construct()
    {
		
        $this->ArticletypeModel = new ArticleTypeMasterModel();
    }
    public function index()
    {
        $data = array_merge($this->data, [
            'title'     => "Articletype",
            'Articletype'    => $this->ArticletypeModel->getArticletype()
        ]);
        return view('articletypemasterList', $data);
    }
    public function form()
    {
        $data = array_merge($this->data, [
            'title' => 'Article Type',
        ]);
        return view('articletypemasterForm', $data);
    }
    public function createArticletype()
    {
        $createArticletype = $this->ArticletypeModel->createArticletype($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createArticletype) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Articletype</b>');
            return redirect()->to(base_url('articletypemaster'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Articletype</b>');
            return redirect()->to(base_url('articletypemaster'));
        }
    }
}
