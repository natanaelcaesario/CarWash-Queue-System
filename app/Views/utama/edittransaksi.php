<?php echo view('utama/header') ?>
<link href="<?= base_url('bootstrap-4.5.3-dist/css/TimeCircles.css') ?>" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h5 class="text-left text-dark">Edit Transaksi</h5>
                    <?php if ($transaksi->status == "Diterima") { ?>
                        <h6 class="text-left text-success">Transaksi Diterima</h6>
                    <?php } ?>
                    <?php if ($transaksi->status !== "Diterima") { ?>
                        <h6 class="text-left text-danger">Transaksi Butuh Pengananan</h6>
                    <?php } ?>
                </div>
                <div class="card-body">
              
                    <br>
                    <hr>
                    <label for="">Nama Motor</label>
                    <input type="text" name="nama" class="form-control" value="<?= $transaksi->motor ?>" readonly>
                    <label for="">Plat Motor</label>
                    <input type="text" name="plat_motor" class="form-control" value="<?= $transaksi->plat_motor ?>" readonly>
                    <label for="">Total Pembayaran</label>
                    <input type="text" name="" class="form-control" value="<?= $transaksi->harga ?>" readonly>


                </div>
                <div class="card-footer py-3">
                    <a class="btn btn-primary" href="<?= site_url('admin/terima/' . $transaksi->id_sewa . '/' . $transaksi->id_motor) ?>">Terima Transaksi</a>
                    <a class="btn btn-danger" href="<?= site_url('admin/tolak/' . $transaksi->id_sewa . '/' . $transaksi->id_motor) ?>">Tolak Transaksi</a>
                </div>

            </div>
            <!-- End of Main Content -->
        </div>


        <div class="col-5 text-center">

            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="text-left">Informasi</h5>
                </div>
                <div class="card-body">
                    <img src="<?= base_url('img/work.svg') ?>" alt="" width="300rem">
                    <hr>
                    <p class="text-left"><strong>Selamat datang dihalaman edit transaksi.</strong> Tombol Terima Transaksi akan melakukan update pada status pengguna dan mengizinkan pengguna untuk melakukan penyewaan motor</p>
                    <p class="text-left">Tombol Tolak Transaksi akan mengupdate transaksi agar pengguna melakukan penguploadan ulang transaksi yang sedang berlangsung</p>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="text-left">Informasi Penyewaan</h5>

                </div>
                <div class="card-body">
                    <p class="text-left"><strong>Deadline Pembayaran : </strong></p>
                    <p class="text-left" id="CountDown" data-date="<?php echo $transaksi->deadline ?>"></p>
                    <p class="text-left"><strong>Tanggal Sewa : </strong><?php echo $transaksi->tglsewa ?></p>
                    <p class="text-left"><strong>Tanggal Kembali : </strong> <?php echo $transaksi->tglkembali ?></p>
                    <p class="text-left"><strong>Status Terkini : </strong> <?php echo $transaksi->status ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php echo view('utama/footer') ?>
<script>
    $("footer").attr("hidden", true);
</script>
<script src="<?= base_url('admintemplate/js/TimeCircles.js') ?>">
</script>

<script>
    $("#CountDown").TimeCircles();
</script>