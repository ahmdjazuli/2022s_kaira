<?php require('head.php'); hel('Pengiriman');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli JOIN kurir ON kirim.idkurir = kurir.idkurir JOIN user ON beli.id = user.id ORDER BY tglbeli DESC"); ?>
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
                  <th>Waktu (WITA)</th>
                  <th>Pembeli</th>
                  <th>Tujuan</th>
                  <th>Kurir</th>
                  <th>Penerima</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td width="220px"><?= htw($j['tglbeli']) ?></td>
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['alamat'] ?></td>           
                    <td><?= $j['namakurir'] ?></td>        
                    <td><?= $j['penerima'] ?></td>        
                    <td><?= $j['ket'] ?></td>        
                    <td><?php 
                      if($j['statuskirim'] == 'Selesai' AND $j['foto']!=''){
                        ?> <a target="_blank" class="text-pink" href="../<?= $j['foto'] ?>"><i class='fas fa-check'></i> Barang sudah Diterima</a><?php
                      }else if($j['statuskirim'] == 'Ditolak'){
                        echo "<i class='fas fa-times'></i>";
                      }else{
                        echo "<i class='fas fa-clock'></i> Proses Pengiriman";
                      }  ?></td>           
                    <td><?php 
                        jump("?action=detail&idbeli=$j[idbeli]"); 
                        zeroOne("?action=ubah&idkirim=$j[idkirim]"); 
                        $_SESSION['level'] == 'admin' ? zeroTwo("$j[idkirim]","idkirim=$j[idkirim]") : '';
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
case "tambah": 
$idbeli = $_GET['idbeli'];
$query = mysqli_query($kon, "SELECT * FROM beli JOIN user ON beli.id = user.id WHERE idbeli = '$idbeli'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=kirim&action=tambah" method="POST" autocomplete="off">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>No. Transaksi</label>
              <input type="number" class="form-control" name="idbeli" value="<?= $idbeli ?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama Pembeli</label>
              <input type="text" class="form-control" value="<?= $j['nama'] ?>" readonly>
            </div>
            <div class="form-group">
              <label>Tujuan Pengiriman</label>
              <textarea class="form-control" readonly><?= $j['alamat'] ?></textarea>
            </div>
            <div class="form-group">
              <label>Pilih Kurir</label>
              <select name="idkurir" class="form-control" required>
                <option value="">-</option>
              <?php
                $ahay = mysqli_query($kon, "SELECT * FROM kurir ORDER BY namakurir ASC");
                  while($baris = mysqli_fetch_array($ahay)) {
                    echo "<option value='$baris[idkurir]'>$baris[namakurir] ($baris[layanan])</option>";
                  } 
                ?>
            </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="ket"></textarea>
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
case "ubah":
$idkirim = $_GET['idkirim'];
$query = mysqli_query($kon, "SELECT * FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli JOIN kurir ON kirim.idkurir = kurir.idkurir JOIN user ON beli.id = user.id WHERE idkirim = '$idkirim'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=kirim&action=ubah&idkirim=<?=$idkirim?>" method="POST" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>No. Transaksi</label>
              <input type="number" class="form-control" name="idbeli" value="<?= $j['idbeli'] ?>" readonly>
              <input type="hidden" name="idkirim" value="<?= $j['idkirim'] ?>">
            </div>
            <div class="form-group">
              <label>Nama Pembeli</label>
              <input type="text" class="form-control" value="<?= $j['nama'] ?>" readonly>
            </div>
            <?php if($_SESSION['level'] == 'admin'){ ?>
            <div class="form-group">
              <label>Pilih Kurir</label>
              <select name="idkurir" class="form-control" required>
                <option value="<?= $j['idkurir'] ?>"><?= $j['namakurir'] ?></option>
              <?php
                $kikoenaktau = mysqli_query($kon, "SELECT * FROM kurir ORDER BY namakurir ASC");
                  while($ju = mysqli_fetch_array($kikoenaktau)) {
                    echo "<option value='$ju[idkurir]'>$ju[namakurir]</option>";
                  } 
                ?>
            </select>
            </div>
            <?php }else{ ?>
            <div class="form-group">
              <label>Penerima</label>
              <input type="text" class="form-control" name="penerima" value="<?= $j['penerima'] ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <input type="hidden" name="fileLama" value="<?= $j['foto'] ?>">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" name="ket" value="<?= $j['ket'] ?>" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="statuskirim" class="form-control">
                <?php 
                  if($j['statuskirim']==""){
                    ?> <option value="Menunggu">Menunggu</option> <?php
                    ?> <option value="Selesai">Selesai</option> <?php
                  }else if($j['statuskirim']=="Selesai"){
                    ?> <option value="Selesai">Selesai</option> <?php
                    ?> <option value="Menunggu">Menunggu</option> <?php
                  }
                ?>
              </select>
            </div>
            <?php } ?>
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
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Barang</th>
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
                    <td><?= $j['jumlah'] ?></td>           
                    <td>Rp. <?= number_format($j['harganya'],0,',','.') ?> </td>
                    <td>Rp. <?= number_format($j['subharga'],0,',','.') ?> </td>
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
<?php break; } require('foot.php'); ?>