<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => $this->request->getPost('role') ?? 'user', // Default role user
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registration successful!');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id'       => $user['user_id'],
                'username'      => $user['username'],
                'email'         => $user['email'],
                'role'          => $user['role'],
                'logged_in'     => true
            ];
            $session->set($sessionData);
            echo "datanya" + $sessionData;
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
