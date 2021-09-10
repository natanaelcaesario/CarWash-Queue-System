<?php echo view('utama/header')  ?>

<form action="<?= current_url() ?>" method="POST">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">

                    <div class="card-body">

                        <label for="">Denda</label>
                        <input type="number" name="denda" class="form-control" value="<?php if ($transaksi->denda != NULL) {
                                                                                            echo $transaksi->denda;
                                                                                        } ?>">

                        <label for="">Keterangan Denda</label>
                        <input type="text" class="form-control" name="keterangan" value="<?php if ($transaksi->keterangan != NULL) {
                                                                                                echo $transaksi->keterangan;
                                                                                            } ?>">
                        <br>

                        <p>Total : Rp.<?php $total = $transaksi->harga + $transaksi->denda;
                                        echo $total; ?></p>
                        <p class="text-right">
                            <button class="btn btn-primary" type="submit">Submit Data Pengembalian</button>
                        </p>
                    </div>


                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="text-left text-dark">Form Pengembalian</h5>
                    </div>
                    <div class="card-body">

                        <label for="">Nama Pelanggan</label>
                        <input type="text" class="form-control" value="<?= $pengguna->nama ?>" readonly>
                        <label for="">Nama Motor</label>
                        <input type="text" class="form-control" value="<?= $transaksi->motor ?>" readonly>
                        <label for="">Bayar</label>
                        <input type="text" class="form-control" value="<?= $transaksi->tglsewa ?>" readonly>

                        <br>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>
<!-- End of Main Content -->


<?php echo view('utama/footer')
?>
<script>
    $("footer").attr("hidden", true);
</script>