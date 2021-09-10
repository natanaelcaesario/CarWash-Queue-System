<?php echo view('navbar') ?>

<section class="page-section bg-dark">
    <div class="container text-center " style="padding: 50px;">
        <div class="row text-white">
            <div class="col-lg-6 ml-0">
                <img class="card-img-top" src="<?= base_url('uploads/gambar_produk/' . $motor->gambar_motor) ?>" alt="Card image cap">
                <hr>
                <h5 class="card-title"><?= $motor->nama_motor ?></h5>
                <hr class="divider" />
                <h5 class="card-title">Rp. <?= $motor->harga_sewa ?>/Hari</h5>
                <p class="card-text"><?= $motor->deskripsi ?></p>
            </div>
            <div class="col-lg-6 text-left text-white">
                <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                    <div hidden>
                        <label for="" class="form-label">Nomor Handphone</label>
                        <input type="tel" name="nomorhandphone" class="form-control" width=200 value="<?php echo $data['nomorhandphone'] ?>" readonly>
                        <label for="">Plat Motor</label>
                        <input type="text" name="plat_motor" class="form-control" width=200 value="<?= $motor->plat_motor ?>" readonly>
                        <input type="text" name="harga" class="form-control" width=200 value=" <?= $motor->harga_sewa ?>" readonly hidden>

                        <label for="">Motor</label>
                        <input type="text" name="motor" class="form-control" value="<?= $motor->nama_motor ?>" readonly>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" width=200 value="<?php echo $data['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Sewa</label>
                        <input type="date" name="tglsewa" id="today" class="form-control" width=200 required>
                        <input type="text" name="deadline" id="today2" class="form-control" width=200 value="<?php
                                                                                                                $current =  strtotime("+ 10 hour");
                                                                                                                echo gmdate("Y-m-d\TH:i:s\Z", $current), "\n"; ?>" hidden>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kembali</label>
                        <input type="date" name="tglkembali" class="form-control" width=200 required>
                    </div>
                    <input type="text" name="id_motor" hidden class="form-control" width=200 value="<?= $motor->id_motor ?>" readonly>
                    <input type="text" name="id_pengguna" hidden class="form-control" width=200 value="<?= $id_pengguna ?>" readonly>
                    <br>
                    <p align="center">
                        <button class="btn btn-success btn-block mr-auto">Lakukan Pembayaran</button>
                    </p>

                </form>

            </div>
        </div>

    </div>




    </div>
</section>


<?php echo view('footer') ?>
<script>
    // getting date
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today").value = today;
</script>