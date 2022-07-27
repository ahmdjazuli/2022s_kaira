<?php require('head.php'); hel('Retur');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM retur JOIN barang ON retur.idbarang = barang.idbarang JOIN user ON retur.id = user.id ORDER BY waktu DESC"); ?>
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
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Foto</th>
                  <th>Alasan</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htw($j['waktu']) ?></td>
                    <td><?= $j['nama'] ?></td>           
                    <td><?= $j['namabarang'] ?></td>
                    <td><?= $j['kategori'] ?></td>        
                    <td><a target="_blank" href="../<?= $j['file'] ?>"><img src="../<?= $j['file'] ?>" width='60px'></a></td>               
                    <td><?= $j['alasan'] ?></td>           
                    <td><?php 
                      if($j['status'] == 'Diterima'){
                        ?><i class='fa fa-check'></i> Retur Disetujui<?php
                      }else if($j['status'] == 'Ditolak'){
                        echo "<i class='fa fa-times'></i> Retur Gagal";
                      }else if($j['status'] == 'Menunggu'){
                        echo "<i class='fa fa-clock-o'></i> Menunggu Persetujuan";
                      }  ?></td> 
                    <td><?php 
                        zeroOne("?action=ubah&idretur=$j[idretur]"); 
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
case "ubah":
$idretur = $_GET['idretur'];
$query = mysqli_query($kon, "SELECT * FROM retur WHERE idretur = '$idretur'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=retur&action=ubah&idretur=<?=$idretur?>" method="POST">
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
<?php break; } require('foot.php'); ?>