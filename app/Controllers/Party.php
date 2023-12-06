<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PartyModel;

class Party extends BaseController
{

    protected $PartyModel;
    public function __construct()
    {
        $this->PartyModel = new PartyModel();
    }
    public function index()
    {
        $data = array_merge($this->data, [
            'title' => "Party",
            'Party' => $this->PartyModel->getParty(),
        ]);
        return view('party/partyList', $data);
    }

    public function form()
    {
        $data = array_merge($this->data, [
            'title' => 'Party',
        ]);
        return view('party/partyForm', $data);
    }

    public function createParty()
    {
        $createParty = $this->PartyModel->createParty($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createParty) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Party</b>');
            return redirect()->to(base_url('party'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Party</b>');
            return redirect()->to(base_url('party'));
        }
    }
    public function editParty()
    {
        $id = $this->request->getGet('id');

        $data = array_merge($this->data, [
            'title' => "Party",
            'party' => $this->PartyModel->getParty($id),
        ]);
        return view('party/partyEdit', $data);
    }

    public function updateParty()
    {
        $updateParty = $this->PartyModel->updateParty($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($updateParty) {
            session()->setFlashdata('notif_success', '<b>Successfully update Party</b>');
            return redirect()->to(base_url('party'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to update Party</b>');
            return redirect()->to(base_url('party'));
        }
    }

    public function deleteParty()
    {
        $PartyID = $this->request->getGet("id");
        if (!$PartyID) {
            return redirect()->to(base_url('party'));
        }
        $deleteParty = $this->PartyModel->deleteParty($PartyID);
        if ($deleteParty) {
            session()->setFlashdata('notif_success', '<b>Successfully delete Party</b>');
            return redirect()->to(base_url('party'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to delete Party</b>');
            return redirect()->to(base_url('party'));
        }
    }
}
