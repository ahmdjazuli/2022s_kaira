<?php require('kon.php');
$kategori = mysqli_query($kon, "SELECT * FROM barang GROUP BY kategori ORDER BY kategori ASC");
?>
<div class="row">
  <div class="col-md-12">
  </div>
</div>
</div>
<div class="col-md-3">
<aside class="mu-sidebar">
  <div class="mu-single-sidebar">
    <h3>Kategori</h3>
    <ul class="mu-sidebar-catg">
      <?php 
        while($j = mysqli_fetch_array($kategori)){ ?>
          <li><a href="daftar-produk?kategori=<?= $j['kategori'] ?>"><?= $j['kategori'] ?></a></li>
        <?php }
      ?>
      <li><a href="daftar-produk?kategori=Terlaris">Produk Terlaris</a></li>
    </ul>
  </div>
</aside>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>