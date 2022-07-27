<?php require('head.php'); $idbarang = $_GET['idbarang'];
  $barang = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang='$idbarang'");
  $j = mysqli_fetch_array($barang);
?>
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2><?= $j['namabarang'] ?></h2>
           <ol class="breadcrumb">
            <li><a href="./">Beranda</a></li>            
            <li class="active"><?= $j['namabarang'] ?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="#"><img alt="img" src="<?= $j['gambar'] ?>"></a>                     
                        </figure>
                        <div class="mu-blog-description">
                          <?= $j['deskripsi'] ?>
                        </div>
                        <figcaption class="mu-blog-caption">
                            <h4>Kategori : <a href="#"><?= $j['kategori'] ?></a></h4>
                          </figcaption>
                      </article>
                    </div>                                   
                  </div>
                </div>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>