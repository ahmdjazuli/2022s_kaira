<?php require('head.php'); hal('Data Ongkir'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM ongkir ORDER BY kota ASC"); ?>
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
                  <th>Nama Kota</th>
                  <th>Tarif</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['kota'] ?></td>           
                    <td>Rp. <?= number_format($j['tarif'],0,',','.') ?> </td>   
                    <td><?php
                        zeroOne("?action=ubah&idongkir=$j[idongkir]"); 
                        zeroTwo("$j[idongkir]","idongkir=$j[idongkir]");
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
<form action="action.php?tabel=ongkir&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tarif</label>
                <input type="number" name="tarif" class="form-control" required>
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
$idongkir = $_GET['idongkir'];
$query = mysqli_query($kon, "SELECT * FROM ongkir WHERE idongkir = '$idongkir'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=ongkir&action=ubah&idongkir=<?=$idongkir?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Kota</label>
                <input type="text" name="kota" value="<?= $j['kota'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tarif</label>
                <input type="number" name="tarif" value="<?= $j['tarif'] ?>" class="form-control" required>
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