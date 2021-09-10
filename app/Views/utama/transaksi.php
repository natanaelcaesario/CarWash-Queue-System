<?php echo view('utama/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Data Transaksi pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Motor</th>
                            <th>Plat Motor</th>
                            <th>Kode Booking</th>
                            <th>Tanggal Transaksi</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $nomer = 1;
                        foreach ($data as $transaksi) : ?>
                            <tr>
                                <td><?php echo $nomer++ ?></td>
                                <td><?= $transaksi->nama ?></td>
                                <td><?= $transaksi->motor ?></td>
                                <td><?= $transaksi->plat_motor ?></td>
                                <td><?= $transaksi->kode_booking ?></td>
                                <td><?= $transaksi->tanggaltransaksi ?></td>
                                <?php if ($transaksi->status == "Diterima") { ?>
                                    <td class="text-success"> <?php echo $transaksi->status ?></td>
                                <?php } ?>
                                <?php if ($transaksi->status !== "Diterima") { ?>
                                    <td class="text-danger"> <?php echo $transaksi->status ?></td>
                                <?php } ?>



                                <td>
                                    <?php if ($transaksi->status !== "Diterima") { ?>
                                        <a href="<?= site_url('admin/edittransaksi/' . $transaksi->id_sewa) ?>" class="btn btn-success">Tangani</a>
                                    <?php } ?>
                                    <a onclick="return confirm('Apakah anda yakin menghapus transaksi ini?');" href="<?= site_url('admin/hapustransaksi/' . $transaksi->id_sewa . '/' . $transaksi->id_motor) ?>" class="btn btn-danger">Hapus </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php echo view('utama/footer')  ?>
<script>
    $("footer").attr("hidden", true);
</script>