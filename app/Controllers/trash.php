<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ProfilePermission extends Controller
{
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

        // Get dashboard permissions by profile
        $permissions = $profileModel->getDashboardPermissionsByProfile($profileId);

        // Return JSON response
        return $this->response->setJSON($permissions);
    }
}


              // Add a new row to the table
              var row = table.insertRow(-1);

              // Add cells for module and actions
              var moduleCell = row.insertCell(0);
              var addActionCell = row.insertCell(1);
              var viewActionCell = row.insertCell(2);
              var editActionCell = row.insertCell(3);
              var deleteActionCell = row.insertCell(4);

              moduleCell.innerHTML = permission.profilevendor_id; // Change this line
              addActionCell.innerHTML = createToggleButton('Add', permission.add_vendor);
              viewActionCell.innerHTML = createToggleButton('View', permission.view_vendor);
              editActionCell.innerHTML = createToggleButton('Edit', permission.edit_vendor);
              deleteActionCell.innerHTML = createToggleButton('Delete', permission.delete_vendor);

                      // Function to handle form submission
        function submitForm() {
            var profileId = $('#selectedProfileBtn').data('profile-id');

            // Gather the data from the toggle buttons
            var permissions = [];
            $('#permissionsTable tbody tr').each(function () {
                var module = $(this).find('td:eq(0)').text();
                var addAction = $(this).find('td:eq(1) button').data('status');
                var viewAction = $(this).find('td:eq(2) button').data('status');
                var editAction = $(this).find('td:eq(3) button').data('status');
                var deleteAction = $(this).find('td:eq(4) button').data('status');
                
                permissions.push({
                    module: module,
                    add_action: addAction,
                    view_action: viewAction,
                    edit_action: editAction,
                    delete_action: deleteAction
                });
            });

            // Send the data to the server using an AJAX request
            $.ajax({
                url: 'submit_permission_changes.php', // Replace with the actual server endpoint
                type: 'POST',
                data: { profileId: profileId, permissions: JSON.stringify(permissions) },
                success: function (response) {
                    console.log('Permissions saved successfully:', response);
                    // You can provide a success message or further actions here
                },
                error: function (xhr, status, error) {
                    console.error('Error saving permissions:', error);
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

















    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile Permission</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <style>
        .custom-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .custom-button.verified {
            background-color: green;
        }

        .custom-button.unverified {
            background-color: red;
        }



        .custom-table-container {
        max-width: 1300px; 
        margin: 0 auto; 
    }
    </style>

</head>

<?php include APPPATH . 'Views/includes/header.php'; ?>
<?php include APPPATH . 'Views/includes/sidebar.php'; ?>

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile Permission</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Bond In/Out</li>
                    <li class="breadcrumb-item active">Bond Transaction</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Permission</h5>                            <div class="d-flex justify-content-center">
                                <div class="btn-group">
                                    <button class="btn btn-light btn-lg rounded border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="selectedProfileBtn" data-profile-id="">
                                        Select Profile
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($profiles as $profile) : ?>
                                            <li><a class="dropdown-item" href="#" data-profile-id="<?= $profile['profile_id'] ?>" onclick="selectProfile(this)"><?= $profile['profile_role'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-3" id="modulesContainer">
                                <table id="permissionsTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Module</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Add</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">View</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Edit</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
       


            <div class="card-body mt-4 custom-table-container"> 
    <h5>List Of Members</h5>

    <table id="membersTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 400px; background-color: #0D6EFD; color: white">Name</th>
                </tr>
        </thead>
        <tbody>
        <tr>
            
            </tr>
        </tbody>
    </table>
</div>
</section>

    </main><!-- End #main -->

    <?php include APPPATH . 'Views/includes/footer.php'; ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function selectProfile(clickedElement) {
        var profileId = clickedElement.getAttribute('data-profile-id');
 
        console.log('Selected Profile ID:', profileId);
        var profileRole = clickedElement.innerText;

        document.getElementById('selectedProfileBtn').innerHTML = profileRole;
        document.getElementById('selectedProfileBtn').setAttribute('data-profile-id', profileId);

        fetchPermissions(profileId);
        fetchMembers(profileId);
    }

    function fetchMembers(profileId) {

        console.log('Fetching permissions for Profile ID:', profileId);
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '<?= base_url('profilepermission/getMembersByProfile/') ?>' + profileId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log('Members Response:', response);

                if (response && response.length > 0) {
                    // If members are found, display them in the table
                    displayMembers(response);
                    resolve(response);
                } else {
                    // If no members found, display an empty table
                    displayMembers([]);
                    reject('No members found for the selected profile');
                }
            },
            error: function (xhr, status, error) {
                reject('Error fetching members: ' + error);
                console.log(xhr.responseText);
            }
        });
    });
}

