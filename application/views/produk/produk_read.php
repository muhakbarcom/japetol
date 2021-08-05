<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Produk Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Nama Produk</td>
                        <td><?php echo $nama_produk; ?></td>
                    </tr>
                    <tr>
                        <td>Harga Produk</td>
                        <td><?php echo $harga_produk; ?></td>
                    </tr>
                    <tr>
                        <td>Stok Produk</td>
                        <td><?php echo $stok_produk; ?></td>
                    </tr>
                    <tr>
                        <td>Gambar Produk</td>
                        <td><img src="<?= base_url('assets/uploads/image/menu/') . $gambar_produk ?>" class="img-thumbnail" width="150"></td>
                        <td style="text-align:center" width="200px"></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('produk') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>