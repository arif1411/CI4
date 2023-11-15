<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'profile_id';

    public function getAllProfiles()
    {
        return $this->findAll();
    }



    public function getDashboardPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profiledashboard');
        $builder->select('profiledashboard_id, add_dashboard, view_dashboard, edit_dashboard, delete_dashboard');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }




    public function getVendorPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profilevendor');
        $builder->select('profilevendor_id, add_vendor, view_vendor, edit_vendor, delete_vendor');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }



    public function getLotnoPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profilelotno');
        $builder->select('profilelotNo_id, add_lotNo, view_lotNo, edit_lotNo, delete_lotNo');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }



    public function getBondtransactionPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profilebondtransaction');
        $builder->select('profiletransaction_id, add_transaction, view_transaction, edit_transaction, delete_transaction');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }


    
    public function getReportPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profilereport');
        $builder->select('profilereport_id, add_report, view_report, edit_report, delete_report');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }



 
    public function getSettingPermissionsByProfile($profileId)
    {
        $builder = $this->db->table('profilesetting');
        $builder->select('profilesetting_id, add_setting, view_setting, edit_setting, delete_setting');
        $builder->where('profile_id', $profileId);

        $permissions = $builder->get()->getResultArray();

        return $permissions;
    }

    public function getMembersByProfile($profileId)
    {
        $builder = $this->db->table('user');
        $builder->select('person_name');
        $builder->where('profile_id', $profileId);
    
        $query = $builder->get();
    
        $sql = $this->db->getLastQuery();
        log_message('debug', 'SQL Query: ' . $sql);
    
        if ($query === false) {
         
            log_message('error', 'Database Error: ' . $this->db->error());
            return [];
        }
    
        $members = $query->getResultArray();
    
        if (empty($members)) {
          
            log_message('debug', 'No members found for the profile ID: ' . $profileId);
        }
    
        return $members;
    }


    public function updateStatusInDatabase($profileId, $action, $status, $moduleName)
    {
        switch ($action) {
            case 'add':
            case 'view':
            case 'edit':
            case 'delete':
                // Construct the column name based on the action and module name
                $columnName = $this->getColumnName($action, $moduleName);

                // Perform the database update
                $builder = $this->db->table($this->table);
                $builder->set($columnName, $status);
                $builder->where($this->primaryKey, $profileId);

                // Execute the update query
                $result = $builder->update();

                return $result;
            default:
                // Handle invalid action
                return false;
        }
    }

    // New method to get the column name based on action and module name
    public function getColumnName($action, $moduleName)
    {
        // Assuming you have a consistent naming convention
        return strtolower($action) . '_' . strtolower($moduleName);
    }

}