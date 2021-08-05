<section id="process">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title"></h3> -->
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                                <i class="fa fa-refresh"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md text-center">
                                <form action="<?php echo site_url('frontend'); ?>" method="get" style="margin-top:10px">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('frontend'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($produk_data as $produk) {
                            ?>
                                <div class="col-md-2 bg-white shadow p-4 m-2">
                                    <div class=" mx-auto rounded">
                                        <img src="<?= base_url('assets/uploads/image/menu/') . $produk->gambar_produk ?>" class="img-thumbnail">
                                        <br><br>
                                        <p style="font-size: 18px">
                                            <?php echo $produk->nama_produk ?>
                                            <br>
                                            <b>
                                                <?php echo rupiah($produk->harga_produk) ?>
                                            </b>
                                            <br>
                                            <a href="<?= base_url('pemesanan/tambahKeranjang/') . $produk->id_produk; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                                        </p>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <script>
            function confirmdelete(linkdelete) {
                alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
                    location.href = linkdelete;
                }, function() {
                    alertify.error("Penghapusan data dibatalkan.");
                });
                $(".ajs-header").html("Konfirmasi");
                return false;
            }
            $(':checkbox[name=selectall]').click(function() {
                $(':checkbox[name=id]').prop('checked', this.checked);
            });

            $("#formbulk").on("submit", function() {
                var rowsel = [];
                $.each($("input[name='id']:checked"), function() {
                    rowsel.push($(this).val());
                });
                if (rowsel.join(",") == "") {
                    alertify.alert('', 'Tidak ada data terpilih!', function() {});

                } else {
                    var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                        'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                        ok: 'Yakin',
                        cancel: 'Batal!'
                    }).set('onok', function(closeEvent) {

                        $.ajax({
                            url: "produk/deletebulk",
                            type: "post",
                            data: "msg = " + rowsel.join(","),
                            success: function(response) {
                                if (response == true) {
                                    location.reload();
                                }
                                //console.log(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });

                    });
                    $(".ajs-header").html("Konfirmasi");
                }
                return false;
            });
        </script>


    </div>
</section>