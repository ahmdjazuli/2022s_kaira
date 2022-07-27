<?php require('head.php'); hel('Profil Kurir'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM kurir WHERE idkurir = '$_SESSION[idkurir]'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=profil2&idkurir=<?=$idkurir?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $j['username'] ?>" class="form-control" required>
                <input type="hidden" name="usernameOLD" value="<?= $j['username'] ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= $j['password'] ?>" class="form-control" required>
                <input type="hidden" name="passwordOLD" value="<?= $j['password'] ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="namakurir" value="<?= $j['namakurir'] ?>" class="form-control" required>
                <input type="hidden" name="namakurirOLD" value="<?= $j['namakurir'] ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamatkurir" value="<?= $j['alamatkurir'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="tel" name="kontakkurir" value="<?= $j['kontakkurir'] ?>" class="form-control" required>
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