<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ProfilePermission extends Controller

{

 protected $db;

 public function __construct()
 {
     // Load the database connection in the constructor
     $this->db = \Config\Database::connect();
 }

    public function index()
    {
        // Load the ProfileModel
        $profileModel = new ProfileModel();

        // Get all profiles
        $data['profiles'] = $profileModel->getAllProfiles();

        // Load the view with profiles
        return view('profilepermission', $data);
    }

    public function getPermissionsByProfile($profileId)
    {
        // Load the ProfileModel
        $profileModel = new ProfileModel();
    
   
        $dashboardPermissions = $profileModel->getDashboardPermissionsByProfile($profileId);
    
      
        $vendorPermissions = $profileModel->getVendorPermissionsByProfile($profileId);


        $lotNoPermissions = $profileModel->getLotnoPermissionsByProfile($profileId);


        $bondtransactionPermissions = $profileModel->getBondtransactionPermissionsByProfile($profileId);


        $reportPermissions = $profileModel->getReportPermissionsByProfile($profileId);

        
        $settingPermissions = $profileModel->getSettingPermissionsByProfile($profileId);
    
        // Combine all permissions
        $permissions = array_merge($dashboardPermissions, $vendorPermissions, $lotNoPermissions,$bondtransactionPermissions,  $reportPermissions,  $settingPermissions );



        // Return JSON respon
        return $this->response->setJSON($permissions);
    }
    



    public function getMembersByProfile($profileId)
    {
        $profileModel = new ProfileModel();
    
        // Fetch members based on the profile ID
        $members = $profileModel->getMembersByProfile($profileId);
    
        // Check if members are found
        if ($members) {
            // Return JSON response
            return $this->response->setJSON($members);
        } else {
            // Return JSON response with an empty array
            return $this->response->setJSON([]);
        }
    }
    public function updateStatus()
    {
        $profileId = $this->request->getPost('profileId');
        $tableName = $this->request->getPost('tableName');
        $status = $this->request->getPost('status');
        $action = strtolower($this->request->getPost('action'));
        $moduleName = $this->request->getPost('moduleName');
    
        // Construct column name
        $columnName = $action . '_' . $moduleName;
    
        // Log constructed column name
        log_message('debug', 'Constructed Column Name: ' . $columnName);
    
        // Update the status in the database using the $tableName and specific action
        switch ($action) {
            case 'add':
            case 'view':
            case 'edit':
            case 'delete':
                // Use the $tableName variable here
                $this->db->table($tableName)->where('profile_id', $profileId)->set(strtolower($action) . '_' . $moduleName, $status)->update();
    
                // Log the constructed SQL query
                $sql = $this->db->getLastQuery();
                log_message('debug', 'Generated SQL Query: ' . $sql);
    
                break;
            default:
                // Handle other actions or provide an error message
                break;
        }
    
        return $this->response->setJSON(['status' => 'success']);
    }
}










