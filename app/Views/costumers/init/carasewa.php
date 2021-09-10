<?php echo view('navbar') ?>

<header class="header bg-primary">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold" style="margin-top:100px">Tata Cara Sewa Motor</h1>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">Ayo Sewa dengan kami khususnya untuk para traveller yang sedang berada di wilayah JABODETABEK!
                    <br><br> <a href="<?= base_url('home') ?>" class="btn btn-primary">Sewa Sekarang</a>

                </p>


            </div>

        </div>
    </div>
</header>

<!-- Content Row -->
<!-- Marketing Icons Section -->
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100" shadow-lg p-3 mb-5 bg-white rounded>
                <h4 class="card-header bg-primary text-center text-white"> Ketentuan</h4>
                <div class="card-body">
                    <div class="et_pb_text_inner">
                        <p>
                            <li>Setiap penyewa harus berusia 18 tahun atau lebih</li>
                            <li>Setiap penyewa harus mempunyai SIM Nasional / Internasional yang masih berlaku.</li>
                            <li>Glow Rental Motor mengharuskan pelanggan untuk melakukan pembayaran biaya sewa 100% pada saat pemesanan via website.</li>
                            <li>Semua kerusakan yang disebabkan oleh kelalaian penyewa menjadi tanggung jawab penyewa, kami akan mengenakan denda atau biaya tambahan pada akhir masa sewa apabila terjadi kerusakan.</li>
                            <li>Apabila terdapat barang-barang aksesoris kami yang hilang, tercuri, atau rusak, penyewa akan dikenakan denda</li>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header bg-primary text-center text-white">Syarat </h4>
                <div class="card-body ">
                    <p class="card-text">Berikut Syarat sewa bagi WNI dimana Pelanggan wajib memberikan 3 identitas kepada Glow Rental</p>
                    <div class="et_pb_text_inner">
                        <ul>
                            <li>E-KTP (wajib, sudah dalam bentuk kartu. Bukan surat dari kecamatan)</li>
                            <li> NPWP (pajak)</li>
                            <li>KTM (kartu mahasiswa)</li>
                            <l>iD card kantor / keanggotaan organisasi</li>
                                <li>STNK kendaraan pribadi dengan syarat alamat sama sesuai E-KTP</li>
                                <li>BPJS</li>
                                <li>Passport</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header bg-primary text-center text-white">Cara Sewa </h4>
                <div class="card-body">
                    <p class="card-text">Berikut langkah mudah proses penyewaan motor di Glow Rental</p>
                    <div class="et_pb_text_inner">
                        <ul>
                            <li>Setiap Pelanggan harus melakukan registrasi terlebih dahulu</li>
                            <li>Jika sudah memiliki akun maka Pelanggan dapat melakukan login untuk melanjuutkan proses penyewaan </li>
                            <li> Pelanggan memilih motor yang akan disewa dengan mengisi form penyewaan</li>
                            <li>pelanggan wajib melakukan pembayaran 100% saat memesan motor melalui website</li>
                            <l>Pelanggan mengupload bukti transfer ke sistem</li>
                                <l>Pelanggan menunggu konfirmasi dari admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>

<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">

        </div>
        <div class="col-4"></div>
    </div>
</div>



<?php echo view('footer') ?>
<script>
    $("#navbar1").attr("hidden", true);
    $("#navbar2").attr("hidden", true);
    $("#navbar3").attr("hidden", true);
</script>