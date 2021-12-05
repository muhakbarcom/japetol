<!-- history pemesanan -->
<div class="container" style="margin-top:50px">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">History Pemesanan</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th>Tanggal</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($pemesanan as $pemesanan) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php
                      // get id_produk from detail_pemesanan where id_pemesanan
                      $id_produk = $this->db->get_where('detail_pemesanan', ['id_pemesanan' => $pemesanan->id_pemesanan])->result();
                      // var_dump($id_produk);
                      // exit;
                      foreach ($id_produk as $id_produk) {
                        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk->id_produk])->row();
                        echo $produk->nama_produk;
                        echo ", ";
                      }
                      ?>
                  </td>
                  <td><?php
                      // $pemesanan->tanggal_pemesanan to tanggal
                      $tanggal = date('d F Y', strtotime($pemesanan->tanggal_pemesanan));
                      echo $tanggal; ?></td>
                  <td><?php echo $pemesanan->total_pembayaran; ?></td>
                  <td><?php echo $pemesanan->status_pemesanan; ?></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end history pemesanan -->