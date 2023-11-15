<?php

namespace App\Controllers;

class VendorRegistration extends BaseController
{
    public function index()
    {
        return view('vendorRegistration');
    }



    public function addVendor()
    {
        // Get form input values
        $companyName = $this->request->getPost('inputCompany');
        $prefix = $this->request->getPost('inputprefix');
        $email = $this->request->getPost('inputEmail');
        $contactNo = $this->request->getPost('inputContact');
        $address = $this->request->getPost('inputAddress');

      
        $data = [
            'company_name' => $companyName,
            'prefix' => $prefix,
            'vendor_email' => $email,
            'contact_no' => $contactNo,
            'address' => $address,
        ];

      
        $db = \Config\Database::connect();

       
        $db->table('vendor')->insert($data);

      
        return redirect()->to('vendor');
    }
}