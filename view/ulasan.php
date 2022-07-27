<?php require('head.php'); hel('Ulasan');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM ulasan JOIN barang ON ulasan.idbarang = barang.idbarang JOIN user ON ulasan.id = user.id ORDER BY waktu DESC"); ?>
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
                  <th>Ulasan</th>
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
                    <td><?= $j['ulasannya'] ?></td>
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