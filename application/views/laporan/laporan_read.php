<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan Detail</h3>
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
        <table class="table">
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Total Transaksi</td><td><?php echo $total_transaksi; ?></td></tr>
	    <tr><td>Pendapatan</td><td><?php echo $pendapatan; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('laporan') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>