<!DOCTYPE html>
<html lang="en">
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

      <link rel="shortcut icon" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" type="image/x-icon">
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
      <!-- akbr custom -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">
</head>
<div id="auth">

      <div class="container">
            <div class="row">
                  <div class="col-md-5 col-sm-12 mx-auto">
                        <div class="card pt-4">
                              <div class="card-body">
                                    <div class="text-center mb-5">
                                          <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                                          <h3><?= "{$setting_aplikasi->nama}"; ?></h3>
                                          <p>Silahkan isi dara diri.</p>
                                          <div class="text-left row">
                                                <div class="col-md-6 flex">
                                                      <form action="<?php echo $action; ?>" method="post">
                                                            <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
                                                            <input type="hidden" name="groups_id" value="2" />

                                                            <!-- image bootstrap base_url /assets/uploads/image -->
                                                            <center><img class="img-responsive text-center" src="<?= base_url('/assets/uploads/image/pembeli.png'); ?>" alt="" width="150px"></center>


                                                            <div class="text-center"><button type="submit" class="btn btn-primary">Pembeli</button></div>
                                                      </form>
                                                </div>
                                                <div class="col-md-6">
                                                      <form action="<?php echo $action; ?>" method="post">
                                                            <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
                                                            <input type="hidden" name="groups_id" value="33" />

                                                            <!-- image bootstrap base_url /assets/uploads/image -->
                                                            <center><img class="img-responsive text-center" src="<?= base_url('/assets/uploads/image/penjual.png'); ?>" alt="" width="150px"></center>


                                                            <div class="text-center"><button type="submit" class="btn btn-primary">Penjual</button></div>
                                                      </form>
                                                </div>

                                          </div>
                                          <!-- <div class="clearfix">
                                                <a href="<?= base_url('login'); ?>" class="btn btn-primary float-center" type="submit">Login</a>
                                          </div> -->
                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>
<script src="<?= base_url(); ?>assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>

<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>

<script>
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
</script>
</body>

</html>