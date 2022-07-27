<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM masuk JOIN barang ON masuk.idbarang = barang.idbarang WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl DESC");
} beo(); ?>
<h3 class="text-center">Laporan Pembelian Barang</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Distributor</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Catatan</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= ht($j['tgl']); ?></td>     
      <td><?= $j['namabarang'] ?></td>
      <td><?= $j['sumber'] ?></td>
      <td>Rp. <?= number_format($j['hargamasuk'],0,',','.') ?> </td>
      <td><?= $j['jumlah'] ?></td>
      <td><?= $j['catatan'] ?></td>   
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>