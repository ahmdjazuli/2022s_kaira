<?php require('head.php'); hal('Flash Sale');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM flashsale JOIN barang ON flashsale.idbarang = barang.idbarang ORDER BY waktu DESC"); ?>
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
                  <th>Nama Barang</th>
                  <th>Harga Awal</th>
                  <th>Diskon</th>
                  <th>Hasil</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td width="220px"><?= htw($j['waktu']) ?></td>
                    <td><?= $j['namabarang'] ?></td>
                    <td>Rp. <?= number_format($j['hargaawal'],0,',','.') ?> </td>
                    <td><?= $j['diskon'] ?>%</td>
                    <td>Rp. <?= number_format($j['hasil'],0,',','.') ?> </td>          
                    <td><?php 
                        zeroOne("?action=ubah&idflash=$j[idflash]"); 
                        zeroTwo("$j[idflash]","idflash=$j[idflash]");
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
<form action="action.php?tabel=flashsale&action=tambah" method="POST" autocomplete="off">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Waktu (WITA)</label>
                <input type="datetime-local" name="waktu" value="<?= date('Y-m-d\TH:i') ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <select name="idbarang" class="form-control" onchange='ubah(this.value)' required>
                <option value="">-Pilih-</option>
              <?php
                $q = mysqli_query($kon, "SELECT * FROM barang ORDER BY namabarang ASC");
                $b = "var harga = new Array();\n;";
                  while($j = mysqli_fetch_array($q)) {
                    echo "<option value='$j[idbarang]'>$j[namabarang]</option>";
                    $b .= "harga['" . $j['idbarang'] . "'] = {harga:'" . addslashes($j['harga'])."'};\n";
                  } 
                ?>
            </select>
            </div>
            <div class="form-group">
                <label>Harga Awal</label>
                <input type="number" class="form-control" id="harga" name="harga" readonly>
            </div>
            <div class="form-group">
              <label>Diskon (Persen)</label>
              <input type="number" class="form-control" placeholder="Ex : 15" name="diskon" max="50" required>
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
$idflash = $_GET['idflash'];
$query = mysqli_query($kon, "SELECT * FROM flashsale WHERE idflash = '$idflash'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=flashsale&action=ubah&idflash=<?=$idflash?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Waktu (WITA)</label>
                <input type="datetime-local" name="waktu" value="<?= date('Y-m-d\TH:i',strtotime($j['waktu'])) ?>" class="form-control" required>
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
  <?php echo $b; ?>
  function ubah(id){  
      document.getElementById('harga').value = harga[id].harga; 
  };   
</script> 