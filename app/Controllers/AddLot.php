<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

class AddLot extends BaseController
{
    public function index()
    {
        $data = [];

        // Assuming you're storing user data in the session
        $userData = session()->get('userData');

        if (!$userData) {
            // Handle the case when user data is not available
            return redirect()->to('login'); // Redirect to login or handle as needed
        }

        // Repopulate form fields if there were validation errors
        $data['vendor_name'] = $this->request->getPost('vendor_name') ?? $this->oldInput('vendor_name');
        $data['company_name'] = $this->request->getPost('company_name') ?? $this->oldInput('company_name');

        return view('addnewlot', $data);
    }

    public function addLot()
    {
        helper('form');

        // Assuming you're storing user data in the session
        $userData = session()->get('userData');

        if (!$userData) {
            // Handle the case when user data is not available
            return redirect()->to('login'); // Redirect to login or handle as needed
        }

        $prefix = $this->request->getPost('lot_number_prefix');
        $suffix = $this->request->getPost('lot_number_suffix');

        // Concatenate prefix and suffix to form the lot number
        $lotNumber = $prefix . $suffix;

        $data = array(
            'lot_number_prefix' => $prefix,
            'lot_number_suffix' => $suffix,
            'lot_number' => $lotNumber,
            'description' => $this->request->getPost('description'),
            'creation_date' => date('Y-m-d'),
            'vendor_name' => $userData['vendor_name'],
            'company_name' => $userData['company_name']
        );

        // Insert data into the database
        $this->db->insert('lot', $data);

        return redirect()->to('addnewlot'); // Redirect to the addnewlot page
    }
}
