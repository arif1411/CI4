<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add User</title>
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
  <h1>Add User</h1>
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
          <h5 class="card-title">Add User</h5>
    
        
          <form action="<?php echo site_url('user/adduser');?>" method="post">
            <div class="row mb-3">
              <label for="inputLogname" class="col-sm-2 col-form-label">Login Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name= "inputLogname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPersonname" class="col-sm-2 col-form-label">Person Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="inputPersonname"  >
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="inputEmail" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-6">
           
              <input type="password" class="form-control" name="inputpassword">

                </select>
        
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputCpassword" class="col-sm-2 col-form-label"> Confirm Password</label>
              <div class="col-sm-6">
           
              <input type="password" class="form-control">
                </select>
        
              </div>
            </div>
       

            <div class="row mb-3">
    <label for="inputCompany" class="col-sm-2 col-form-label">Company</label>
    <div class="col-sm-6">
        <div class="company-container">
            <div class="input-group">
                <select class="form-control" name="inputCompany[]">
                    <option value="" selected disabled>---Please Select---</option>
                    <?php foreach ($companies as $company): ?>
                        <option value="<?= $company['company_id'] ?>"><?= $company['company_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="button" class="btn btn-primary btn-add-company">+</button>
            </div>
        </div>
    </div>
</div>
      



            
<div class="row mb-3">
    <label for="inputProfile" class="col-sm-2 col-form-label">Profile</label>
    <div class="col-sm-6" >
        <select class="form-control" name="inputProfile">
        <option value="" selected disabled>---Please Select---</option>
            <option value="admin">Admin</option>
            <option value="supervisor">Supervisor</option>
            <option value="staff">Staff</option>
            <option value="vendor">Vendor</option>
        </select>
        
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

      
          <?php if(session()->has('success')): ?>
    <div id="success-alert" class="alert alert-success" role="alert">
        <?= session('success') ?>
    </div>

    <script>
  
        setTimeout(function(){
          
            document.getElementById('success-alert').style.display = 'none';
        }, 2000);
    </script>
<?php endif; ?>


      
    </script>
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




</body>

</html>