<?php echo view('utama/header') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Transaksi Pengguna</h6>

        </div>
        <div class="card-body">
            <p>Transaksi Yang terdapat pada table ini merupakan transaksi yang sudah diterima</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-left">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Plat Motor</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $nomer = 1;
                        foreach ($transaksi as $transaksi) : ?>
                            <tr>
                                <td><?php echo $nomer++ ?></td>
                                <td><?= $transaksi->nama ?></td>
                                <td><?= $transaksi->nomorhandphone ?></td>
                                <td><?= $transaksi->tglsewa ?></td>
                                <td><?= $transaksi->tglkembali ?></td>

                                <td><?= $transaksi->plat_motor ?></td>

                                <td><?php $data = $transaksi->harga + $transaksi->denda;
                                    echo $data ?></td>
                                <td><?php if ($transaksi->keterangan != NULL) {
                                        echo
                                        $transaksi->keterangan;
                                    } else {
                                        echo "Tidak Ada Keterangan";
                                    } ?></td>
                                <th class="text-success"><?= $transaksi->status ?></th>
                                <td>


                                    <a href="<?= site_url('admin/kembalikan/' . $transaksi->id_sewa . '/' . $transaksi->id_motor . '/' . $transaksi->id_pengguna) ?>" class="btn btn-primary">Pengembalian</a>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <?php echo view('utama/footer') ?>
    <script>
        $("footer").attr("hidden", true);
    </script>