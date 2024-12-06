<?php
namespace App\Controllers;

use App\Models\DevotionModel;

class DevotionController extends BaseController
{
    private $devotionModel;

    public function __construct()
    {
        $this->devotionModel = new DevotionModel();
    }

    // Menampilkan semua renungan
    public function index()
    {
        $data['devotions'] = $this->devotionModel->findAll();
        return view('devotions/index', $data);
    }

    // Menambahkan renungan baru
    public function create()
    {
        return view('devotions/create');
    }

    public function store()
    {
        $this->devotionModel->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'date'    => $this->request->getPost('date'),
        ]);

        return redirect()->to('/devotions');
    }

    // Mengedit renungan
    public function edit($id)
    {
        $data['devotion'] = $this->devotionModel->find($id);
        return view('devotions/edit', $data);
    }

    public function update($id)
    {
        $this->devotionModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'date'    => $this->request->getPost('date'),
        ]);

        return redirect()->to('/devotions');
    }

    // Menghapus renungan
    public function delete($id)
    {
        $this->devotionModel->delete($id);
        return redirect()->to('/devotions');
    }
}
