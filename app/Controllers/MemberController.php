<?php
namespace App\Controllers;

use App\Models\MemberModel;

class MemberController extends BaseController
{
    private $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    // Menampilkan semua data jemaat
    public function index()
    {
        $data['members'] = $this->memberModel->findAll();
        return view('members/index', $data);
    }

    // Menambahkan data jemaat baru
    public function create()
    {
        return view('members/create');
    }

    public function store()
    {
        $this->memberModel->save([
            'name'          => $this->request->getPost('name'),
            'address'       => $this->request->getPost('address'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'baptized_date' => $this->request->getPost('baptized_date'),
        ]);

        return redirect()->to('/members');
    }

    // Mengedit data jemaat
    public function edit($id)
    {
        $data['member'] = $this->memberModel->find($id);
        return view('members/edit', $data);
    }

    public function update($id)
    {
        $this->memberModel->update($id, [
            'name'          => $this->request->getPost('name'),
            'address'       => $this->request->getPost('address'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'baptized_date' => $this->request->getPost('baptized_date'),
        ]);

        return redirect()->to('/members');
    }

    // Menghapus data jemaat
    public function delete($id)
    {
        $this->memberModel->delete($id);
        return redirect()->to('/members');
    }
}
