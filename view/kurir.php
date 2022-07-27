<?php require('head.php'); hal('Data Kurir'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM kurir ORDER BY namakurir ASC"); ?>
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
                  <th>Username</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Layanan</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?php 
                      if($j['jkkurir'] == 0){
                        echo $j['namakurir']." <svg style='width:22px;height:22px' viewBox='0 0 24 24'><path fill='currentColor' d='M9,9C10.29,9 11.5,9.41 12.47,10.11L17.58,5H13V3H21V11H19V6.41L13.89,11.5C14.59,12.5 15,13.7 15,15A6,6 0 0,1 9,21A6,6 0 0,1 3,15A6,6 0 0,1 9,9M9,11A4,4 0 0,0 5,15A4,4 0 0,0 9,19A4,4 0 0,0 13,15A4,4 0 0,0 9,11Z' /></svg>";
                      }else if($j['jkkurir'] == 1){
                        echo $j['namakurir']." <svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M12,4A6,6 0 0,1 18,10C18,12.97 15.84,15.44 13,15.92V18H15V20H13V22H11V20H9V18H11V15.92C8.16,15.44 6,12.97 6,10A6,6 0 0,1 12,4M12,6A4,4 0 0,0 8,10A4,4 0 0,0 12,14A4,4 0 0,0 16,10A4,4 0 0,0 12,6Z' /></svg>";
                      } ?></td>         
                    <td><?= $j['username'] ?></td>           
                    <td><?= $j['kontakkurir'] ? $j['kontakkurir'] : '---' ?></td>           
                    <td><?= $j['alamatkurir'] ? $j['alamatkurir'] : '---' ?></td>           
                    <td><?= $j['layanan'] ?></td>   
                    <td><?php
                        zeroOne("?action=ubah&idkurir=$j[idkurir]"); 
                        zeroTwo("$j[idkurir]","idkurir=$j[idkurir]");
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
<form action="action.php?tabel=kurir&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="namakurir" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Layanan</label>
              <select name="layanan" class="form-control">
                <option value="AnterAja">AnterAja</option>
                <option value="JNE">JNE</option>
                <option value="J&T Express">J&T Express</option>
                <option value="SiCepat Ekspress">SiCepat Ekspress</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <input type="radio" name="jkkurir" value="0" checked> Laki-Laki
              <input type="radio" name="jkkurir" value="1"> Perempuan<br>
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
$idkurir = $_GET['idkurir'];
$query = mysqli_query($kon, "SELECT * FROM kurir WHERE idkurir = '$idkurir'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=kurir&action=ubah&idkurir=<?=$idkurir?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="namakurir" value="<?= $j['namakurir'] ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $j['username'] ?>"  class="form-control" required>
            </div>
            <div class="form-group">
              <label>Layanan</label>
              <select name="layanan" class="form-control">
                <option value="<?= $j['layanan'] ?>" ><?= $j['layanan'] ?></option>
                <option value="AnterAja">AnterAja</option>
                <option value="JNE">JNE</option>
                <option value="J&T Express">J&T Express</option>
                <option value="SiCepat Ekspress">SiCepat Ekspress</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <input type="radio" name="jkkurir" value="0" checked> Laki-Laki
              <input type="radio" name="jkkurir" value="1"> Perempuan<br>
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