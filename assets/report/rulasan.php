<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM ulasan JOIN barang ON ulasan.idbarang = barang.idbarang JOIN user ON ulasan.id = user.id WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY waktu DESC");
} beo(); ?>
<h3 class="text-center">Laporan Ulasan</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu (WITA)</th>
        <th>Pembeli</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Ulasan</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['waktu']) ?></td>
      <td><?= $j['nama'] ?></td>           
      <td><?= $j['namabarang'] ?></td>
      <td><?= $j['kategori'] ?></td>        
      <td><?= $j['ulasannya'] ?></td>            
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>