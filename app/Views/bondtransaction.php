<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Setting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


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
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        .custom-button.verified {
            background-color: green;
        }
        
        .custom-button.unverified {
            background-color: red;
        }
    </style>
   
</head>

<?php include APPPATH . 'Views/includes/header.php'; ?>
<?php include APPPATH . 'Views/includes/sidebar.php'; ?>

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bond Transaction</h1>
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
                            <h5 class="card-title">Bond Transaction</h5>
                            <div class="mb-2 input-group">
                                <input type="text" class="form-control form-control-sm" id="search" placeholder="Keywords" style="max-width: 150px;">
                                <div class="input-group-append" style="margin-left: 10px;">
                                    <button class="btn btn-primary btn-sm rounded" id="searchBtn">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                                <div class="input-group-append ms-auto">
                                    <button class="btn btn-primary btn-sm rounded" onclick="window.location.href='<?php echo base_url('vendorRegistration'); ?>'">
                                        <i class="bi bi-plus"></i> New Vendor
                                    </button>
                                </div>
                            </div>

                            <table class=" table table-striped table-bordered">
                                <tr>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Vendor</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Date</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Item Code</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Item Name</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Lot No.</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">In</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Out</th>     
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Balance</th>
                                    <th style="width: 200px;background-color: #0D6EFD; color:white">Status</th>
                                </tr>
                               
                                <tr>
                                    <td>laju sdn bhd</td>
                                    <td>Abu</td>
                                    <td>a@gmail.com</td>
                                    <td>Book</td>
                                    <td>522</td>
                                    <td>20</td>
                                    <td>0</td>
                                    <td>20</td>
                                    <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                      
                                            <div class="ml-auto text-center">

                                            <button id="approvalButton" class="custom-button verified" onclick="toggleVerification()">Verified</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>laju sdn bhd</td>
                                    <td>Abu</td>
                                    <td>a@gmail.com</td>
                                    <td>Book</td>
                                    <td>522</td>
                                    <td>20</td>
                                    <td>0</td>
                                    <td>20</td>
                                    <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                      
                                            <div class="ml-auto text-center">

                                            <button id="approvalButton" class="custom-button verified" onclick="toggleVerification()">Verified</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
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
        $(document).ready(function () {
            // Function to filter the table rows based on input value
            function filterTable() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                table = document.querySelector(".table-bordered");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows
                for (i = 0; i < tr.length; i++) {
                    var matchFound = false;

                    // Check against multiple columns (Name, Company, and Profile)
                    for (var j = 0; j < tr[i].cells.length - 1; j++) {
                        td = tr[i].getElementsByTagName("td")[j];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                matchFound = true;
                                break;  // Break the inner loop if a match is found in any column
                            }
                        }
                    }

                    // Set the display property based on whether a match is found
                    if (matchFound) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            // Attach the filterTable function to the click event of the search button
            $("#searchBtn").on("click", function () {
                filterTable();
            });

            // Function to handle user deletion
            function deleteUser() {
                var confirmation = confirm("Do you really want to delete this user?");
                if (confirmation) {
                    // Implement the actual deletion logic here
                    alert("User deleted successfully!");  // Replace this with your deletion code
                }
            }

            // Attach the deleteUser function to the click event of delete buttons
            $(".delete-btn").on("click", function (e) {
                e.preventDefault();  // Prevent the default behavior of the link
                deleteUser();
            });
        });
    </script>
        <script>
        function toggleVerification() {
            const button = document.getElementById("approvalButton");
            
            if (button.innerHTML === "Verified") {
                button.innerHTML = "Unverified";
                button.classList.remove("verified");
                button.classList.add("unverified");
            } else {
                button.innerHTML = "Verified";
                button.classList.remove("unverified");
                button.classList.add("verified");
            }
        }
    </script>
</body>
</html>
