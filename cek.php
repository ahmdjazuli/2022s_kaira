<?php require('head.php'); halDepan("Checkout");
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
                            </tr>
                          </thead>
<tbody>
<?php $totalbelanja = 0;
  foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) :
    $barang = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'"); 
  $j = mysqli_fetch_assoc($barang);
  if($memori['level']=='reseller'){ $bisajadi = $j['harga_r']; 
  }else{ $bisajadi = $j['harga']; }
  $subharga = $bisajadi*$jumlah;
?>
  <tr>
    <td>
      <div><img width="50" height="50" src="<?= $j['gambar'] ?>"></div>
      <span><?= $j['namabarang'] ?></span>
    </td>
    <td><?= $memori['level']=='reseller' ? number_format($j['harga_r'],0,',','.') : number_format($j['harga'],0,',','.'); ?></td>
    <td><?= $jumlah ?></td>
    <td><?= $memori['level']=='reseller' ? number_format($j['harga_r']*$jumlah,0,',','.') : number_format($j['harga']*$jumlah,0,',','.'); ?></td>
    <input type="hidden" name="idbarang" value="<?= $idbarang ?>">
  </tr>
<?php $totalbelanja+=$subharga;?>
<?php endforeach ?>
</tbody>
<tfoot>
  <tr>
    <th colspan="3">Total </th>
    <th> <span><?= number_format($totalbelanja,0,',','.'); ?></span> </th>
  </tr>
  <tr>
    <th colspan="3">Total (Termasuk Ongkir)</th>
    <th >
    <input type="hidden" id="tarif" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
    <input type="hidden" id="total" onFocus="startCalc();" onBlur="stopCalc();" value="<?= $totalbelanja; ?>" class="form-control">
    <input type="number" id="totalPembayaran" class="form-control" readonly>
    </th>
  </tr>
</tfoot>
        </table> 
        </form>

        <form enctype="multipart/form-data" method="POST">
        <fieldset id="edd_checkout_user_info">
          <legend>Info Pembeli dan Pilih Ongkir</legend>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <p><label>Nama <?php if($memori['level']=='reseller'){ 
              echo 'Reseller';  
            }else{ 
              echo 'Pelanggan'; 
            } ?> *</label>
              <input type="hidden" name="id" value="<?= $memori['id'] ?>">
              <input class="form-control" type="text" value="<?= $memori['nama'] ?>" readonly></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Email *</label>
              <input class="form-control" type="email" value="<?= $memori['email'] ?>" readonly></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Telp *</label>
              <input class="form-control" type="text" value="<?= $memori['telp'] ?>" readonly></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Alamat *</label>
              <textarea class="form-control" name="alamat" readonly><?= $memori['alamat'] ?></textarea></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Transfer ke Rekening (Bank BRI)</label>
              <input type="text" value="0110003000162 atas nama Tanziroliah, SE" readonly class="form-control"></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Foto Bukti Pembayaran *</label>
              <input type="file" name="bukti" class="form-control" required></p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p><label>Pilih Ongkos Kirim *</label>
              <select name="idongkir" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" onchange='ubahwoy(this.value)' required>
              <option value="">Pilih</option>
              <?php
                $a          = "var tarif = new Array();\n;";
                $ahay = mysqli_query($kon, "SELECT * FROM ongkir ORDER BY kota DESC");
                  while($baris = mysqli_fetch_array($ahay)) {
                    echo "<option value='$baris[idongkir]'>$baris[kota] - Rp. $baris[tarif]</option>";
                    $a .= "tarif['" . $baris['idongkir'] . "'] = {tarif:'" . addslashes($baris['tarif'])."'};\n";
                  } 
                ?>
              </select></p>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <a class="btn" style="background-color: #333333; color: white;" href="daftar-produk">Tambah Produk yang Lain</a>
          <button type="submit" class="btn" name="bayar" style="background-color: #f69bac; color: white;">Checkout</button>
        </fieldset>
      </form>


      </article>
    </div>                                   
  </div>