function displayMembers(members) {
    var table = document.querySelector('#membersTable tbody');
    clearTable(table);

    if (members.length > 0) {
        members.forEach(function (member) {
            // Add a new row to the table
            var row = table.insertRow(-1);

            // Add cells for member names
            var nameCell = row.insertCell(0);
            nameCell.innerHTML = member.person_name;
        });
    } else {
        // If no members, display a message or handle it as needed
        var row = table.insertRow(-1);
        var cell = row.insertCell(0);
        cell.colSpan = 1;
        cell.innerHTML = 'No members found for the selected profile';
    }
}

    
    
        function fetchPermissions(profileId) {
    $.ajax({
        url: 'profilepermission/getPermissionsByProfile/' + profileId,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response && response.length > 0) {
                displayPermissions(response);
            } else {
                console.error('No permissions found');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching permissions:', error);
            console.log(xhr.responseText);  
        }
    });
}

function displayPermissions(permissions) {
    var table = document.getElementById('permissionsTable');
    clearTable(table);

    permissions.forEach(function (permission) {
        // Add a new row to the table
        var row = table.insertRow(-1);

        // Add cells for module and actions
        var moduleCell = row.insertCell(0);
        var addActionCell = row.insertCell(1);
        var viewActionCell = row.insertCell(2);
        var editActionCell = row.insertCell(3);
        var deleteActionCell = row.insertCell(4);

        // Map the module ID to the corresponding module name
        var moduleName = getModuleName(permission);

        moduleCell.innerHTML = moduleName;
        addActionCell.innerHTML = createToggleButton('Add', permission.add_dashboard || permission.add_vendor || permission.add_lotNo || permission.add_transaction || permission.add_report || permission.add_setting);
        viewActionCell.innerHTML = createToggleButton('View', permission.view_dashboard || permission.view_vendor || permission.view_lotNo || permission.view_transaction || permission.view_report || permission.view_setting);
        editActionCell.innerHTML = createToggleButton('Edit', permission.edit_dashboard || permission.edit_vendor || permission.edit_lotNo || permission.edit_transaction || permission.edit_report || permission.edit_setting);
        deleteActionCell.innerHTML = createToggleButton('Delete', permission.delete_dashboard || permission.delete_vendor || permission.delete_lotNo || permission.delete_transaction || permission.delete_report || permission.delete_setting);
    });
}

// Helper function to get the module name based on the permission
function getModuleName(permission) {
    if (permission.profiledashboard_id) return 'Dashboard';
    if (permission.profilevendor_id) return 'Vendor';
    if (permission.profileLotNo_id) return 'Lot No';
    if (permission.profileBondTrans_id) return 'Bond Transaction';
    if (permission.profileReport_id) return 'Report';
    if (permission.profileset_id) return 'Setting';
    return 'Unknown Module';
}
$(document).ready(function () {
    // Attach the click event to the table, delegating it to the buttons
    $('#permissionsTable').on('click', '.toggle-button', function () {
        var action = $(this).data('action');
        var status = $(this).data('status');
        var profileId = $('#selectedProfileBtn').data('profile-id'); // Add this line to get the profile ID

        // Perform the desired action based on the button clicked
        if (action !== undefined && status !== undefined && profileId !== undefined) {
            // Update the status (1 or 0) in the database or take any other action
            updatePermissionStatus(profileId, action, status);
            // Update the button text and class for visual feedback
            updateButtonStatus($(this));
        }
    });
});

function createToggleButton(action, status) {
    var buttonClass = status == 1 ? 'btn-success' : 'btn-danger';
    var buttonText = status == 1 ? 'Yes' : 'No';

    return '<button class="btn toggle-button ' + buttonClass + '" data-action="' + action + '" data-status="' + status + '">' + buttonText + '</button>';
}

