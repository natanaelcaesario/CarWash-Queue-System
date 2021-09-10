<?php echo view('navbar');
?>

<!-- Masthead-->
<header class="masthead ">
    <div class="container-fluid h-100 mt-5">
        <div class=" text-center">
        <div class =" text-white">
            <div class="col-lg-12">
                <div class="card-body ">
                    <table class="table text-white" id="table" style="width:100%"> TRANSAKSI ANDA
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Motor</td>
                                <td>Plat-Motor</td>
                                <td>Kode Booking</td>
                                <td>Tanggal Sewa</td>
                                <td>Tanggal Pengembalian</td>
                                <td>Status</td>
                                <td>Pilihan</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($hai as $transaksi) : ?>
                                <tr>
                                    <td><?= $current["nama"] ?></td>
                                    <td><?= $transaksi->motor ?></td>
                                    <td><?= $transaksi->plat_motor ?></td>
                                    <td><?= $transaksi->kode_booking ?></td>
                                    <td><?= $transaksi->tglsewa ?></td>
                                    <td><?= $transaksi->tglkembali ?></td>
                                    <td><?= $transaksi->status
                                        ?></td>

                                    <td>
                                        <p class=" text-success" <?= $transaksi->status !== "Diterima" ? "hidden" : ""; ?>>Pembayaran Berhasil</p>
                                        <a href="<?= site_url('transaksi/bayar/' . $transaksi->id_sewa) ?>" class="btn btn-primary mr-1" <?= $transaksi->status == "Diterima" ? "hidden" : ""; ?>>Bayar</a>
                                        <a href="<?= site_url('transaksi/batal/' . $transaksi->id_sewa) ?>" class="btn btn-danger" <?= $transaksi->status == "Diterima" ? "hidden" : ""; ?>>Batal </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</header>


<?php echo view('footer') ?>
<script>
    $("#navbar1").attr("hidden", true);
    $("#navbar2").attr("hidden", true);
    $("#navbar3").attr("hidden", true);
</script>