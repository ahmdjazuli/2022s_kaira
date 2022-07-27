<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM retur JOIN barang ON retur.idbarang = barang.idbarang JOIN user ON retur.id = user.id WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY waktu DESC");
} beo(); ?>
<h3 class="text-center">Laporan Retur</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu (WITA)</th>
        <th>Pembeli</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Foto</th>
        <th>Alasan</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['waktu']) ?></td>
      <td><?= $j['nama'] ?></td>           
      <td><?= $j['namabarang'] ?></td>
      <td><?= $j['kategori'] ?></td>    
      <td><img src="../../<?= $j['file'] ?>" width='60px'></td>              
      <td><?= $j['alasan'] ?></td>           
      <td><?php 
        if($j['status'] == 'Diterima'){
          ?><i class='fa fa-check'></i> Retur Disetujui<?php
        }else if($j['status'] == 'Ditolak'){
          echo "<i class='fa fa-times'></i> Retur Gagal";
        }else if($j['status'] == 'Menunggu'){
          echo "<i class='fa fa-clock-o'></i> Menunggu Persetujuan";
        }  ?></td> 
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>