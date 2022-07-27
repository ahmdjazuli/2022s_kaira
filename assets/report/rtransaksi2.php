<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM `beli` LEFT JOIN ongkir ON beli.idongkir = ongkir.idongkir INNER JOIN user ON beli.id = user.id WHERE MONTH(tglbeli) = '$bulan' AND YEAR(tglbeli) = '$tahun' AND level = 'pelanggan' ORDER BY tglbeli DESC");
} beo(); ?>
<h3 class="text-center">Laporan Transaksi Pelanggan</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal (WITA)</th>
        <th>Pelanggan</th>
        <th>Metode</th>
        <th>Tujuan</th>
        <th>Bukti Pembayaran</th>
        <th>Total (Rp)</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['tglbeli']) ?></td>      
      <td><?= $j['nama'] ?></td>
      <td><?= $j['namakota'] != '' ? "Online" : "COD"; ?></td>
      <td><?= $j['alamat'] ?></td>
      <td><img src="../../<?= $j['bukti'] ?>" width='60px'></td>     
      <td><?= number_format($j['total'],0,',','.') ?> </td>
      <td><?php 
        if($j['status'] == 'Diterima'){
          echo "<i class='fas fa-check'></i>";
        }else if($j['status'] == 'Ditolak'){
          echo "<i class='fas fa-times'></i>";
        }else if($j['status'] == 'Menunggu'){
          echo "<i class='fas fa-clock'></i>";
        } ?></td>  
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>