<?php echo view('utama/header') ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">

        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="text-left text-dark">Edit Motor</h5>
                    <?php if ($motor->status == "Tersedia") { ?>
                        <h6 class="text-left text-success">Motor Tersedia</h6>
                    <?php } ?>
                    <?php if ($motor->status !== "Tersedia") { ?>
                        <h6 class="text-left text-danger">Motor Tidak Tersedia</h6>
                    <?php } ?>
                </div>
                <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <center>
                            <img src="<?= base_url('uploads/gambar_produk/') . "/" . $motor->gambar_motor ?>" class="rounded" alt="Belum ada foto produk" height="200px">
                        </center>
                        <br>
                        <br>
                        <label for="">Nama Motor</label>
                        <input type="text" name="nama_motor" class="form-control" value="<?= $motor->nama_motor ?>">
                        <label for="">Plat Motor</label>
                        <input type="text" name="plat_motor" class="form-control" value="<?= $motor->plat_motor ?>">
                        <label for="">Harga Sewa 1 Hari</label>
                        <input type="text" name"harga_sewa" class="form-control" value="<?= $motor->harga_sewa ?>">
                        <label for="">Deskripsi</label>
                        <input name="deskripsi" class="form-control" value="<?= $motor->deskripsi ?>"></input>
                        <br>
                        <label for="">Status Kendaraan</label>
                        <select value="" class="form-control" name="status" required>
                            <Option>Tersedia</Option>
                            <Option>Disewa</Option>
                        </select>
                    </div>
                    <div class="card-footer py-3">

                        <button class="btn btn-primary" type="submit">Update Data Motor</button>
                        <a href="<?= site_url('admin/gantigambar/' . $motor->id_motor) ?>" class="btn btn-dark">Ganti Gambar</a>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-9">
                    <div class="card shadow">
                        <div class="card-header">
                            Informasi
                        </div>
                        <div class="card-body">
                            <center>
                                <img src="<?= base_url('img/work.svg') ?>" alt="" width="250rem">
                            </center>
                            <hr>
                            <p>Untuk Edit Produk yang tersedia isikan data yang anda inginkan kemudian klik Update Data</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-9">
                    <div class="card shadow">
                        <div class="card-body">

                        </div>
                    </div>

                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php echo view('utama/footer') ?>
<script>
    $("footer").attr("hidden", true);
</script>