<?php require('head.php'); hel('Data Pengguna');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM user WHERE NOT level = 'admin' ORDER BY id DESC"); ?>
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
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?php 
                      if($j['jk'] == 0){
                        echo $j['nama']." <svg style='width:22px;height:22px' viewBox='0 0 24 24'><path fill='currentColor' d='M9,9C10.29,9 11.5,9.41 12.47,10.11L17.58,5H13V3H21V11H19V6.41L13.89,11.5C14.59,12.5 15,13.7 15,15A6,6 0 0,1 9,21A6,6 0 0,1 3,15A6,6 0 0,1 9,9M9,11A4,4 0 0,0 5,15A4,4 0 0,0 9,19A4,4 0 0,0 13,15A4,4 0 0,0 9,11Z' /></svg>";
                      }else if($j['jk'] == 1){
                        echo $j['nama']." <svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M12,4A6,6 0 0,1 18,10C18,12.97 15.84,15.44 13,15.92V18H15V20H13V22H11V20H9V18H11V15.92C8.16,15.44 6,12.97 6,10A6,6 0 0,1 12,4M12,6A4,4 0 0,0 8,10A4,4 0 0,0 12,14A4,4 0 0,0 16,10A4,4 0 0,0 12,6Z' /></svg>";
                      } ?></td>           
                    <td><?= $j['username'] ?></td>           
                    <td><?= substr(strip_tags($j['alamat']),0,30).'...'; ?></td> 
                    <td><?= $j['telp'] ?></td>
                    <td><?= $j['email'] ?></td>
                    <td><?= $j['level'] ?></td>     
                    <td><?php 
                        zeroOne("?action=ubah&id=$j[id]"); 
                        zeroTwo("$j[id]","id=$j[id]");
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
$id = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=pengguna&action=ubah&id=<?=$id?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= $j['username'] ?>" required>
              </div>
              <div class="form-group">
                  <label>Telepon</label>
                  <input type="tel" name="telp" placeholder="Ex : 62" value="<?= $j['telp'] ?>" class="form-control" required>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= $j['email'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $j['alamat'] ?>" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <br>
              <input type="radio" name="jk" value="0" checked> Laki-Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="jk" value="1"> Perempuan
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