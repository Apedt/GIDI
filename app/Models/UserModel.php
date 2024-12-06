<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
    protected $useTimestamps = true;

    // Fungsi untuk menemukan user berdasarkan username
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    // Fungsi untuk menambah user baru
    public function insertUser($data)
    {
        return $this->save($data);
    }
}