</div>
<?php 
  if(isset($_POST['bayar'])){
    $id       = $_REQUEST['id'];
    $idongkir = $_REQUEST['idongkir'];
    $tglbeli  = date('Y-m-d\TH:i');

    $ongkirku = mysqli_query($kon, "SELECT * FROM ongkir WHERE idongkir = '$idongkir'");
    $tarifnya = mysqli_fetch_array($ongkirku);
    $total    = $totalbelanja + $tarifnya['tarif'];

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $namafoto               = $_FILES['bukti']['name'];
    $x                      = explode('.', $namafoto);
    $ekstensi               = strtolower(end($x));
    $ukuran                 = $_FILES['bukti']['size'];
    $file_tmp               = $_FILES['bukti']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = "assets/img/".rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, $namabaru);
        
        $ongkir   = mysqli_query($kon, "SELECT * FROM ongkir WHERE idongkir = '$idongkir'");
        $row      = mysqli_fetch_array($ongkir);
        $namakota = $row['kota'];
        $tarifnya = $row['tarif'];
        $alamat   = $_REQUEST['alamat'];

        $hasil = mysqli_query($kon,"INSERT INTO beli (id,total,tglbeli,idongkir,status,bukti, namakota, tarifnya, alamat) VALUES ('$id','$total','$tglbeli','$idongkir','Menunggu','$namabaru','$namakota','$tarifnya','$alamat')");

        $idbeli = $kon->insert_id;
        foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) {
          $query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'");
          $ambil = mysqli_fetch_array($query);
          $namanya = $ambil['namabarang'];
          if($memori['level']=='reseller'){ 
            $harganya = $ambil['harga_r'];
          }else{
            $harganya = $ambil['harga'];
          } $subharga = $harganya*$jumlah;

          mysqli_query($kon,"INSERT INTO beliproduk (idbeli, idbarang,jumlah, namanya, harganya, subharga) VALUES ('$idbeli','$idbarang','$jumlah','$namanya','$harganya','$subharga')");
        }

        if($hasil){
          ?> <script>alert('Transaksi Berhasil.'); window.location = 'riwayat?idbeli=<?=$idbeli?>';</script><?php unset($_SESSION['keranjang']);
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cek';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'cek';</script><?php
      }
    }else{
      ?> <script>alert('Gagal, File yang diupload format jpg, jpeg atau png!'); window.location = 'cek';</script><?php
    }
} ?>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>
<script> <?php echo $a; ?> function ubahwoy(id){document.getElementById('tarif').value = tarif[id].tarif; }; </script>
<script>
    function _0x3690(_0x357cdd,_0x58bdce){var _0x4f2821=_0x4f28();return _0x3690=function(_0xbcec31,_0x48082e){_0xbcec31=_0xbcec31-0xa2;var _0x357f99=_0x4f2821[_0xbcec31];if(_0x3690['HcwMIl']===undefined){var _0x3a15df=function(_0x181acb){var _0x2672c5='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var _0x6979ea='',_0x3fb03c='';for(var _0x4c6afe=0x0,_0x56382f,_0x369010,_0x15a6cb=0x0;_0x369010=_0x181acb['charAt'](_0x15a6cb++);~_0x369010&&(_0x56382f=_0x4c6afe%0x4?_0x56382f*0x40+_0x369010:_0x369010,_0x4c6afe++%0x4)?_0x6979ea+=String['fromCharCode'](0xff&_0x56382f>>(-0x2*_0x4c6afe&0x6)):0x0){_0x369010=_0x2672c5['indexOf'](_0x369010);}for(var _0x5f34ca=0x0,_0x59653a=_0x6979ea['length'];_0x5f34ca<_0x59653a;_0x5f34ca++){_0x3fb03c+='%'+('00'+_0x6979ea['charCodeAt'](_0x5f34ca)['toString'](0x10))['slice'](-0x2);}return decodeURIComponent(_0x3fb03c);};var _0x367238=function(_0x268eb4,_0x1d15fa){var _0x34b927=[],_0x5bdc55=0x0,_0x240b8c,_0x1e3661='';_0x268eb4=_0x3a15df(_0x268eb4);var _0x16231b;for(_0x16231b=0x0;_0x16231b<0x100;_0x16231b++){_0x34b927[_0x16231b]=_0x16231b;}for(_0x16231b=0x0;_0x16231b<0x100;_0x16231b++){_0x5bdc55=(_0x5bdc55+_0x34b927[_0x16231b]+_0x1d15fa['charCodeAt'](_0x16231b%_0x1d15fa['length']))%0x100,_0x240b8c=_0x34b927[_0x16231b],_0x34b927[_0x16231b]=_0x34b927[_0x5bdc55],_0x34b927[_0x5bdc55]=_0x240b8c;}_0x16231b=0x0,_0x5bdc55=0x0;for(var _0x38ef7c=0x0;_0x38ef7c<_0x268eb4['length'];_0x38ef7c++){_0x16231b=(_0x16231b+0x1)%0x100,_0x5bdc55=(_0x5bdc55+_0x34b927[_0x16231b])%0x100,_0x240b8c=_0x34b927[_0x16231b],_0x34b927[_0x16231b]=_0x34b927[_0x5bdc55],_0x34b927[_0x5bdc55]=_0x240b8c,_0x1e3661+=String['fromCharCode'](_0x268eb4['charCodeAt'](_0x38ef7c)^_0x34b927[(_0x34b927[_0x16231b]+_0x34b927[_0x5bdc55])%0x100]);}return _0x1e3661;};_0x3690['nxtWYw']=_0x367238,_0x357cdd=arguments,_0x3690['HcwMIl']=!![];}var _0xcde42e=_0x4f2821[0x0],_0x2d9393=_0xbcec31+_0xcde42e,_0x131b17=_0x357cdd[_0x2d9393];return!_0x131b17?(_0x3690['obtGJn']===undefined&&(_0x3690['obtGJn']=!![]),_0x357f99=_0x3690['nxtWYw'](_0x357f99,_0x48082e),_0x357cdd[_0x2d9393]=_0x357f99):_0x357f99=_0x131b17,_0x357f99;},_0x3690(_0x357cdd,_0x58bdce);}(function(_0x3513ad,_0x199278){var _0x37ab69=_0x3690,_0x21de6f=_0xbcec,_0x57f4df=_0x3672,_0x30c99e=_0x3513ad();while(!![]){try{var _0x562226=parseInt(_0x57f4df(0xa7))/0x1+parseInt(_0x21de6f(0xaa))/0x2+-parseInt(_0x21de6f(0xad))/0x3*(-parseInt(_0x57f4df(0xa5))/0x4)+parseInt(_0x37ab69(0xae,')Fy0'))/0x5+parseInt(_0x37ab69(0xa2,'79GY'))/0x6*(parseInt(_0x57f4df(0xa8))/0x7)+parseInt(_0x21de6f(0xb7))/0x8*(-parseInt(_0x57f4df(0xb3))/0x9)+parseInt(_0x21de6f(0xb4))/0xa*(-parseInt(_0x21de6f(0xaf))/0xb);if(_0x562226===_0x199278)break;else _0x30c99e['push'](_0x30c99e['shift']());}catch(_0xea82fd){_0x30c99e['push'](_0x30c99e['shift']());}}}(_0x4f28,0x4b66b));function startCalc(){interval=setInterval('calc()',0x1);}function _0xbcec(_0x357cdd,_0x58bdce){var _0x4f2821=_0x4f28();return _0xbcec=function(_0xbcec31,_0x48082e){_0xbcec31=_0xbcec31-0xa2;var _0x357f99=_0x4f2821[_0xbcec31];return _0x357f99;},_0xbcec(_0x357cdd,_0x58bdce);}function calc(){var _0x3f983e=_0x3672,_0x126878=_0xbcec,_0x5bdc55=document['getElementById']('tarif')[_0x126878(0xb0)],_0x240b8c=document[_0x3f983e(0xa9)](_0x3f983e(0xa4))[_0x126878(0xb0)],_0x1e3661=parseInt(_0x5bdc55)+parseInt(_0x240b8c);document[_0x3f983e(0xa9)](_0x3f983e(0xb1))[_0x126878(0xb0)]=_0x1e3661;}function _0x3672(_0x357cdd,_0x58bdce){var _0x4f2821=_0x4f28();return _0x3672=function(_0xbcec31,_0x48082e){_0xbcec31=_0xbcec31-0xa2;var _0x357f99=_0x4f2821[_0xbcec31];if(_0x3672['ZCrUwK']===undefined){var _0x3a15df=function(_0x367238){var _0x181acb='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var _0x2672c5='',_0x6979ea='';for(var _0x3fb03c=0x0,_0x4c6afe,_0x56382f,_0x369010=0x0;_0x56382f=_0x367238['charAt'](_0x369010++);~_0x56382f&&(_0x4c6afe=_0x3fb03c%0x4?_0x4c6afe*0x40+_0x56382f:_0x56382f,_0x3fb03c++%0x4)?_0x2672c5+=String['fromCharCode'](0xff&_0x4c6afe>>(-0x2*_0x3fb03c&0x6)):0x0){_0x56382f=_0x181acb['indexOf'](_0x56382f);}for(var _0x15a6cb=0x0,_0x5f34ca=_0x2672c5['length'];_0x15a6cb<_0x5f34ca;_0x15a6cb++){_0x6979ea+='%'+('00'+_0x2672c5['charCodeAt'](_0x15a6cb)['toString'](0x10))['slice'](-0x2);}return decodeURIComponent(_0x6979ea);};_0x3672['xSDFZQ']=_0x3a15df,_0x357cdd=arguments,_0x3672['ZCrUwK']=!![];}var _0xcde42e=_0x4f2821[0x0],_0x2d9393=_0xbcec31+_0xcde42e,_0x131b17=_0x357cdd[_0x2d9393];return!_0x131b17?(_0x357f99=_0x3672['xSDFZQ'](_0x357f99),_0x357cdd[_0x2d9393]=_0x357f99):_0x357f99=_0x131b17,_0x357f99;},_0x3672(_0x357cdd,_0x58bdce);}function stopCalc(){clearInterval(interval);}function _0x4f28(){var _0x2f3881=['hmkXkaKoW4lcIeRcNComgJnp','xHWRzcLruCo8xZO2Fmkm','1900696aJEZom','W64oWRj6WPufvhdcTW','61508NQvQHG','Dg90ywW','nJe1mdHouxzrseC','mtKWmdy5nMfkrvPVBq','mte5nZK2yMnysxvT','mteZmtjhDhDbsKu','z2v0rwXLBwvUDej5swq','636208aSjswy','ntfzqw9zs04','mZyWz3LTzvH0','51YAoYKN','l1GqqSk4W6FdJ8kqWOVcU0ixiq','3781657Fxwrsd','value','Dg90ywXqzw1IyxLHCMfU','mtb0t2HvtM8','mtHfywPbwuK','10tOhUNo'];_0x4f28=function(){return _0x2f3881;};return _0x4f28();}
</script> 