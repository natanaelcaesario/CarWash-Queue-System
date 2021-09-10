<?php echo view('utama/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Data Antrian Steam Motor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomer Antrian</th>
                            <th>Nama</th>
                            <th>Tanggal Antri</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($data as $a) : ?>
                            <tr>

                                <td><?= $a->id_antrian ?></td>
                                <td><?= $a->nama_pelanggan ?></td>
                                <td><?= $a->tanggal ?></td>
                                <td><a href="hapusantrian/<?= $a->id_antrian ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Konfirmasi</a></td>


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