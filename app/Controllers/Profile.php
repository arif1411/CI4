<?php

namespace App\Controllers;

class Profile extends BaseController
{
        public function index() {
            $db = \Config\Database::connect(); 
       
       $query = $db->query(' SELECT profile.*, GROUP_CONCAT(user.login_name) as user_login_names FROM profile
       LEFT JOIN user ON user.profile_id = profile.profile_id GROUP BY profile.profile_id');

   $data['profiles'] = $query->getResult();


        // Load the view and pass the data
        return view('profile', $data); 
    }
}
    
