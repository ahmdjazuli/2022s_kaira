<?php require('../../kon.php'); require('../../view/config.php');
$tahun     = $_REQUEST['tahun'];
if ($tahun) {
  $query = mysqli_query($kon, "SELECT *,MONTH(tglbeli) as bulan, YEAR(tglbeli) as tahun FROM `beli` LEFT JOIN ongkir ON beli.idongkir = ongkir.idongkir INNER JOIN user ON beli.id = user.id WHERE YEAR(tglbeli) = '$tahun' GROUP BY bulan ORDER BY tglbeli DESC");
} beo(); ?>
<h3 class="text-center">Laporan Pendapatan</h3>
<p class="text-center">Periode tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Periode</th>
        <th>Transaksi Pelanggan</th>
        <th>Transaksi Reseller</th>
        <th>Laba Kotor</th>
        <th>Pembelian Barang</th>
        <th>Barang Rusak</th>
        <th>Pengeluaran Lainnya</th>
        <th>Laba Bersih</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : 
    $bulan = $j['bulan']; $tahun = $j['tahun'];
    $woy = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM beli INNER JOIN user ON beli.id = user.id WHERE MONTH(tglbeli) = '$bulan' AND YEAR(tglbeli) = '$tahun' AND level = 'pelanggan'"));
    $woy1 = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM beli INNER JOIN user ON beli.id = user.id WHERE MONTH(tglbeli) = '$bulan' AND YEAR(tglbeli) = '$tahun' AND level = 'reseller'"));
    $woy2 = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(hargamasuk*jumlah) as total FROM masuk WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
    $woy3 = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM pengeluaran WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
    $woy4 = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(hargarusak*jumlah) as total FROM rusak WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'")); ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?php 
        if($j['bulan'] == 6){echo 'Juni'.' - '. $j['tahun']; }
        else if($j['bulan'] == 7){echo 'Juli'.' - '. $j['tahun']; }
        else if($j['bulan'] == 8){echo 'Agustus'.' - '. $j['tahun']; }
        else if($j['bulan'] == 9){echo 'September'.' - '. $j['tahun']; }
        else if($j['bulan'] == 10){echo 'Oktober'.' - '. $j['tahun']; }
        else if($j['bulan'] == 11){echo 'November'.' - '. $j['tahun']; }
        else if($j['bulan'] == 12){echo 'Desember'.' - '. $j['tahun']; }
        else if($j['bulan'] == 1){echo 'Januari'.' - '. $j['tahun']; }
        else if($j['bulan'] == 2){echo 'Februari'.' - '. $j['tahun']; }
        else if($j['bulan'] == 3){echo 'Maret'.' - '. $j['tahun']; }
        else if($j['bulan'] == 4){echo 'April'.' - '. $j['tahun']; }
        else if($j['bulan'] == 5){echo 'Mei'.' - '. $j['tahun']; }
      ?></td>
      <td>Rp. <?= number_format($woy['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy1['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy['total']+$woy1['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy2['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy4['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy3['total'],0,'.','.') ?></td>
      <td>Rp. <?= number_format($woy['total']+$woy1['total']-$woy2['total']-$woy3['total']-$woy4['total'],0,'.','.') ?></td>       
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>