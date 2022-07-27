<?php require('head.php'); 
?><section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12" style="padding-top: 0px;">
         <div class="mu-page-breadcrumb-area">
           <h2>Ulasan</h2>
         </div>
       </div>
     </div>
   </div>
 </section>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM ulasan JOIN barang ON ulasan.idbarang = barang.idbarang WHERE id = '$memori[id]' ORDER BY waktu DESC"); ?>
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
                    <th class="text-center">Waktu (WITA)</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Ulasan</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; while($j = mysqli_fetch_array($query)){ ?>
                      <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= htw($j['waktu']) ?></td>          
                      <td><?= $j['namabarang'] ?></td>           
                      <td><?= $j['kategori'] ?></td>          
                      <td><?= $j['ulasannya'] ?></td>           
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
<?php break; case "ubah": 
$query = mysqli_query($kon, "SELECT * FROM `beli` JOIN user ON beli.id = user.id WHERE idbeli = '$_REQUEST[idbeli]'");
$query1 = mysqli_query($kon, "SELECT * FROM `beliproduk` JOIN barang ON beliproduk.idbarang = barang.idbarang WHERE idbeliproduk = '$_REQUEST[idbeliproduk]'");
$j = mysqli_fetch_array($query); $jeki = mysqli_fetch_array($query1);  ?>
 <section id="mu-course-content" style="padding-top: 0;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
<form action="view/action.php?tabel=ulasan&action=tambah" method="POST" autocomplete="off">
    <br>
  <div class="col-md-6">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $memori['nama']; ?>" class="form-control" readonly>
        <input type="hidden" name="id" value="<?= $memori['id']; ?>" class="form-control" required>
        <input type="hidden" name="idbarang" value="<?= $jeki['idbarang']; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Barang yang dibeli</label>
        <input type="text" value="<?= $jeki['namabarang']; ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" value="<?= $jeki['kategori']; ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" value="<?= $jeki['jumlah']; ?>" class="form-control" readonly>
    </div>
  </div>  
  <div class="col-md-6">
    <div class="form-group">
        <label>Foto</label><br>
        <img src="<?= $jeki['gambar'] ?>" width="118px">
    </div>
    <div class="form-group">
        <label>Ulasannya</label>
        <textarea class="form-control" name="ulasannya" required></textarea>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn" style="background: #f69bac;">Simpan</button>
    </div>
  </div>                                 
</form>
                  </div>
                </div>
<!-- end contact content -->
       </div>
     </div>
   </div>
 </div>
</section>
<?php break; } ?>
<?php require('foot.php') ?>