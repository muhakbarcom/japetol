<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Produk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo form_open_multipart($action); ?>
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
                    <input type="file" class="form-control" name="gambar_produk" id="gambar_produk" placeholder="gambar_produk" value="<?php echo $gambar_produk; ?>" />
                    <?php if ($gambar_produk) : ?>
                        <img src="<?= base_url('assets/uploads/image/menu/') . $gambar_produk ?>" class="img-thumbnail">
                    <?php else : ?>
                    <?php endif ?>
                </div>
                <!-- $kategori_produk -->
                <div class="form-group">
                    <label for="int">Kategori Produk <?php echo form_error('kategori_produk') ?></label>
                    <select name="kategori_produk" id="kategori_produk" class="form-control">
                        <option value="">-- Pilih Kategori Produk --</option>
                        <?php foreach ($kategori_produk_list as $kategori) : ?>
                            <option value="<?= $kategori['id_kategori'] ?>" <?= $kategori['id_kategori'] == $kategori_produk ? 'selected' : '' ?>><?= $kategori['kategori'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <input type="hidden" name="gambar_lama" value="<?php echo $gambar_produk; ?>" />
                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>