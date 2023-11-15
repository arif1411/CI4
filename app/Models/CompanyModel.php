<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'company_id';
    protected $allowedFields = ['company_id','company_name'];


    public function getCompanyNames()
    {
   
        return $this->findAll();
    }

    public function insertCompany($companyName)
    {
        $data = [
            'company_name' => $companyName,
           
        ];

        return $this->insert($data);
    }
}
