<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <?php
        // Load the Session library
        $session = \Config\Services::session();

     
        $user_role = $session->get('user_role');
        ?>

        <!-- Start Dashboard Nav -->
        <?php if ( $user_role == 'supervisor' || $user_role == 'staff' || $user_role == 'vendor'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed " href="<?= site_url('dashboard') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        <?php endif; ?>
        <!-- End Dashboard Nav -->

        <!-- Start Vendor Nav -->
        <?php if ( $user_role == 'supervisor' || $user_role == 'staff' || $user_role == 'vendor'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= site_url('vendor') ?>">
                    <i class="bi bi-person"></i>
                    <span>Vendor</span>
                </a>
            </li>
        <?php endif; ?>
        <!-- End Vendor Nav -->

        

        <?php if ( $user_role == 'supervisor' || $user_role == 'staff' || $user_role == 'vendor'): ?>
  <!-- Start Lot No Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Lot</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= site_url('lotno') ?>">
          <i class="bi bi-circle"></i><span>Lot Number</span>
        </a>
      </li>
      <li>
        <a href="<?= site_url('addnewlot') ?>">
          <i class="bi bi-circle"></i><span>Add new lot</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- End Lot No Nav -->
  <?php endif; ?>

  <?php if ( $user_role == 'supervisor' || $user_role == 'staff' || $user_role == 'vendor'): ?>
  <!-- Start Bond In/Out Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Bond In/Out</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

    <li>
        <a href="<?= site_url('bondtransaction') ?>">
          <i class="bi bi-circle"></i><span>Bond Transaction</span>
        </a>
      </li>

      <li>
        <a href="<?= site_url('bondin') ?>">
          <i class="bi bi-circle"></i><span>Bond In</span>
        </a>
      </li>
      <li>
        <a href="<?= site_url('bondout') ?>">
          <i class="bi bi-circle"></i><span>Bond Out</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- End Bond In/Out Nav -->
  <?php endif; ?>





        <!-- Start Report Nav -->
        <?php if ( $user_role == 'supervisor' || $user_role == 'staff'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= site_url('report') ?>">
                    <i class="bi bi-person"></i>
                    <span>Report</span>
                </a>
            </li>
        <?php endif; ?>
        <!-- End Report Nav -->

        <!-- Start Setting Nav -->
        <?php if ($user_role == 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('user') ?>">
                            <i class="bi bi-circle"></i><span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('profile') ?>">
                            <i class="bi bi-circle"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('log') ?>">
                            <i class="bi bi-circle"></i><span>Log</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <!-- End Setting Nav -->

    </ul>
</aside>
<!-- End Sidebar-->
