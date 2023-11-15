<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost('inputLogname');
        $password = $this->request->getPost('inputPassword');

        // Load the Session library
        $session = \Config\Services::session();

        // Load the UserModel
        $model = new UserModel();

        $user = $model->where('login_name', $username)->first();
        if ($user && password_verify($password, $user['login_password'])) {
            // Check the user's role
            if ($user['profile_id'] == 1 ) {
                // Admin
                $userData = [
                    'username' => $user['login_name'],
                    'user_role' => 'admin',
                ];
                $session->set($userData);
    
             
    
                return redirect()->to('setting');
            }
           
             elseif ($user['profile_id'] == 2) {
                // Vendor
                $userData = [
                    'username' => $user['login_name'],
                    'user_role' => 'supervisor',
                ];
                $session->set($userData);
    
               
    
                return redirect()->to('dashboard');
            }
            
            elseif ($user['profile_id'] == 3) {
                // Vendor
                $userData = [
                    'username' => $user['login_name'],
                    'user_role' => 'staff',
                ];
                $session->set($userData);
    
               
    
                return redirect()->to('dashboard');
            }
            
            elseif ($user['profile_id'] == 4) {
                // Vendor
                $userData = [
                    'username' => $user['login_name'],
                    'user_role' => 'vendor',
                ];
                $session->set($userData);
    
               
    
                return redirect()->to('dashboard');
            } else {
                // Handle other roles as needed
                $session->setFlashdata('error', 'Invalid role.');
                return redirect()->to('login');
            }
        } else {
            // Invalid credentials, show an error message
            $session->setFlashdata('error', 'Invalid username or password.');
            return redirect()->to('login');
        }
    }
}