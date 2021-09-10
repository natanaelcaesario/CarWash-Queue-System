<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<header class="header bg-primary">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold" style="margin-top:100px">Form Antrian Steam Motor Online</h1>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5"> Sekarang antri steam bisa online juga loh.Ambil antrian anda sekarang!
                </p>
            </div>
        </div>
    </div>
</header>

<section class="page-section " id="product">

    <div class="contanier">
        <div class="row justify-content-center p-4">
            <div class="col-lg-6">
                <img src="<?= base_url('img/queue.svg') ?>" alt="" width="80%">
            </div>
            <div class="col-lg-4">
                <form action="<?= current_url() ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" value="<?= session()->get()['nama']; ?>" required>
                        <input type="date" class="form-control" value="<?= date("Y-m-d") ?>" required hidden>
                    </div>
                    <button class="btn btn-primary">Dapatkan Antrian</button>
                </form>
            </div>
        </div>
    </div>

</section>


<?= $this->endSection(); ?>