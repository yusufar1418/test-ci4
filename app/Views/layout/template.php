<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YusufAbdulRahman</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="/icon.ico">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url(''); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(''); ?>css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="<?= base_url(''); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url(''); ?>css/bootstrap.css" rel="stylesheet">
  <link href="<?= base_url(''); ?>css/jquery-ui.css" rel="stylesheet">
  <!-- Custom styles for Datatables-->



  <link rel="stylesheet" href="<?= base_url('datatables/css/dataTables.bootstrap4.css') ;?>">

  


</head>


<body id="page-top">

	  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #2F5596;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('employee') ?>">
         <div class="sidebar-brand-icon">
          <img src="<?= base_url('img/logo2.png')?>" width="80px">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- QUERY MENU -->
      <?php 
      
      $db = \Config\Database::connect();
      $queryMenu = "SELECT `user_menu`.`id`, `menu`  FROM `user_menu`";
      $menu = $db->query($queryMenu)->getResultArray();
       ?>

       <!-- LOOPING MENU -->
       <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB MENU SESUAI MENU -->
        <?php 
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = $menuId AND `is_active` = 1";
          $subMenu = $db->query($querySubMenu)->getResultArray();
         ?>

         <?php foreach ($subMenu as $sm) :?>  
          <?php if ($title == $sm['title']) :?>
          <li class="nav-item active">
            <?php else :?>
          <li class="nav-item">
             <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span></a>
          </li>
        <?php endforeach; ?>  

        <hr class="sidebar-divider mt-3">

      <?php endforeach; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->username; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('img/profile/'.user()->image) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('logout') ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <?= $this->renderSection('content'); ?>
            
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; YusufAbdulRahman <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 

  <script src="<?= base_url(''); ?>jquery/jquery.js"></script>
  <script src="<?= base_url(''); ?>jquery/bootstrap.js"></script>
  <script src="<?= base_url(''); ?>jquery/jquery-ui.js"></script>
  


  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(''); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

  <script src="<?= base_url(''); ?>js/sb-admin-2.min.js"></script>

  <script src="<?= base_url('datatables/js/jquery.dataTables.min.js') ;?>"></script>
    <script src="<?= base_url('datatables/js/dataTables.bootstrap4.js') ;?>"></script>
    

    <script type="text/javascript">
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });

    $(document).ready(function(){
      $('#table').DataTable();
      responsive: true
    });
    </script>

</body>

</html>
