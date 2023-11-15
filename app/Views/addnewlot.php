<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add New Lot</title>
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

  
</head>
<?php include APPPATH . 'Views/includes/header.php'; ?>
<?php include APPPATH . 'Views/includes/sidebar.php'; ?>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add New Lot</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Elements</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
  <div class="col-lg-1"></div>
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add New Lot</h5>

        
          <form action="<?php echo base_url('add-lot'); ?>" method="post">

<div class="row mb-3">
    <label for="inputVendor" class="col-sm-2 col-form-label">Vendor Name</label>
    <div class="col-sm-10">
        <!-- Echoing vendor_name for repopulation -->
        <input type="text" class="form-control" name="vendor_name" value="<?php echo $this->oldInput('person_name'); ?>">

    </div>
</div>

<div class="row mb-3">
    <label for="inputCompany" class="col-sm-2 col-form-label">Company Name</label>
    <div class="col-sm-10">
        <!-- Echoing company_name for repopulation -->
        <input type="text" class="form-control" name="company_name" value="<?php echo $this->oldInput('company_name'); ?>">

    </div>
</div>

<!-- Lot number fields (not echoed) -->
<div class="row mb-3">
    <label for="lot_number_prefix" class="col-sm-2 col-form-label">Lot No</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="lot_number_prefix">
    </div>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="lot_number_suffix">
    </div>
</div>

<!-- Description field (not echoed) -->
<div class="row mb-3">
    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea id="inputDescription" class="form-control" name="description" rows="4"></textarea>
    </div>
</div>



         

            <div class="row mb-3 justify-content-end">
        
              <div class="col-sm-3">
                <button type="button" class="btn btn-secondary" onclick="clearForm()">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" onclick="cancelForm()">Cancel</button>
              </div>
            </div>

          </form>

        </div>
      </div>

    </div>


    <div class="col-lg-6">

      

       

        </div>
      </div>

    </div>
    <div class="col-lg-1"></div>
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

</body>

</html>