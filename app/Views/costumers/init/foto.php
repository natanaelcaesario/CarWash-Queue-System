<?php echo view('navbar');
?>

<header class="masthead">
    <div class="container h-100">
        <form action="<?= site_url('user/foto') ?>" method="POST" enctype="multipart/form-data">
            <div class="card text-center">
                <div class="card-header" style="font-weight: bolder;">
                    Upload Gambar
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img name"gambar" alt="Anda Belum Punya Foto Profil" class="img-holder" src="<?= base_url('uploads/profil/' . $info->gambar) ?>" alt="img" height="300" width="300">
                            <hr>
                            <input type="file" name="gambar">
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-success" type="submit" style="float: right;">Ganti Foto Profil</button>
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