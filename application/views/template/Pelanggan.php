<!DOCTYPE html>
<html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/fontawesome/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables/dataTables.checkboxes.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- akbr custom -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2-spn.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/skin-custom.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/pace/pace.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/alertify/css/alertify.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-select/css/bootstrap-select.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/tamacms/custom.css">
  <!-- jQuery 3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/PACE/pace.min.js"></script>

  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

  <!-- AdminLTE App -->
  <!-- DataTables -->
  <script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/datatables/dataTables.checkboxes.js"></script>
  <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/alertify/alertify.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- mask -->
  <script src="<?= base_url(); ?>assets/dist/js/jquery.mask.min.js"></script>
  <style type="text/css">
    .pagination>li>a,
    .pagination>li>span {
      padding: 3px 10px !important;
    }
  </style>
</head>

<body class="hold-transition fixed skin-blue">
  <!-- Site wrapper -->
  <div class="row">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= $this->config->item('sitename_mini') ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= $this->config->item('sitename') . "{$setting_aplikasi->nama}" ?></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->


        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php
            $user = $this->ion_auth->user()->row();
            ?>
            <!-- User Account: style can be found in dropdown.less -->

            <?php if ($this->ion_auth->in_group("pelanggan")) { ?>
              <li class="dropdown user user-menu">
                <a href="<?= base_url('pemesanan/keranjang'); ?>">
                  <span class="hidden-xs"><i class="fas fa-shopping-cart"></i> Keranjang (<?php echo $this->cart->total_items() ?>)</span>
                </a>
              </li>
              <li>
                <a href="<?= base_url('auth/logout'); ?>">
                  <span class="hidden-xs"><i class="fas fa-sign-out-alt"></i> Logout</span>
                </a>
              </li>
            <?php } else { ?>
              <li>
                <a href="<?= base_url('auth/login'); ?>">
                  <span class="hidden-xs"><i class="fas fa-sign-out-alt"></i> Login</span>
                </a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->


    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="container">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($page); ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Developed by<a href="https://SIPTOKUNA.com"> SIPTOKUNA</b></a>
      </div>
      <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://SIPTOKUNA.com">SIPTOKUNA</a>.</strong> All rights
      reserved.
      <!-- copyright
   
      <noscript><i>Javascript required</i></noscript>
    </footer>

  </div>
  <!-- ./wrapper -->

      <!-- sweetallert -->
      <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script>
        $(document).ready(function() {
          $('.sidebar-menu').tree()
        })
        $(function() {
          $('.select2').select2();
          $('#sidebar-form').on('submit', function(e) {
            e.preventDefault();
          });
          $('.rupiah').mask('000.000.000.000', {
            reverse: true
          });
          $('.sidebar-menu li.active').data('lte.pushmenu.active', true);
          $('#search-input').on('keyup', function() {
            var term = $('#search-input').val().trim();
            if (term.length === 0) {
              $('.sidebar-menu li').each(function() {
                $(this).show(0);
                $(this).removeClass('active');
                if ($(this).data('lte.pushmenu.active')) {
                  $(this).addClass('active');
                }
              });
              return;
            }
            $('.sidebar-menu li').each(function() {
              if ($(this).text().toLowerCase().indexOf(term.toLowerCase()) === -1) {
                $(this).hide(0);
                $(this).removeClass('pushmenu-search-found', false);
                if ($(this).is('.treeview')) {
                  $(this).removeClass('active');
                }
              } else {
                $(this).show(0);
                $(this).addClass('pushmenu-search-found');
                if ($(this).is('.treeview')) {
                  $(this).addClass('active');
                }
                var parent = $(this).parents('li').first();
                if (parent.is('.treeview')) {
                  parent.show(0);
                }
              }
              if ($(this).is('.header')) {
                $(this).show();
              }
            });

            $('.sidebar-menu li.pushmenu-search-found.treeview').each(function() {
              $(this).find('.pushmenu-search-found').show(0);
            });
          });
        });

        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() {
          Pace.restart()
        });


        // sweetallert
        <?php
        if (isset($this->session->success)) { ?>
          alertify.set('notifier', 'position', 'center');
          Swal.fire(
            'Good Job!',
            '<?= $this->session->success; ?>',
            'success'
          )

        <?php } elseif (isset($this->session->error)) { ?>
          alertify.set('notifier', 'position', 'center');
          Swal.fire(
            'Oopss!',
            '<?= $this->session->error; ?>',
            'error'
          )
        <?php } ?>

        //var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
      </script>

</body>

</html>