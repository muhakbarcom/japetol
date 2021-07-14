<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pemesanan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Pesanan <?php echo form_error('tgl_pesanan') ?></label>
            <input type="text" class="form-control" name="tgl_pesanan" id="tgl_pesanan" placeholder="Tgl Pesanan" value="<?php echo $tgl_pesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Pengambilan <?php echo form_error('tgl_pengambilan') ?></label>
            <input type="text" class="form-control" name="tgl_pengambilan" id="tgl_pengambilan" placeholder="Tgl Pengambilan" value="<?php echo $tgl_pengambilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Pembayaran <?php echo form_error('total_pembayaran') ?></label>
            <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran" placeholder="Total Pembayaran" value="<?php echo $total_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Catatan <?php echo form_error('catatan') ?></label>
            <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>