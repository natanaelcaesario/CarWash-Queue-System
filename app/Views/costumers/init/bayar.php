<?php echo view('navbar') ?>

<?php
$awal = $sewa->tglsewa;
$akhir = $sewa->tglkembali;
$dif = abs(strtotime($awal) - strtotime($akhir));
$hari = floor($dif / 82000);
$total = $hari * $sewa->harga;
?>
<div class="container mt-5 ">

    <div class="row">
        <div class="col-lg-7">
            <img class="card-img-top" src="<?= base_url('uploads/gambar_produk/' . $motor->gambar_motor) ?>" alt="Card image cap">
        </div>
        <div class="col-lg-5" id="content">
            <p class="text-center"> Lakukan Pembayaran Sebelum</p>
            <p id="CountDown" data-date="<?php echo $sewa->deadline ?>"></p>
            <p>Rincian Transaksi</p>

            <ul>
                <li>Nama : <?= $sewa->nama ?></li>
                <li>Motor : <?= $sewa->motor ?></li>
                <li>Tanggal Sewa : <?= $sewa->tglsewa ?></li>
                <li>Tanggal Pengembalian : <?= $sewa->tglkembali ?></li>
                <li>Kode Booking : <?= $sewa->kode_booking ?></li>
                <li>Plat Motor : <?= $sewa->plat_motor ?></li>
                <li>Harga : <?= $sewa->harga ?></li>
            </ul>

            <input type="text" id="id_sewa" value="<?= $sewa->id_sewa ?>" hidden>
            <button id="pay-button" class="btn btn-primary">Bayar Transaksi Anda Sekarang</button>


        </div>

    </div>

</div>


<?php echo view('footer.php') ?>

<script src="<?= base_url('admintemplate/js/TimeCircles.js') ?>">
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('<?= $snapToken ?>', {
            // Optional
            onSuccess: function(result) {
                var id_sewa = $("#id_sewa").val();

                $.ajax({
                    url: '<?= current_url() ?>',
                    type: 'POST',
                    'data': {
                        id_sewa: id_sewa,
                    },
                    dataType: "json",

                });
                alert("Transaksi anda berhasil silahkan menuju lokasi penyewaan");
                window.location = "<?= site_url('user/transaksi') ?>";
                /* You may add your own js here, this is just example */
                console.log(result);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                console.log(result);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                console.log(result);
            }
        });
    };
</script>
<script>
    $("#mainNav").attr("hidden", true);
    $("#footer").attr("hidden", true);
    $("#CountDown").TimeCircles();
</script>