<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanyModel;

class User extends BaseController
{
    private $userModel;
    private $companyModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->companyModel = new CompanyModel();
    }

    public function index()
    {
        $data['companies'] = $this->companyModel->getCompanyNames();
        return view('user', $data);
    }

    public function adduser()
    {
        $loginName = $this->request->getVar('inputLogname');
        $personName = $this->request->getVar('inputPersonname');
        $inputEmail = $this->request->getVar('inputEmail');
        $inputPassword = trim($this->request->getVar('inputPassword')); 
        $selectedProfile = $this->request->getVar('inputProfile');
        
    
        // Fetch profile ID based on the selected profile
        $profileId = $this->getProfileIdByProfile($selectedProfile);
    
        // Hash the password
        $hashedPassword = password_hash($inputPassword, PASSWORD_BCRYPT);
    
        // Prepare data for insertion
        $data = [
            'login_name' => $loginName,
            'person_name' => $personName,
            'login_email' => $inputEmail,
            'login_password' => $hashedPassword,
            'profile_id' => $profileId,
        ];

                $model = new UserModel();
                $profileModel = new UserModel();
    
       // Insert data into the database
        $model->insert($data);

        
               
       $profileModel->where('profile_id', $profileId)->set(['profile' => $selectedProfile])->update();
    
        session()->setFlashdata('success', 'User saved successfully.');
    
        return redirect()->to('user');
    }


    private function getProfileIdByProfile($profile)
    {
        switch ($profile) {
            case 'admin':
                $profileId = 1; // Profile ID for admin
                break;
            case 'supervisor':
                $profileId = 2; // Profile ID for supervisor
                break;
            case 'staff':
                $profileId = 3; // Profile ID for staff
                break;
            case 'vendor':
                $profileId = 4; // Profile ID for vendor
                break;
            default:
                $profileId = null; // Handle the case where an invalid profile is provided
                break;
    
            }
        return $profileId;
    }







    public function edit($userId)
    {
        // Fetch user details based on $userId from the database
        $userData = $this->userModel->getUserById($userId); // Replace with your actual method

        // Pass the user details to the view
        return view('user/edit', ['userData' => $userData]);
    }



    


}
