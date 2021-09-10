<?php echo view('utama/header') ?>
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <strong> Halaman Dashboard </strong>
        </div>
        <div class="card-body tex">
            Selamat Datang di Webiste Sewa Motor online by Glow rental motor.
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header text">
                    <strong> VISI </strong>
                </div>
                <div class="card-body text-primary">
                    <p>Menyediakan kebutuhan armada rental motor dengan kualitas terbaik dan terlengkap dengan harga terjangkau dan layanan 24 jam dan kami menyediakan jasa sewa motor bagi para traveller yang sedang berada di wilayah JABODETABEK</P>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header text">
                    <strong>MISI</strong>

                </div>
                <div class="card-body text-primary">
                    Memudahkan para kaum traveller untuk penyewaan motor & penginapan supaya liburan lebih efektif dengan harga terjangkau.

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Pengguna Rental Motor </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Email</th>
                            <th>Perintah</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $nomer = 1;
                        foreach ($semua as $pengguna) : ?>
                            <tr>
                                <td><?php echo $nomer++ ?></td>
                                <td><?= $pengguna->nama ?></td>
                                <td><?= $pengguna->nomorhandphone ?></td>
                                <td><?= $pengguna->email ?></td>

                                <td>
                                    <a href="<?= site_url('admin/edituser/' . $pengguna->id_pengguna) ?>" class="btn btn-warning">Lihat Info Pengguna</a>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- End of Main Content -->

    <?php echo view('utama/footer') ?>
    <script>
        $("footer").attr("hidden", true);
    </script>