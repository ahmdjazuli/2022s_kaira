<?php require('head.php');
  $cokicoki = mysqli_query($kon, "SELECT * FROM flashsale INNER JOIN barang ON flashsale.idbarang = barang.idbarang WHERE cekflash = 1 ORDER BY waktu DESC");
 ?>
  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single"> <div class="mu-slider-img"> <figure> <img src="assets/img/guru.jpg"> </figure> </div> </div> <div class="mu-slider-single"> <div class="mu-slider-img"> <figure> <img src="assets/img/guru1.jpg"> </figure> </div> </div> <div class="mu-slider-single"> <div class="mu-slider-img"> <figure> <img src="assets/img/guru2.jpg"> </figure> </div> </div> <div class="mu-slider-single"> <div class="mu-slider-img"> <figure> <img src="assets/img/guru3.jpg"> </figure> </div> </div> 
  </section>

<section id="mu-from-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-from-blog-area">
          <div class="mu-title">
            <h2>FlashSale</h2>
            <p>Beli sekarang juga, sebelum waktu habis!!</p>
          </div>
          <div class="mu-from-blog-content">
            <div class="row">
              <?php while($j = mysqli_fetch_array($cokicoki)){ ?>
              <div class="col-md-4 col-sm-4">
                <article class="mu-blog-single-item">
                  <figure class="mu-blog-single-img">
                    <a href="<?= $j['gambar'] ?>"><img src="<?= $j['gambar'] ?>"></a>
                    <figcaption class="mu-blog-caption">
                      <h3><a href="post?idbarang=<?= $j['idbarang'] ?>"><?= $j['namabarang'] ?></a></h3>
                    </figcaption>                      
                  </figure>
                  <div class="mu-blog-meta">
                    <span><i class="fa fa-toggle-on"></i><?= $j['kategori'] ?>
                    &ensp;<i class="fa fa-credit-card"></i>Rp. <?= $memori['level']=='reseller' ? number_format($j['harga_r'],0,',','.') : number_format($j['harga'],0,',','.'); ?></span>
                  </div>
                  <form action="beli.php" method="POST">
                  <div class="mu-blog-description">
                    <p><?= substr(strip_tags($j['deskripsi']),0,50).'...'; ?></p>
                    <input type="hidden" name="idbarang" value="<?= $j['idbarang'] ?>">
                    <div class="input-group">
                      <input type="number" name="jumlah" placeholder="Ex : 1" max="<?= $j['stok'] ?>" class="form-control" required>
                      <span class="input-group-addon">
                        <button type="submit" id="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
                      </span>
                    </div>
                  </div>
                  </form>
                  <span id="demo"><script> var countDownDate = new Date("<?= $j['waktu'] ?>").getTime(); </script></span>
                </article>
              </div>
              <?php } ?>
            </div>
          </div>      
        </div>
      </div>
    </div>
  </div>
</section>

<?php require('foot.php'); ?>