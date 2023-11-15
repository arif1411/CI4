<?php

namespace App\Controllers;
use App\Models\UserModel;


class Setting extends BaseController
{
    public function index()
    {


   
         $userModel = new UserModel();

         // Fetch users from the database
         $data['user'] = $userModel->getUsers();

         return view('setting', $data);
    }

    public function deleteUser()
    {
        $userId = $this->request->getPost('user_id');
    
        if (!empty($userId)) {
            $userModel = new UserModel();
            $success = $userModel->delete($userId);
    
            if ($success) {
                // Redirect or display a success message
                return redirect()->to('setting')->with('success', 'User deleted successfully!');
            } else {
                // Redirect or display an error message
                return redirect()->to('setting')->with('error', 'Failed to delete user.');
            }
        }
    
        // Handle the case where $userId is empty
        return redirect()->to('setting')->with('error', 'Invalid user ID.');
    }
    
    

}