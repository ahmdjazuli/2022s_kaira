<?php require('head.php'); halDepan("Cek Pengiriman"); $idbeli = $_GET['idbeli'];
  $beliproduk = mysqli_query($kon, "SELECT * FROM beliproduk INNER JOIN barang ON beliproduk.idbarang = barang.idbarang WHERE idbeli = '$idbeli' ORDER BY namabarang ASC"); ?>
<section id="mu-contact" style="padding: 0;">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="mu-contact-area">
        <div class="mu-contact-content">           
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead style="background-color: #f69bac;">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal (WITA)</th>
                    <th class="text-center">Pembeli</th>
                    <th class="text-center">Tujuan</th>
                    <th class="text-center">Kurir</th>
                    <th class="text-center">Penerima</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  $query = mysqli_query($kon, "SELECT * FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli JOIN kurir ON kirim.idkurir = kurir.idkurir JOIN user ON beli.id = user.id WHERE user.username = '$memori[username]'");
                  while($j = mysqli_fetch_array($query)){ ?>
                    <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= htw($j['tglbeli']) ?></td>          
                      <td><button class="btn btn-danger" onclick="window.location='pengiriman?idbeli=<?= $j[idbeli] ?>'"><?= $j['nama'] ?></button></td>
                      <td><?= $j['alamat'] ?></td>           
                      <td><?= $j['namakurir'] ?></td>        
                      <td><?= $j['penerima'] ?></td>        
                      <td><?= $j['ket'] ?></td>
                      <td><?php 
                      if($j['statuskirim'] == 'Selesai' AND $j['foto']!=''){ ?>
                         <a target="_blank" href="<?= $j['foto'] ?>"><i class='fas fa-check'></i> Barang sudah diterima</a>
                      <?php }else if($j['statuskirim'] == 'Ditolak'){
                        echo "<i class='fas fa-times'></i> Pengiriman Gagal";
                      }else{
                        echo "<i class='fas fa-clock'></i> Menunggu Persetujuan";
                      }  ?></td> 
                    </tr>         
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
                    <?= $memori['level'] =='pelanggan' ? "<th></th>" : ''; ?>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    while($j = mysqli_fetch_array($beliproduk)){?>
                      <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= $j['namabarang'] ?></td>           
                      <td><?= $j['kategori'] ?></td>         
                      <td><?= $j['jumlah'] ?></td>           
                      <td><?= number_format($j['harga'],0,',','.') ?> </td>
                      <td><?= number_format($j['subharga'],0,',','.') ?> </td> 
                      <?php if($memori['level'] =='pelanggan'){ ?>
                        <td><button class="btn" style="background: #f69bac;" onclick="window.location='ulasan?action=ubah&idbeli=<?= $j[idbeli] ?>&idbeliproduk=<?= $j[idbeliproduk] ?>'">Berikan Ulasan</button>
                        <button class="btn" style="color: white; background: #333333;" onclick="window.location='retur?action=ubah&idbeli=<?= $j[idbeli] ?>&idbeliproduk=<?= $j[idbeliproduk] ?>'">Ajukan Pengembalian Barang</button></td>         
                      <?php } ?>
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
 <?php } ?>
<?php require('foot.php') ?>
