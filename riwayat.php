<?php require('head.php'); halDepan("Riwayat Transaksi"); $idbeli = $_GET['idbeli'];
  $beliproduk = mysqli_query($kon, "SELECT * FROM beliproduk INNER JOIN barang ON beliproduk.idbarang = barang.idbarang WHERE idbeli = '$idbeli' ORDER BY namabarang ASC");
  $beli = mysqli_query($kon, "SELECT * FROM beli WHERE idbeli = '$idbeli'");
  $row = mysqli_fetch_array($beli); ?>
<section id="mu-contact" style="padding: 0;">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="mu-contact-area">
        <!-- start contact content -->
        <div class="mu-contact-content">           
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead style="background-color: #f69bac;">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal (WITA)</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Metode</th>
                    <th class="text-center">Tujuan</th>
                    <th class="text-center">Bukti Pembayaran</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  $query = mysqli_query($kon, "SELECT * FROM `beli` JOIN ongkir ON beli.idongkir = ongkir.idongkir JOIN user ON beli.id = user.id WHERE username = '$_SESSION[username]' ORDER BY idbeli DESC");
                  while($j = mysqli_fetch_array($query)){ ?>
                      <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= htw($j['tglbeli']) ?></td>          
                      <td><button class="btn btn-danger" onclick="window.location='riwayat?idbeli=<?= $j[idbeli] ?>'"><?= $j['nama'] ?></button></td>
                      <td><?= $j['namakota'] != '' ? "Online" : "COD"; ?></td>
                      <td><?= $j['alamat'] ?></td>           
                      <td><a target="_blank" href="<?= $j['bukti'] ?>"><img src="<?= $j['bukti'] ?>" width='60px'></a></td>        
                      <td>Rp. <?= number_format($j['total'],0,',','.') ?> </td>
                      <td><?php 
                        if($j['status'] == 'Diterima'){
                          ?><i class='fa fa-check'></i> Transaksi Sah<?php
                        }else if($j['status'] == 'Ditolak'){
                          echo "<i class='fa fa-times'></i> Transaksi Gagal";
                        }else if($j['status'] == 'Menunggu'){
                          echo "<i class='fa fa-clock-o'></i> Menunggu Persetujuan";
                        }  ?></td>
                      <td>
                        <button class="btn" type="button" style="background: #f69bac;"><a href="assets/report/rnota.php?idbeli=<?= $j['idbeli'] ?>" target="_blank" class="text-white">Nota</a></button>
                      </td>           
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end contact content -->
       </div>
     </div>
   </div>
 </div>
</section>
<?php if(mysqli_num_rows($beliproduk)> 0){ ?>
<section id="mu-contact" style="padding: 0;">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="mu-contact-area">
        <h1 class="text-center">Detail Transaksi</h1>
        <div class="mu-contact-content">           
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead style="background-color: #333333; color: white;">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga (Rp)</th>
                    <th class="text-center">Sub Harga (Rp)</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1;$totalbelanja = 0;
                    while($j = mysqli_fetch_array($beliproduk)){?>
                      <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= $j['namabarang'] ?></td>           
                      <td><?= $j['kategori'] ?></td>         
                      <td><?= $j['jumlah'] ?></td>           
                      <td><?= number_format($j['harga'],0,',','.') ?> </td>
                      <td><?= number_format($j['subharga'],0,',','.') ?> </td>          
                <?php $totalbelanja+=$j['subharga']; } ?>
                <tr>
                  <tr>
                    <td class="text-right" colspan="5">Biaya Ongkir</td>
                    <td class="text-center"><?= number_format($row['tarifnya'],0,',','.') ?></td>
                  </tr>
                  <td class="text-right" style="font-weight: bold; background-color: #f1f1f1;" colspan="5">Total Pembayaran</td>
                  <td class="text-center" style="font-weight: bold; background-color: #f1f1f1;"><?= number_format($totalbelanja+$row['tarifnya'],0,',','.') ?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end contact content -->
       </div>
     </div>
   </div>
 </div>
</section>
 <?php } ?>
<?php require('foot.php') ?>
