<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Laporan</h3>
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
            <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="text" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Total Transaksi <?php echo form_error('total_transaksi') ?></label>
            <input type="text" class="form-control" name="total_transaksi" id="total_transaksi" placeholder="Total Transaksi" value="<?php echo $total_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Pendapatan <?php echo form_error('pendapatan') ?></label>
            <input type="text" class="form-control" name="pendapatan" id="pendapatan" placeholder="Pendapatan" value="<?php echo $pendapatan; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>