function updateButtonStatus(button) {
    var status = button.data('status');
    var newStatus = status == 1 ? 0 : 1; // Toggle the status from 1 to 0 or vice versa
    var buttonText = newStatus == 1 ? 'Yes' : 'No';
    var buttonClass = newStatus == 1 ? 'btn-success' : 'btn-danger';

    button.data('status', newStatus); // Update the data-status attribute
    button.text(buttonText);
    button.removeClass('btn-success btn-danger').addClass(buttonClass);
}
function updatePermissionStatus(profileId, action, status) {
    console.log('Updating permissions for Profile ID:', profileId);
    console.log('Action:', action);
    console.log('Status:', status);
    // Dynamically construct the table name
    var tableName = 'profile' + action.toLowerCase();

    // Perform an AJAX request to update the status in the database
    $.ajax({
        url: '<?= base_url('profilepermission/updateStatus') ?>',
        type: 'POST',
        data: { profileId: profileId, tableName: tableName, status: status },
        success: function (response) {
            console.log('Status updated successfully:', response);
        },
        error: function (xhr, status, error) {
            console.error('Error updating status:', error);
            console.log(xhr.responseText);
        }
    });
}

$(document).ready(function () {
    // Attach the click event to the table, delegating it to the buttons
    $('#permissionsTable').on('click', '.toggle-button', function () {
        var action = $(this).data('action');
        var profileId = $('#selectedProfileBtn').data('profile-id');

        if (action !== undefined && profileId !== undefined) {
            var status = $(this).data('status');
            var newStatus = status === 1 ? 0 : 1; // Toggle between 0 and 1

            // Update the button status
            $(this).data('status', newStatus);

            // Update the button text and class
            var buttonText = newStatus === 1 ? 'Yes' : 'No';
            var buttonClass = newStatus === 1 ? 'btn-success' : 'btn-danger';
            $(this).text(buttonText).removeClass('btn-success btn-danger').addClass(buttonClass);

            // Update the database
            updatePermissionStatus(profileId, action, newStatus);
        }
    });

    function updatePermissionStatus(profileId, action, status) {
        console.log('Updating permissions for Profile ID:', profileId);
        console.log('Action:', action);
        console.log('Status:', status);
        // Dynamically construct the table name
        var tableName = 'profile' + action.toLowerCase();

        // Perform an AJAX request to update the status in the database
        $.ajax({
            url: '<?= base_url('profilepermission/updateStatus') ?>',
            type: 'POST',
            data: { profileId: profileId, tableName: tableName, status: status },
            success: function (response) {
                console.log('Status updated successfully:', response);
            },
            error: function (xhr, status, error) {
                console.error('Error updating status:', error);
                console.log(xhr.responseText);
            }
        });
    }
});

function clearTable(table) {
    while (table.rows.length > 1) {
        table.deleteRow(1);
    }
}

// Function to handle form submission
function submitForm() {
    var profileId = $('#selectedProfileBtn').data('profile-id');

    // Gather the data from the toggle buttons
    var permissions = [];
    $('#permissionsTable tbody tr').each(function () {
        var module = $(this).find('td:eq(0)').text();
        var addAction = $(this).find('td:eq(1) button').data('status');
        var viewAction = $(this).find('td:eq(2) button').data('status');
        var editAction = $(this).find('td:eq(3) button').data('status');
        var deleteAction = $(this).find('td:eq(4) button').data('status');

        permissions.push({
            module: module,
            add_action: addAction,
            view_action: viewAction,
            edit_action: editAction,
            delete_action: deleteAction
        });
    });

    // Send the data to the server using an AJAX request
    $.ajax({
        url: 'submit_permission_changes.php', // Replace with the actual server endpoint
        type: 'POST',
        data: { profileId: profileId, permissions: JSON.stringify(permissions) },
        success: function (response) {
            console.log('Permissions saved successfully:', response);
            // You can provide a success message or further actions here
        },
        error: function (xhr, status, error) {
            console.error('Error saving permissions:', error);
            console.log(xhr.responseText);
        }
    });
}
</script>
</body>

</html>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile Permission</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <style>
        .custom-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .custom-button.verified {
            background-color: green;
        }

        .custom-button.unverified {
            background-color: red;
        }



        .custom-table-container {
        max-width: 1300px; 
        margin: 0 auto; 
    }
    </style>

</head>

