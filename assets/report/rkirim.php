<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli JOIN kurir ON kirim.idkurir = kurir.idkurir JOIN user ON beli.id = user.id WHERE MONTH(tglbeli) = '$bulan' AND YEAR(tglbeli) = '$tahun' ORDER BY idkirim DESC");
} beo(); ?>
<h3 class="text-center">Laporan Pengiriman</h3>
<p class="text-center">Periode bulan <b><?= bulan('1997'.$bulan.'07'); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu (WITA)</th>
        <th>Pembeli</th>
        <th>Tujuan</th>
        <th>Kurir</th>
        <th>Penerima</th>
        <th>Keterangan</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td width="220px"><?= htw($j['tglbeli']) ?></td>
      <td><?= $j['nama'] ?></td>
      <td><?= $j['alamat'] ?></td>           
      <td><?= $j['namakurir'] ?></td>        
      <td><?= $j['penerima'] ?></td>        
      <td><?= $j['ket'] ?></td>        
      <td><?php 
        if($j['statuskirim'] == 'Selesai' AND $j['foto']!=''){
          ?> <a target="_blank" href="../img/<?= $j[foto] ?>"><i class='fas fa-check'></i></a><?php
        }else if($j['statuskirim'] == 'Ditolak'){
          echo "<i class='fas fa-times'></i>";
        }else{
          echo "<i class='fas fa-clock'></i>";
        }  ?></td>            
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>