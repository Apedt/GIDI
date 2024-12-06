<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends Controller
{
    // Halaman Register
    public function register()
    {
        return view('auth/register');
    }

    // Proses Register
    public function doRegister()
    {
        $validation =  \Config\Services::validation();
        $data = $this->request->getPost();

        // Validasi form
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'role'     => 'required|in_list[admin,jemaat]'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // Simpan ke database
            $userModel = new UserModel();
            $userModel->insertUser($data);

            // Redirect ke login setelah berhasil register
            return redirect()->to('/login');
        } else {
            // Jika validasi gagal, kembali ke halaman register dengan pesan error
            return view('auth/register', ['validation' => $validation]);
        }
    }

    // Halaman Login
    public function login()
    {
        return view('auth/login');
    }

    // Proses Login
    public function doLogin()
    {
        $data = $this->request->getPost();
        $userModel = new UserModel();

        // Cari user berdasarkan username
        $user = $userModel->getUserByUsername($data['username']);

        if ($user && password_verify($data['password'], $user['password'])) {
            // Set session
            session()->set([
                'user_id'      => $user['id'],
                'username'     => $user['username'],
                'role'         => $user['role'],
                'is_logged_in' => true
            ]);

            // Redirect sesuai role
            if ($user['role'] == 'admin') {
                return redirect()->to('/dashboard'); // Dashboard Admin
            } else if ($user['role'] == 'jemaat') {
                return redirect()->to('/dashboard'); // Halaman Jemaat
            }
        } else {
            // Jika login gagal
            session()->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }


    // Logout
    public function logout()
    {
        session()->destroy();  // Menghancurkan session
        return redirect()->to('/login');
    }
}
