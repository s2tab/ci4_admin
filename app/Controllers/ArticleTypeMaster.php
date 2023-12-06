<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleTypeMasterModel;

class ArticleTypeMaster extends BaseController
{
    protected $ArticletypeModel;
    public function __construct()
    {

        $this->ArticletypeModel = new ArticleTypeMasterModel();
    }
    public function index()
    {
        $data = array_merge($this->data, [
            'title' => "Articletype",
            'Articletype' => $this->ArticletypeModel->getArticletype(),
        ]);
        return view('articleType/articletypemasterList', $data);
    }
    public function form()
    {
        $data = array_merge($this->data, [
            'title' => 'Article Type',
        ]);
        return view('articleType/articletypemasterForm', $data);
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

    public function editArticletype()
    {
        $id = $this->request->getGet('id');

        $data = array_merge($this->data, [
            'title' => "Articletype",
            'Articletype' => $this->ArticletypeModel->getArticletype($id),
        ]);
        return view('articleType/articleTypeEdit', $data);
    }
    public function updateArticletype()
    {
        
        $updateArticletype = $this->ArticletypeModel->updateArticletype($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($updateArticletype) {
            session()->setFlashdata('notif_success', '<b>Successfully update Articletype</b>');
            return redirect()->to(base_url('ArticleTypeMaster'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to update Articletype</b>');
            return redirect()->to(base_url('ArticleTypeMaster'));
        }
    }

    public function deleteArticletype()
    {
     $ArticletypeID =  $this->request->getGet("id");
        if (!$ArticletypeID) {
            return redirect()->to(base_url('ArticleTypeMaster'));
        }
        $deleteArticletype = $this->ArticletypeModel->deleteArticletype($ArticletypeID);
        if ($deleteArticletype) {
            session()->setFlashdata('notif_success', '<b>Successfully delete Articletype</b>');
            return redirect()->to(base_url('ArticleTypeMaster'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to delete Articletype</b>');
            return redirect()->to(base_url('ArticleTypeMaster'));
        }
    }
}
