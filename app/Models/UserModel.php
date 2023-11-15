<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'login_name', 'login_email', 'login_password', 'person_name', 'profile_id', 'profile', 'company_name'];

    public function getUsers()
    {
        return $this->findAll();
    }



    public function getUserById($userId)
    {
        return $this->asArray()
            ->where(['user_id' => $userId])
            ->first();
    }

    // Update the delete method signature to match the parent class
    public function delete($id = null, bool $purge = false)
    {
        return parent::delete($id, $purge);
    }
}
