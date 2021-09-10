<?php echo view('utama/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h5 class="text-left text-dark">Edit Pengguna</h5>

        </div>
        <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $cari->nama ?>" readonly>
                <label for="">Nomor Handphone</label>
                <input type="text" name="nomorhandphone" class="form-control" value="<?= $cari->nomorhandphone ?>" readonly>
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $cari->email ?>" readonly>

            </div>
            <div class="card-footer py-3">

                <a class="btn btn-primary" href="<?= site_url('admin') ?>">Kembali</a>

            </div>
        </form>
    </div>
    <!-- End of Main Content -->

    <?php echo view('utama/footer') ?>
    <script>
        $("footer").attr("hidden", true);
    </script>