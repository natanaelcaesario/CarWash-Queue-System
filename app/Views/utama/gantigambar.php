<?php echo view('utama/header') ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-left text-dark">Ganti Gambar Motor</h5>

        </div>
        <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <label for="">Nama Motor</label>
                <br>
                <input type="file" name="gambar_motor">
            </div>
            <div class="card-footer py-3">
                <button class="btn btn-primary" type="submit">Ganti Gambar</button>
            </div>
        </form>
    </div>
    <!-- End of Main Content -->

    <?php echo view('utama/footer') ?>
    <script>
        $("footer").attr("hidden", true);
    </script>