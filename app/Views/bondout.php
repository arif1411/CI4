<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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
  <h1>Bond Out</h1>
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
          <h5 class="card-title">Bond Out</h5>

        
          <form>
            <div class="row mb-3">
              <label for="inputCompany" class="col-sm-2 col-form-label">Company Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputVendor" class="col-sm-2 col-form-label">Vendor Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputBondoutform" class="col-sm-2 col-form-label">Bond Out Form No</label>
              <div class="col-sm-6">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="itemName" class="col-sm-2 col-form-label">Item Name</label>
              <div class="col-sm-6">
           
               <select id="itemName" class="form-control">
                <option value="A">Gucchi</option>
                <option value="B">1</option>
                
                </select>
        
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputlot" class="col-sm-2 col-form-label">Lot No</label>
              <div class="col-sm-6">
               <select id="itemName" class="form-control">
                <option value="A">502</option>
                <option value="B">1</option>
                
                </select>
         
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
              <div class="col-sm-6">
                <input type="number" class="form-control">
              </div>
              <div class="col-sm-3  offset-sm-1">
               <select id="inputQuantity" class="form-control">
                <option value="A">UNIT METRIX</option>
                <option value="B">1</option>
                
                </select>
              </div>

            </div>
            <div class="row mb-3">
              <label for="inputBase" class="col-sm-2 col-form-label">Item Base Price </label>
              <div class="col-sm-10">
                <input type=" number" class="form-control" step="0.01">
              </div>
            </div>

           
            <div class="row mb-3">
              <label for="inputTax" class="col-sm-2 col-form-label">Item Tax</label>
              <div class="col-sm-3">
              <input type="number" class="form-control"step="0.01" >
              </div>
              <label for="inputPriceex" class="col-sm-2 col-form-label offset-sm-3">Price Exchange</label>
              <div class="col-sm-1">
               <select id="inputPriceex" class="form-control">
                <option value="C">USD</option>
                <option value="D">1</option>
                </select>
              </div>
              <div class="col-sm-1">
              <input type="number" class="form-control" step="0.01">
              
            
              </div>


            </div>
        
            <div class="row mb-3">
              <label for="inputPrice" class="col-sm-2 col-form-label">Total Price</label>
              <div class="col-sm-10">
              <input type="number" class="form-control"step="0.01" >
              
              </div>
            </div>



            <div class="row mb-3">
              <label for="inputCurrentBal" class="col-sm-2 col-form-label">Current Balance</label>
              <div class="col-sm-10">
              <input type="number" class="form-control"step="0.01" >
              
              </div>
            </div>




            <div class="row mb-3">
              <label for="inputBondqty" class="col-sm-2 col-form-label">Bond Out Quantity</label>
              <div class="col-sm-10">
              <input type="number" class="form-control" >
              
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