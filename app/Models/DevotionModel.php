<?php
namespace App\Models;

use CodeIgniter\Model;

class DevotionModel extends Model
{
    protected $table = 'devotions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'date'];

    public function getLatestDevotion()
    {
        return $this->orderBy('date', 'desc')->first();
    }
}
