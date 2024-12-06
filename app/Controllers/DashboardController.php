<?php
namespace App\Controllers;

use App\Models\ScheduleModel;
use App\Models\DevotionModel;
use App\Models\MemberModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $scheduleModel = new ScheduleModel();
        $devotionModel = new DevotionModel();
        $memberModel = new MemberModel();

        $data = [
            'nextSchedule' => $scheduleModel->getNextSchedule(),
            'latestDevotion' => $devotionModel->getLatestDevotion(),
            'members' => $memberModel->findAll(),
        ];

        return view('dashboard/index', $data);
    }
}
