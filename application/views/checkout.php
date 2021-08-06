<div class="col-md-8" style="margin-top: 100px;">
    <table class="table table-bordered">
        <h3>Pesanan Anda</h3>
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>PRODUK</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php
            foreach ($this->cart->contents() as $items) :
            ?>
                <tr>
                    <!-- <td>Gambar</td> -->
                    <td><?= $items['name']; ?> x <?= $items['qty']; ?></td>
                    <td><?= rupiah($items['subtotal']); ?></td>

                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <div class="row">
        <?php $jumlah_menu_item = count($this->cart->contents()); ?>
        <div class="col-md-6 text-right"><b> Total Item </b><?= $jumlah_menu_item; ?>

        </div>

        <div class="col-md-6"> <b>Total Bayar</b> <?= rupiah($this->cart->total()); ?></div>
    </div>
    <?php echo form_open_multipart('pemesanan/buatPesanan'); ?>
    <div class="row mt-3">
        <div class="col-md-8 form-group">
            <h3>Pembayaran</h3>
            <table class="table">
            <tr>
                    <th>Bank</th>
                    <th>No Rekening</th>
                    <th>Atas Nama</th>
                </tr>
                <tr>
                    <td>BCA</td>
                    <td>3456754</td>
                    <td>Vinda Ayu Lestari</td>
                </tr>
            </table>
            <label>
                Metode Pembayaran
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                    <option value="bayar ditempat">bayar ditempat</option>
                    <option value="transfer bank">transfer bank</option>
                </select>
            </label>

            <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer" placeholder="bukti_transfer" />
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6"><a href="<?= base_url('pemesanan/keranjang'); ?>" class="btn btn-primary">Kembali</a></div>
        <div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Buat Pesanan</button></div>
    </div>
    </form>




</div>