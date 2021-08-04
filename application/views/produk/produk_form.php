<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Produk</h3>
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
            <label for="varchar">Nama Produk <?php echo form_error('nama_produk') ?></label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Produk <?php echo form_error('harga_produk') ?></label>
            <input type="text" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga Produk" value="<?php echo $harga_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok Produk <?php echo form_error('stok_produk') ?></label>
            <input type="text" class="form-control" name="stok_produk" id="stok_produk" placeholder="Stok Produk" value="<?php echo $stok_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gambar Produk <?php echo form_error('gambar_produk') ?></label>
            <input type="text" class="form-control" name="gambar_produk" id="gambar_produk" placeholder="Gambar Produk" value="<?php echo $gambar_produk; ?>" />
        </div>
	    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>