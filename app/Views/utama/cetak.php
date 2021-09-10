<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size:64px; color:'#dddddd' "><i>Cetak Laporan Keuangan</i></div>
    <div style="font-size:30px; color:'#dddddd' "><i>Total Pendapatan Dari Tanggal <?php echo $tglawal ?> sampai tanggal <?php echo $tglakhir ?></i></div>

    <hr>
    <p></p>

    <table cellpadding="6">
        <tr>
            <th><strong>No</strong></th>
            <th><strong>Nama Pelanggan</strong></th>
            <th><strong>Motor</strong></th>
            <th><strong>Status</strong></th>
            <th><strong>Harga</strong></th>
            <th><strong>Denda</strong></th>
            <th><strong>Keterangan</strong></th>
        </tr>
        <?php $nomer = 1;
        $harga = 0;
        $denda = 0;
        foreach ($result as $pengguna) :
        ?>
            <tr>
                <td><?php echo $nomer++ ?></td>
                <td><?= $pengguna->nama ?></td>
                <td><?= $pengguna->motor ?></td>
                <td><?= $pengguna->status ?></td>
                <td><?= $pengguna->harga ?></td>
                <td><?= $pengguna->denda ?></td>
                <td><?= $pengguna->keterangan ?></td>
                <td hidden><?php
                            $data = $harga += floatval($pengguna->harga);
                            $nilai = $denda += floatval($pengguna->denda);
                            ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <h4>Total Transaksi: <?= $nomer - 1 ?> </h4>
    <h4>Total Pendapatan:
        <?= $data ?>
    </h4>
    <h4>Total Denda:
        <?= $denda ?>
    </h4>
    <h4>Total Bersih: <?php echo $denda + $data;  ?></h4>
</body>

</html>