<?php include APPPATH . 'Views/includes/header.php'; ?>
<?php include APPPATH . 'Views/includes/sidebar.php'; ?>

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile Permission</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Bond In/Out</li>
                    <li class="breadcrumb-item active">Bond Transaction</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Permission</h5>

                            <div class="d-flex justify-content-center">
                                <div class="btn-group">
                                    <button class="btn btn-light btn-lg rounded border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="selectedProfileBtn" data-profile-id="">
                                        Select Profile
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($profiles as $profile) : ?>
                                            <li><a class="dropdown-item" href="#" data-profile-id="<?= $profile['profile_id'] ?>" onclick="selectProfile(this)"><?= $profile['profile_role'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-3" id="modulesContainer">
                                <table id="permissionsTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Module</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Add</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">View</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Edit</th>
                                            <th style="width: 200px; background-color: #0D6EFD; color: white">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
       


            <div class="card-body mt-4 custom-table-container"> 
    <h5>List Of Members</h5>

    <table id="membersTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 400px; background-color: #0D6EFD; color: white">Name</th>
                </tr>
        </thead>
        <tbody>
        <tr>
            
            </tr>
        </tbody>
    </table>
</div>
</section>

    </main><!-- End #main -->

    <?php include APPPATH . 'Views/includes/footer.php'; ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function selectProfile(clickedElement) {
        var profileId = clickedElement.getAttribute('data-profile-id');
 
        console.log('Selected Profile ID:', profileId);
        var profileRole = clickedElement.innerText;

        document.getElementById('selectedProfileBtn').innerHTML = profileRole;
        document.getElementById('selectedProfileBtn').setAttribute('data-profile-id', profileId);

        fetchPermissions(profileId);
        fetchMembers(profileId);
    }

    function fetchMembers(profileId) {

        console.log('Fetching permissions for Profile ID:', profileId);
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '<?= base_url('profilepermission/getMembersByProfile/') ?>' + profileId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log('Members Response:', response);

                if (response && response.length > 0) {
                    // If members are found, display them in the table
                    displayMembers(response);
                    resolve(response);
                } else {
                    // If no members found, display an empty table
                    displayMembers([]);
                    reject('No members found for the selected profile');
                }
            },
            error: function (xhr, status, error) {
                reject('Error fetching members: ' + error);
                console.log(xhr.responseText);
            }
        });
    });
}

function displayMembers(members) {
    var table = document.querySelector('#membersTable tbody');
    clearTable(table);

    if (members.length > 0) {
        members.forEach(function (member) {
            // Add a new row to the table
            var row = table.insertRow(-1);

            // Add cells for member names
            var nameCell = row.insertCell(0);
            nameCell.innerHTML = member.person_name;
        });
    } else {
        // If no members, display a message or handle it as needed
        var row = table.insertRow(-1);
        var cell = row.insertCell(0);
        cell.colSpan = 1;
        cell.innerHTML = 'No members found for the selected profile';
    }
}

    
    
        function fetchPermissions(profileId) {
    $.ajax({
        url: 'profilepermission/getPermissionsByProfile/' + profileId,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response && response.length > 0) {
                displayPermissions(response);
            } else {
                console.error('No permissions found');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching permissions:', error);
            console.log(xhr.responseText);  
        }
    });
}

function displayPermissions(permissions) {
    var table = document.getElementById('permissionsTable');
    clearTable(table);

    permissions.forEach(function (permission) {
        // Add a new row to the table
        var row = table.insertRow(-1);

        // Add cells for module and actions
        var moduleCell = row.insertCell(0);
        var addActionCell = row.insertCell(1);
        var viewActionCell = row.insertCell(2);
        var editActionCell = row.insertCell(3);
        var deleteActionCell = row.insertCell(4);

        // Map the module ID to the corresponding module name
        var moduleName = getModuleName(permission);

        moduleCell.innerHTML = moduleName;
        addActionCell.innerHTML = createToggleButton('Add', permission.add_dashboard || permission.add_vendor || permission.add_lotNo || permission.add_transaction || permission.add_report || permission.add_setting);
        viewActionCell.innerHTML = createToggleButton('View', permission.view_dashboard || permission.view_vendor || permission.view_lotNo || permission.view_transaction || permission.view_report || permission.view_setting);
        editActionCell.innerHTML = createToggleButton('Edit', permission.edit_dashboard || permission.edit_vendor || permission.edit_lotNo || permission.edit_transaction || permission.edit_report || permission.edit_setting);
        deleteActionCell.innerHTML = createToggleButton('Delete', permission.delete_dashboard || permission.delete_vendor || permission.delete_lotNo || permission.delete_transaction || permission.delete_report || permission.delete_setting);
    });
}

