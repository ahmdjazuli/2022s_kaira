<?php require('head.php'); hal('Pembelian Barang');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM masuk JOIN barang ON masuk.idbarang = barang.idbarang ORDER BY tgl DESC"); ?>
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
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Distributor</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Catatan</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= ht($j['tgl']); ?></td>     
                    <td><?= $j['namabarang'] ?></td>
                    <td><?= $j['sumber'] ?></td>
                    <td>Rp. <?= number_format($j['hargamasuk'],0,',','.') ?> </td>
                    <td><?= $j['jumlah'] ?></td>
                    <td><?= $j['catatan'] ?></td>          
                    <td><?php 
                        zeroOne("?action=ubah&idmasuk=$j[idmasuk]"); 
                        zeroTwo("$j[idmasuk]","idmasuk=$j[idmasuk]");
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
<form action="action.php?tabel=masuk&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="idbarang" list="option" class="form-control" required onchange='ubah(this.value)'>
                <datalist id="option">
                  <?php $query = mysqli_query($kon, "SELECT * FROM barang ORDER BY namabarang ASC");
                  $a    = "var hargamasuk = new Array();\n;";
                    while ($j = mysqli_fetch_array($query)) {
                      echo "<option value='$j[idbarang]'>$j[namabarang]</option>";
                      $a .= "hargamasuk['" . $j['idbarang'] . "'] = {hargamasuk:'" . addslashes($j['modal'])."'};\n";
                  } ?>
                </datalist>
            </div>
            <div class="form-group">
                <label>Distributor</label>
                <input type="text" name="sumber" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control" id="hargamasuk" name="hargamasuk" readonly name="hargamasuk">
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" class="form-control" name="jumlah" required>
            </div>
            <div class="form-group">
              <label>Catatan</label>
              <textarea class="form-control" name="catatan"></textarea>
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
$idmasuk = $_GET['idmasuk'];
$query = mysqli_query($kon, "SELECT * FROM masuk JOIN barang ON masuk.idbarang = barang.idbarang WHERE idmasuk = '$idmasuk'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=masuk&action=ubah&idmasuk=<?=$idmasuk?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" value="<?= $j['namabarang'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Distributor</label>
                <input type="text" name="sumber" value="<?= $j['sumber'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" class="form-control" value="<?= $j['jumlah'] ?>" name="jumlah" required>
            </div>
            <div class="form-group">
              <label>Catatan</label>
              <textarea class="form-control" name="catatan"><?= $j['catatan'] ?></textarea>
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
<script>   
  <?php echo $a; ?>
  function ubah(id){  
      document.getElementById('hargamasuk').value = hargamasuk[id].hargamasuk; 
  };   
</script> 