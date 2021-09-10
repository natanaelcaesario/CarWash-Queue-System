<?php echo view('utama/header') ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="text-left text-dark" style="font-weight: bolder;">Tambah Motor</h5>
                </div>
                <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <label for="">Nama Motor</label>
                        <input type="text" name="nama_motor" class="form-control" required>
                        <label for="">Plat Motor</label>
                        <input type="text" class="form-control" name="plat_motor" required>
                        <label for="">Harga Sewa 1 Hari</label>
                        <input type="text" class="form-control" name="harga_sewa" required>
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                        <br>
                        <label for="">Gambar Motor</label>
                        <br>
                        <input type="file" name="gambar_motor" required>
                    </div>
                    <div class="card-footer py-3">
                        <button class="btn btn-secondary" type="submit">Tambah Motor</button>
                    </div>
                </form>
            </div>
            <!-- End of Main Content -->
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Silahkan Tambahkan Motor
                </div>
                <div class="card-body py-3">

                    <p>Tambahkan produk yang dibutuhkan untuk dapat disewakan kepada pengguna<br><br>
                        <strong>Pastikan kamu isi semua kolom ya!</strong>
                    </p>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body py-3">
                    <img src="<?= base_url("img/yow.svg") ?>" alt="" width="300rem">
                    <hr>
                    <p>Tambahkan produk yang dibutuhkan untuk dapat disewakan kepada pengguna<br><br>
                        <strong>Pastikan kamu isi semua kolom ya!</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo view('utama/footer') ?>
<script>
    $("footer").attr("hidden", true);
</script>