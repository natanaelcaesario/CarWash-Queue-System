<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<!-- Masthead-->
<header class="header bg-dark">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold" style="margin-top:100px">Rental Motor Online</h1>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">Sewa Motor Online Sekarang Gampang Banget loh. Ayo sewa dengan kami khususnya bagi kamu kaum traveller yang sedang berada di wilayah JABODETABEK!
                    <br> <br><a href="<?= base_url('antrian') ?>" class="btn btn-warning">Booking Antrian Steam</a>
                </p>
            </div>

        </div>
    </div>
</header>

<!-- About-->

<section class="page-section " id="product">
    <div class="row h-100 align-items-center justify-content-center text-center">

        <?php
        foreach ($motor as $produk) : ?>
            <!-- klo ga tersedia tombol ga ada status akan disewa -->

            <div class="col-lg-4 mb-5 ml-10" style="padding: 25px;">
                <div class="card shadow-lg border-primary">
                    <img class="img-responsive" src="<?= base_url('uploads/gambar_produk/' . $produk->gambar_motor) ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produk->nama_motor ?></h5>
                        <p class="<?= $produk->status == "Tersedia" ? "bg-success" : "bg-danger"; ?> text-white rounded"><?= $produk->status == "Tersedia" ? "Tersedia" : "Tidak Tersedia"; ?></p>
                        <hr class="divider" />
                        <p class="card-text">Plat Motor : <strong><?= $produk->plat_motor ?></p></strong>
                        <p>Harga Sewa Harian:<br> <strong>Rp. <?= $produk->harga_sewa ?></strong></p>
                        <p class="card-text"><?= $produk->deskripsi ?></p>
                        <a href="<?= site_url('user/sewa/') . $produk->id_motor ?>" class="btn btn-primary" <?= $produk->status == "Tersedia" ? "" : "hidden"; ?>>Sewa Sekarang</a>
                    </div>
                </div>
            </div>


        <?php endforeach ?>
        <?= $pager->links('pagerku', 'pagerkuh'); ?>
    </div>

</section>

<?= $this->endSection(); ?>