<?php require('head.php'); hal('Transaksi Pelanggan'); error_reporting(0); 
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM `beli` LEFT JOIN ongkir ON beli.idongkir = ongkir.idongkir INNER JOIN user ON beli.id = user.id WHERE level = 'pelanggan' ORDER BY idbeli DESC"); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Tanggal (WITA)</th>
                  <th>Pelanggan</th>
                  <th>Metode</th>
                  <th>Tujuan</th>
                  <th>Bukti Pembayaran</th>
                  <th>Total (Rp)</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htw($j['tglbeli']) ?></td>      
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['namakota'] != '' ? "Online" : "COD"; ?></td>
                    <td><?= $j['alamat'] ?></td>
                    <td><a target="_blank" href="../<?= $j['bukti'] ?>"><img src="../<?= $j['bukti'] ?>" width='60px'></a></td>        
                    <td><?= number_format($j['total'],0,',','.') ?> </td>
                    <td><?php 
                      if($j['status'] == 'Diterima'){
                        if($j['namakota'] != ''){ ?> 
                          <a class="text-pink" href="kirim?action=tambah&idbeli=<?= $j[idbeli] ?>"><i class='fas fa-check'></i> Transaksi Sah, Barang siap dikirim</a>
                        <?php }else{
                          echo "<i class='fas fa-check'></i> Transaksi Sah, Barang sudah dikirim";
                        }
                      }else if($j['status'] == 'Ditolak'){
                        echo "<i class='fas fa-times'></i> Transaksi Gagal";
                      }else if($j['status'] == 'Menunggu'){
                        echo "<i class='fas fa-clock'></i> Menunggu Persetujuan";
                      } ?></td>           
                    <td><?php 
                        jump("?action=detail&idbeli=$j[idbeli]");
                        echo $j['namakota'] ? zeroOne("?action=ubah&idbeli=$j[idbeli]") : ''; 
                        zeroTwo("$j[idbeli]","idbeli=$j[idbeli]&j=2");
                    ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php break;
case "tambah": ?>
<section class="content">
<form action="action.php?tabel=transaksi2" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="card card-outline card-dark">
          <div class="card-header">
            <h3 class="card-title">Petunjuk</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
           <button class="btn bg-pink"><i class="fas fa-plus"></i></button> untuk menambahkan daftar transaksi. <br><br>
           <button class="btn btn-dark"><i class="far fa-save text-dark"></i></button> untuk menyimpan transaksi.
          </div>
        </div>
        <div class="card card-outline card-pink">
          <div class="card-body bg-dark">
            <form action="action.php?tabel=transaksi2" method="POST">
              <div class="form-group">
                <label>Nama Barang</label>
                <select name="idbarang" class="form-control" onchange='ubah(this.value)' required>
                  <option value="">-Pilih-</option>
                <?php
                  $q = mysqli_query($kon, "SELECT * FROM barang ORDER BY namabarang ASC");
                  $a = "var harga_r = new Array();\n;";
                  $b = "var stok = new Array();\n;";
                    while($j = mysqli_fetch_array($q)) {
                      echo "<option value='$j[idbarang]'>$j[namabarang]</option>";
                      $a .= "harga_r['" . $j['idbarang'] . "'] = {harga_r:'" . addslashes($j['harga_r'])."'};\n";
                      $b .= "stok['" . $j['idbarang'] . "'] = {stok:'" . addslashes($j['stok'])."'};\n";
                    } 
                  ?>
              </select>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga_r" id="harga_r" readonly>
              </div>
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="jumlahku" id="stok" class="form-control" required>
              </div>
              <button type="submit" name="tambah" class="btn bg-pink" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Bersihkan Daftar Belanja"><a href="transaksi2_bersih.php" style="color: white; text-decoration: none"><i class="fas fa-sync-alt"></i></a></button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-sm-12 col-md-8">
        <div class="card">
          <div class="card-body">
            <form role="form" action="action.php?tabel=transaksi2&action=tambah" method="POST" autocomplete="off">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="success table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Harga</th>
                                <th><i class="fa fa-toggle-on"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; $totalbelanja = 0; foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) :
                            $barang = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'"); 
                            $data = mysqli_fetch_assoc($barang); 
                            $subharga = $data['harga_r']*$jumlah;?>
                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td><?= $data['namabarang'] ?></td>
                                <td><?= $data['kategori'] ?></td>
                                <td><?= number_format($data['harga_r'],0,',','.')  ?></td>
                                <td><?= $jumlah ?></td>
                                <td><?= number_format($subharga,0,',','.')  ?></td>
                                <td> <a href="?action=hapus&idbarang=<?php echo $data['idbarang'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fas fa-trash"></i></a> </td>
                            </tr>
                        <?php $totalbelanja+=$subharga; ?>
                        <?php endforeach ?>  
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5">Total yang harus dibayarkan : </th>
                            <th colspan="2">
                            <input type="hidden" name="total" value="<?= $totalbelanja ?>">
                            <span>Rp. <?= number_format($totalbelanja,0,',','.') ?></span>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input type="text" name="id" list="option" class="form-control" required>
                  <datalist id="option">
                    <?php $query = mysqli_query($kon, "SELECT * FROM user WHERE level='pelanggan' ORDER BY nama ASC");
                      while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                      <?php } ?>
                  </datalist>
                </div>
            </div>
            <?php akuSukaDia(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break;
case "ubah":
$idbeli = $_GET['idbeli'];
$query = mysqli_query($kon, "SELECT * FROM `beli` LEFT JOIN ongkir ON beli.idongkir = ongkir.idongkir INNER JOIN user ON beli.id = user.id WHERE idbeli = '$idbeli'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=transaksi2&action=ubah&idbeli=<?=$idbeli?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                  <option value="<?= $j['status'] ?>"><?= $j['status'] ?></option>
                  <option value="Diterima">Diterima</option>
                  <option value="Ditolak">Ditolak</option>
                </select>
            </div>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break;
case "detail":
$idbeli = $_GET['idbeli'];
$query = mysqli_query($kon, "SELECT * FROM beliproduk JOIN barang ON beliproduk.idbarang = barang.idbarang WHERE idbeli = '$idbeli'"); ?>
<section class="content">
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-pink card-outline">
          <h3 class="card-header">Detail Transaksi</h3>
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="table-dark">
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Sub Harga</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['namanya'] ?></td>  
                    <td><a target="_blank" href="../<?= $j['gambar'] ?>"><img src="../<?= $j['gambar'] ?>" width='60px'></a></td>         
                    <td><?= $j['kategori'] ?></td>       
                    <td><?= $j['jumlah'] ?></td>           
                    <td>Rp. <?= number_format($j['harganya'],0,',','.') ?> </td> 
                    <td>Rp. <?= number_format($j['subharga'],0,',','.') ?> </td> 
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php break;
case "hapus": session_start(); 
  $idbarang = $_GET['idbarang']; unset($_SESSION['keranjang'][$idbarang]);
  ?><script> window.location = 'transaksi2?action=tambah';</script><?php
?>
<?php break; } require('foot.php'); ?>
<script> <?php echo $a.$b; ?>
  function ubah(id){  
    document.getElementById('harga_r').value = harga_r[id].harga_r; 
    document.getElementById('stok').max = stok[id].stok; 
  };
</script> 