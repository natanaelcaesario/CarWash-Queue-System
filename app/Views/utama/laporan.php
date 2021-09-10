<?php echo view('utama/header') ?>
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-body">
            <h3 class="text-lft">Laporan Keuangan</h3>
            <form action="<?= current_url() ?>" enctype="multipart/form-data" method="POST">
                <label for="">Tanggal Awal</label>
                <input type="date" class="form-control" name="tglawal" required>
                <hr>
                <label for="">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tglakhir" required>
                <br>
                <button type="submit" class="btn btn-primary float-right">Lihat Transaksi</button>
            </form>
        </div>
    </div>

</div>
<?php echo view('utama/footer')  ?>

<script>
    $("footer").attr("hidden", true);
</script>