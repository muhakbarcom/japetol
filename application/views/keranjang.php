<div class="col-md-12" style="margin-top: 100px;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('pemesanan/update'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($this->cart->contents() as $items) :
            ?>
                <tr>
                    <!-- <td>Gambar</td> -->
                    <td><?= $items['name']; ?></td>
                    <td><?= rupiah($items['price']); ?></td>
                    <!-- <td><?= $items['qty']; ?></td> -->
                    <td width="10%">
                        <?php
                        $id_produk = $items['id'];
                        $stok_menu = $this->db->query('select stok_produk from produk where id_produk=' . $id_produk)->row();
                        $sisa = $stok_menu->stok_produk;
                        if ($sisa == 0) {
                            $stok_max = $stok_menu->stok_produk;
                        } else {
                            $stok_max = $stok_menu->stok_produk;
                        }
                        // var_dump($stok_max);
                        // exit;
                        ?>
                        <?php echo form_input(array(
                            'name' => $i . '[qty]',
                            'value' => $items['qty'],
                            'maxlength' => 3,
                            'min' => 0,
                            'max' => $stok_max,
                            'size' => 1,
                            'type' => 'number',
                            'class' => 'form-control',
                        )) ?>
                    </td>
                    <td><?= rupiah($items['subtotal']); ?></td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                        <a href="<?php echo base_url() ?>pemesanan/hapus/<?php echo $items['rowid']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <div class="row">
        <?php $jumlah_menu_item = count($this->cart->contents()); ?>
        <div class="col-md-6 text-right"><b> Total Item </b><?= $jumlah_menu_item; ?>
            <b> Total Quantity </b> <?= $this->cart->total_items(); ?>
        </div>

        <div class="col-md-6"> <b>Total Bayar</b> <?= rupiah($this->cart->total()); ?></div>
    </div>
    <div class="row mt-3">

    </div>
    <div class="row mt-5">
        <div class="col-md-6"><a href="<?= base_url('frontend'); ?>" class="btn btn-primary">Kembali</a></div>
        <div class="col-md-6 text-right"><a href="<?= base_url() ?>pemesanan/checkout" class="btn btn-primary">Checkout</a></div>
    </div>
    <?= form_close(); ?>



</div>