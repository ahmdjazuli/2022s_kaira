<?php require('head.php'); hal('Data Pengeluaran Lainnya'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM pengeluaran ORDER BY tgl DESC"); ?>
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
                  <th>Keterangan</th>
                  <th>Biaya (Rp.)</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= strftime("%d %B %Y", strtotime($j['tgl'])); ?></td>          
                    <td><?= $j['ket'] ?></td>           
                    <td><?= number_format($j['total'],0,',','.') ?> </td>   
                    <td><?php
                        zeroOne("?action=ubah&idpengeluaran=$j[idpengeluaran]"); 
                        zeroTwo("$j[idpengeluaran]","idpengeluaran=$j[idpengeluaran]");
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
<form action="action.php?tabel=pengeluaran&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Biaya (Rp.)</label>
                <input type="number" name="total" class="form-control" required>
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
$idpengeluaran = $_GET['idpengeluaran'];
$query = mysqli_query($kon, "SELECT * FROM pengeluaran WHERE idpengeluaran = '$idpengeluaran'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=pengeluaran&action=ubah&idpengeluaran=<?=$idpengeluaran?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" value="<?= $j['tgl'] ?>" required>
            </div>
            <div class="form-group">
                <label>Biaya (Rp.)</label>
                <input type="number" name="total" value="<?= $j['total'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="<?= $j['ket'] ?>" class="form-control" required>
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