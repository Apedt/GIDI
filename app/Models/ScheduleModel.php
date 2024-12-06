<?php
namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = ['service_name', 'date', 'time'];

    public function getNextSchedule()
    {
        return $this->where('date >=', date('Y-m-d'))->orderBy('date', 'asc')->first();
    }
}
