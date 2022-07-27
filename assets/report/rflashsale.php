<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM flashsale JOIN barang ON flashsale.idbarang = barang.idbarang WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY waktu DESC");
} beo(); ?>
<h3 class="text-center">Laporan Flashsale</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu (WITA)</th>
        <th>Nama Barang</th>
        <th>Harga Awal</th>
        <th>Diskon</th>
        <th>Hasil</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td width="220px"><?= htw($j['waktu']) ?></td>
      <td><?= $j['namabarang'] ?></td>
      <td>Rp. <?= number_format($j['hargaawal'],0,',','.') ?> </td>
      <td><?= $j['diskon'] ?>%</td>
      <td>Rp. <?= number_format($j['hasil'],0,',','.') ?> </td> 
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>