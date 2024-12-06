<?php
namespace App\Controllers;

use App\Models\ScheduleModel;

class ScheduleController extends BaseController
{
    private $scheduleModel;

    public function __construct()
    {
        $this->scheduleModel = new ScheduleModel();
    }

    // Menampilkan semua jadwal
    public function index()
    {
        $data['schedules'] = $this->scheduleModel->findAll();
        return view('schedules/index', $data);
    }

    // Menambahkan jadwal baru
    public function create()
    {
        return view('schedules/create');
    }

    public function store()
    {
        $this->scheduleModel->save([
            'service_name' => $this->request->getPost('service_name'),
            'date'         => $this->request->getPost('date'),
            'time'         => $this->request->getPost('time'),
        ]);

        return redirect()->to('/schedules');
    }

    // Mengedit jadwal
    public function edit($id)
    {
        $data['schedule'] = $this->scheduleModel->find($id);
        return view('schedules/edit', $data);
    }

    public function update($id)
    {
        $this->scheduleModel->update($id, [
            'service_name' => $this->request->getPost('service_name'),
            'date'         => $this->request->getPost('date'),
            'time'         => $this->request->getPost('time'),
        ]);

        return redirect()->to('/schedules');
    }

    // Menghapus jadwal
    public function delete($id)
    {
        $this->scheduleModel->delete($id);
        return redirect()->to('/schedules');
    }
}
