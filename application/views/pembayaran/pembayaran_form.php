<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pembayaran</h3>
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
            <label for="int">Id Pemesanan <?php echo form_error('id_pemesanan') ?></label>
            <input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php echo $id_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Metode Pembayaran <?php echo form_error('metode_pembayaran') ?></label>
            <input type="text" class="form-control" name="metode_pembayaran" id="metode_pembayaran" placeholder="Metode Pembayaran" value="<?php echo $metode_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>