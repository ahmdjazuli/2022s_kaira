<?php require('head.php'); hal('Data Barang'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM barang ORDER BY idbarang DESC"); ?>
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
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Harga Modal</th>
                  <th>Harga Reseller</th>
                  <th>Harga Jual</th>
                  <th>Stok</th>
                  <th>Terjual</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['namabarang'] ?></td>  
                    <td><a target="_blank" href="../<?= $j['gambar'] ?>"><img src="../<?= $j['gambar'] ?>" width='60px'></a></td>         
                    <td><?= $j['kategori'] ?></td>           
                    <td>Rp. <?= number_format($j['modal'],0,',','.') ?> </td>          
                    <td>Rp. <?= number_format($j['harga_r'],0,',','.') ?> </td>          
                    <td>Rp. <?= number_format($j['harga'],0,',','.') ?> </td>          
                    <td><?= $j['stok'] ?></td>           
                    <td><?= $j['terjual'] ?></td>   
                    <td><?php
                        zeroOne("?action=ubah&idbarang=$j[idbarang]"); 
                        zeroTwo("$j[idbarang]","idbarang=$j[idbarang]");
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
<form action="action.php?tabel=barang&action=tambah" method="POST" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" list="option" class="form-control" required>
                <datalist id="option">
                  <option value="Baju Bayi">Baju Bayi</option>
                  <option value="Celana bayi">Celana Bayi</option>
                  <option value="Jilbab">Jilbab</option>
                  <option value="Tas">Tas</option>
                  <option value="Perlengkapan">Perlengkapan</option>
                  <option value="Makanan bayi">Makanan Bayi</option>
                  <option value="Aksesoris">Aksesoris</option>
                </datalist>
            </div>
            <div class="form-group">
                <label>Harga Modal</label>
                <input type="number" name="modal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Reseller</label>
                <input type="number" name="harga_r" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="textarea" name="deskripsi" rows="4" cols="50" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
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
$idbarang = $_GET['idbarang'];
$query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=barang&action=ubah&idbarang=<?=$idbarang?>" method="POST" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" value="<?= $j['namabarang'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" list="option" value="<?= $j['kategori'] ?>" class="form-control" required>
                <datalist id="option">
                  <option value="Baju Bayi">Baju Bayi</option>
                  <option value="Celana bayi">Celana Bayi</option>
                  <option value="Jilbab">Jilbab</option>
                  <option value="Tas">Tas</option>
                  <option value="Perlengkapan">Perlengkapan</option>
                  <option value="Makanan bayi">Makanan Bayi</option>
                  <option value="Aksesoris">Aksesoris</option>
                </datalist>
            </div>
            <div class="form-group">
                <label>Harga Modal</label>
                <input type="number" name="modal" value="<?= $j['modal'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Reseller</label>
                <input type="number" name="harga_r" value="<?= $j['harga_r'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga" value="<?= $j['harga'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <input type="hidden" name="fileLama" value="<?= $j['gambar'] ?>">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="textarea" name="deskripsi" rows="4" cols="50" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?= $j['deskripsi'] ?></textarea>
            </div>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break; } require('foot.php'); ?>