// Helper function to get the module name based on the permission
function getModuleName(permission) {
    if (permission.profiledashboard_id) return 'Dashboard';
    if (permission.profilevendor_id) return 'Vendor';
    if (permission.profilelotNo_id) return 'Lot No';
    if (permission.profiletransaction_id) return 'Bond Transaction';
    if (permission.profilereport_id) return 'Report';
    if (permission.profilesetting_id) return 'Setting';
    return 'Unknown Module';
}
$(document).ready(function () {
    // Attach the click event to the table, delegating it to the buttons
    $('#permissionsTable').on('click', '.toggle-button', function () {
        var action = $(this).data('action');
        var profileId = $('#selectedProfileBtn').data('profile-id');

        if (action !== undefined && profileId !== undefined) {
            var status = $(this).data('status');
            var newStatus = status === 1 ? 0 : 1; // Toggle between 0 and 1

            // Update the button status
            $(this).data('status', newStatus);

            // Update the button text and class
            var buttonText = newStatus === 1 ? 'Yes' : 'No';
            var buttonClass = newStatus === 1 ? 'btn-success' : 'btn-danger';
            $(this).text(buttonText).removeClass('btn-success btn-danger').addClass(buttonClass);

            // Update the database
            updatePermissionStatus(profileId, action, newStatus);
        }
    });
});
function createToggleButton(action, status) {
    var buttonClass = status == 1 ? 'btn-success' : 'btn-danger';
    var buttonText = status == 1 ? 'Yes' : 'No';

    return '<button class="btn toggle-button ' + buttonClass + '" data-action="' + action + '" data-status="' + status + '">' + buttonText + '</button>';
}

function updatePermissionStatus(profileId, action, status) {
    console.log('Updating permissions for Profile ID:', profileId);
    console.log('Action:', action);
    console.log('Status:', status);
    // Dynamically construct the table name
    var tableName = 'profile' + action.toLowerCase();

    // Perform an AJAX request to update the status in the database
    $.ajax({
        url: '<?= base_url('profilepermission/updateStatus') ?>',
        type: 'POST',
        data: {
            profileId: profileId,
            tableName: tableName,
            status: status,
            action: action // Pass the action to the server
        },
        success: function (response) {
            console.log('Status updated successfully:', response);
        },
        error: function (xhr, status, error) {
            console.error('Error updating status:', error);
            console.log(xhr.responseText);
        }
    });
}

function updateButtonStatus(button) {
    // Update button text and class for visual feedback
    var newStatus = button.data('status') == 1 ? 0 : 1;
    var newClass = newStatus == 1 ? 'btn-success' : 'btn-danger';
    var newText = newStatus == 1 ? 'Yes' : 'No';

    button.data('status', newStatus);
    button.removeClass('btn-success btn-danger').addClass(newClass);
    button.text(newText);
}

        function clearTable(table) {
          
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }
        }
    </script>

</body>

</html>













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

    public function updateStatusInDatabase($profileId, $action, $status)
{
    switch ($action) {
        case 'Add':
        case 'View':
        case 'Edit':
        case 'Delete':
            $tableName = 'profile' . strtolower($action);
            break;
        default:
            // Handle invalid action
            return false;
    }

    // Define an array of valid table names
    $validTableNames = ['profiledashboard', 'profilevendor', 'profilelotNo', 'profiletransaction', 'profilesetting'];

    // Check if the tableName is valid
    if (!in_array($tableName, $validTableNames)) {
        // Handle invalid table name
        return false;
    }

    // Construct the column name based on the action
    $columnName = strtolower($action) . '_' . strtolower($tableName);

    // Perform the database update
    $builder = $this->db->table($tableName);
    $builder->set($columnName, $status);
    $builder->where('profile_id', $profileId);

    // Execute the update query
    $result = $builder->update();

    return $result;
}

}



------------------------------------------okay--------------------------------------------
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
        $moduleName = strtolower($this->request->getPost('moduleName'));
    
        // Construct column name
        $columnName = $action . '_' . $tableName;
    
        // Log constructed column name
        log_message('debug', 'Constructed Column Name: ' . $columnName);
    
        // Update the status in the database using the $tableName and specific action
        switch ($action) {
            case 'add':
            case 'view':
            case 'edit':
            case 'delete':
                // Use the $tableName variable here
                $this->db->table($tableName)->where('profile_id', $profileId)->set($action . '_' . strtolower($tableName), $status)->update();
    
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










