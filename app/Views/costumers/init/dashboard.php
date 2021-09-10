<?php echo view('navbar');
?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>

<header class="masthead">
    <div class="container h-100">
        <?php if ($errors != null) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors  ?>
            </div>
        <?php endif ?>
        <?php if ($success != null) :  ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success  ?>
            </div>
        <?php endif  ?>
        <form action="<?= site_url('user/profil') ?>" method="POST" enctype="multipart/form-data">
            <div class="card text-center">
                <div class="card-header" style="font-weight: bolder;">
                    Dashboard User
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img name"gambar" alt="Anda Belum Punya Foto Profil" src="<?= base_url('uploads/profil/' . $info->gambar) ?>" alt="img" height="200" width="200">
                        </div>
                        <div class="col-6 text-left">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $info->nama ?>">
                            <label for="nama">Nomer Handphone</label>
                            <input type="text" class="form-control" name="nomorhandphone" value="<?= $info->nomorhandphone ?>">
                            <br>
                            <a href="<?= site_url('user/foto') ?>" style="float: right; margin-right:5px">Klik Untuk Menuju Halaman Foto Profil</a>
                        </div>
                        <div class="col-6"></div>
                    </div>

                </div>
                <div class="card-footer text-muted">

                    <button onclick="return confirm('Apakah anda ingin mengganti data anda?');" class="btn btn-primary" type="submit" style="float: right;">Update Profil</button>
                    <a href="<?= site_url('user/transaksi') ?>" class="btn btn-secondary" style="float: right; margin-right:5px">Lihat Transaksi</a>

                </div>
            </div>
        </form>

    </div>
</header>

<?php
echo view('footer');
?>

<script>
    $("#navbar1").attr("hidden", true);
    $("#navbar2").attr("hidden", true);
    $("#navbar3").attr("hidden", true);
</script>