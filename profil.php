<?php require('head.php'); 
$query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$_SESSION[id]'");
$j = mysqli_fetch_array($query); 
?>
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12" style="padding-top: 0px;">
         <div class="mu-page-breadcrumb-area">
           <h2>Profil Akun</h2>
           <p class="text-center" style="color: white;">Pengantaran Paket bisa melalui expedisi AnterAja, JNE, J&T Express dan Sicepat Express</p>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section id="mu-course-content" style="padding-top: 0;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
<form action="view/action.php?tabel=profil3" method="POST" autocomplete="off">
    <br>
  <div class="col-md-6">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
    </div>
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
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= $j['alamat'] ?></textarea>
    </div>
  </div>  
  <div class="col-md-6">
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" class="form-control" name="telp" value="<?= $j['telp'] ?>" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" value="<?= $j['email'] ?>" name="email" required>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" required>
          <option value="<?= $j['jk'] ?>"><?= $j['jk'] == '0' ? 'Pria' : 'Perempuan' ?></option>
          <option value="0">Pria</option>
          <option value="1">Perempuan</option>
        </select>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn" style="background: #f69bac;">Ubah</button>
    </div>
  </div>                                 
</form>
                  </div>
                </div>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>