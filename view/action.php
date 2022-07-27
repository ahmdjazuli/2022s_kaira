<?php
require('../kon.php'); require('config.php'); SESSION_START(); error_reporting(0);
$tabel  = $_REQUEST['tabel'];
$action = $_REQUEST['action'];
if($tabel=='pengguna'){
    $id       = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $nama     = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $jk       = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);
    $telp     = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $email    = htmlspecialchars($_REQUEST['email'], ENT_QUOTES);
    $alamat   = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $username = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);

    if ($action=='ubah'){
        mysqli_query($kon, "UPDATE user SET nama='$nama', jk = '$jk', telp='$telp', email = '$email', alamat = '$alamat', username = '$username' WHERE id = '$id'");
        bebeb('ubah','pengguna');
    }
}else if($tabel=='pengeluaran'){
    $idpengeluaran = htmlspecialchars($_REQUEST['idpengeluaran'], ENT_QUOTES);
    $tgl           = htmlspecialchars($_REQUEST['tgl'], ENT_QUOTES);
    $ket           = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);
    $total         = htmlspecialchars($_REQUEST['total'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO pengeluaran (tgl,ket,total) VALUES ('$tgl','$ket','$total')");
        bebeb('simpan','pengeluaran');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE pengeluaran SET tgl='$tgl', ket = '$ket', total = '$total' WHERE idpengeluaran = '$idpengeluaran'");
        bebeb('ubah','pengeluaran');
    }
}else if($tabel=='kurir'){
    $idkurir   = htmlspecialchars($_REQUEST['idkurir'], ENT_QUOTES);
    $namakurir = htmlspecialchars($_REQUEST['namakurir'], ENT_QUOTES);
    $username  = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $layanan   = htmlspecialchars($_REQUEST['layanan'], ENT_QUOTES);
    $jkkurir   = htmlspecialchars($_REQUEST['jkkurir'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO kurir (namakurir,username,layanan,password,jkkurir) VALUES ('$namakurir','$username','$layanan','$username','$jkkurir')");
        bebeb('simpan','kurir');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE kurir SET namakurir='$namakurir', username = '$username', layanan = '$layanan', jkkurir = '$jkkurir' WHERE idkurir = '$idkurir'");
        bebeb('ubah','kurir');
    }
}else if($tabel=='barang'){
    $idbarang   = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $namabarang = htmlspecialchars($_REQUEST['namabarang'], ENT_QUOTES);
    $modal      = htmlspecialchars($_REQUEST['modal'], ENT_QUOTES);
    $kategori   = htmlspecialchars($_REQUEST['kategori'], ENT_QUOTES);
    $deskripsi  = $_REQUEST['deskripsi'];
    $harga_r    = htmlspecialchars($_REQUEST['harga_r'], ENT_QUOTES);
    $harga      = htmlspecialchars($_REQUEST['harga'], ENT_QUOTES);

    $namafile       = $_FILES['file']['tmp_name'];
    $namafoto       = $_FILES['file']['name'];
    $checkin        = $_FILES['file']['error'];
    $fileLama       = $_REQUEST['fileLama'];
    $lokasi         = "assets/img/".$_FILES['file']['name'];
    $cekformat      = array('png','jpg','jpeg');
    $x              = explode('.', $namafoto);
    $ekstensi       = strtolower(end($x));

    if ($action=='tambah'){
        if(in_array($ekstensi, $cekformat) === true){
            move_uploaded_file($namafile, '../'.$lokasi);
            mysqli_query($kon, "INSERT INTO barang (namabarang,modal,kategori,deskripsi,harga_r,harga,gambar) VALUES ('$namabarang','$modal','$kategori','$deskripsi','$harga_r','$harga','$lokasi')");
            bebeb('simpan','barang');
        }else{ 
            bebeb('ekstensi','barang');
        }
    }elseif ($action=='ubah'){
        if($checkin){
            mysqli_query($kon, "UPDATE barang SET kategori='$kategori', namabarang='$namabarang', modal = '$modal', deskripsi = '$deskripsi', harga = '$harga', harga_r = '$harga_r', gambar = '$fileLama' WHERE idbarang = '$idbarang'"); bebeb('info','barang');
        }else{
          unlink('../'.$fileLama);
          move_uploaded_file($namafile, '../'.$lokasi);
          mysqli_query($kon, "UPDATE barang SET kategori='$kategori', namabarang='$namabarang', modal = '$modal', deskripsi = '$deskripsi', harga = '$harga', harga_r = '$harga_r', gambar = '$lokasi' WHERE idbarang = '$idbarang'"); bebeb('ubah','barang');
        }        
    }
}else if($tabel=='ongkir'){
    $kota     = htmlspecialchars($_REQUEST['kota'], ENT_QUOTES);
    $tarif    = htmlspecialchars($_REQUEST['tarif'], ENT_QUOTES);
    $idongkir = htmlspecialchars($_REQUEST['idongkir'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO ongkir (kota,tarif) VALUES ('$kota','$tarif')");
        bebeb('simpan','ongkir');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE ongkir SET tarif='$tarif', kota = '$kota' WHERE idongkir = '$idongkir'"); 
        bebeb('ubah','ongkir');
    }
}else if($tabel=='masuk'){
    $idmasuk          = htmlspecialchars($_REQUEST['idmasuk'], ENT_QUOTES);
    $idbarang          = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $sumber           = htmlspecialchars($_REQUEST['sumber'], ENT_QUOTES);
    $jumlah           = htmlspecialchars($_REQUEST['jumlah'], ENT_QUOTES);
    $tgl              = htmlspecialchars($_REQUEST['tgl'], ENT_QUOTES);
    $hargamasuk       = htmlspecialchars($_REQUEST['hargamasuk'], ENT_QUOTES);
    $catatan          = htmlspecialchars($_REQUEST['catatan'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO masuk (idbarang,sumber,jumlah,tgl,hargamasuk,catatan) VALUES ('$idbarang','$sumber','$jumlah','$tgl','$hargamasuk','$catatan')");
        bebeb('simpan','masuk');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE masuk SET sumber='$sumber', jumlah = '$jumlah', tgl = '$tgl', catatan = '$catatan' WHERE idmasuk = '$idmasuk'");
        bebeb('ubah','masuk');
    }
}else if($tabel=='rusak'){
    $idrusak          = htmlspecialchars($_REQUEST['idrusak'], ENT_QUOTES);
    $idbarang         = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $jumlah           = htmlspecialchars($_REQUEST['jumlah'], ENT_QUOTES);
    $tgl              = htmlspecialchars($_REQUEST['tgl'], ENT_QUOTES);
    $hargarusak       = htmlspecialchars($_REQUEST['hargarusak'], ENT_QUOTES);
    $catatan          = htmlspecialchars($_REQUEST['catatan'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO rusak (idbarang,jumlah,tgl,hargarusak,catatan) VALUES ('$idbarang','$jumlah','$tgl','$hargarusak','$catatan')");
        bebeb('simpan','rusak');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE rusak SET jumlah = '$jumlah', tgl = '$tgl', catatan = '$catatan' WHERE idrusak = '$idrusak'");
        bebeb('ubah','rusak');
    }
}else if($tabel=='transaksi1'){
    $id          = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $idbeli      = htmlspecialchars($_REQUEST['idbeli'], ENT_QUOTES);
    $tglbeli     = date('Y-m-d\TH:i');
    $notransaksi = date('Ymds');
    $catatan     = htmlspecialchars($_REQUEST['catatan'], ENT_QUOTES);
    $total       = htmlspecialchars($_REQUEST['total'], ENT_QUOTES);
    $status      = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);

    if (isset($_POST['tambah'])) {
        $idbarang = $_REQUEST['idbarang'];
        $jumlahku = $_REQUEST['jumlahku'];
        if (isset($_SESSION['keranjang'][$idbarang])) {
            $_SESSION['keranjang'][$idbarang] += $jumlahku;
        }else{
            $_SESSION['keranjang'][$idbarang] = $jumlahku;
        } echo "<script>window.location = 'transaksi1?action=tambah';</script>";
    }

    if ($action=='tambah'){
        $firdaus = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
        $capek = mysqli_fetch_array($firdaus);
        $alamat = $capek['alamat'];

        mysqli_query($kon,"INSERT INTO beli (id,total,tglbeli,alamat,status) VALUES ('$id','$total','$tglbeli','$alamat','Diterima')");

        $idbeli = $kon->insert_id;
        foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) {
          $query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'");
          $ambil = mysqli_fetch_array($query);
          $namanya = $ambil['namabarang'];
          $harganya = $ambil['harga_r'];
          $subharga = $ambil['harga_r']*$jumlah;
          mysqli_query($kon,"INSERT INTO beliproduk (idbeli, idbarang,jumlah, namanya, harganya, subharga) VALUES ('$idbeli','$idbarang','$jumlah','$namanya','$harganya','$subharga')");
        } unset($_SESSION['keranjang']); bebeb('simpan','transaksi1');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE beli SET status='$status' WHERE idbeli = '$idbeli'");
        bebeb('ubah','transaksi1');
    }
}else if($tabel=='transaksi2'){
    $id          = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $idbeli      = htmlspecialchars($_REQUEST['idbeli'], ENT_QUOTES);
    $tglbeli     = date('Y-m-d\TH:i');
    $notransaksi = date('Ymds');
    $catatan     = htmlspecialchars($_REQUEST['catatan'], ENT_QUOTES);
    $total       = htmlspecialchars($_REQUEST['total'], ENT_QUOTES);
    $status      = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);

    if (isset($_POST['tambah'])) {
        $idbarang = $_REQUEST['idbarang'];
        $jumlahku = $_REQUEST['jumlahku'];
        if (isset($_SESSION['keranjang'][$idbarang])) {
            $_SESSION['keranjang'][$idbarang] += $jumlahku;
        }else{
            $_SESSION['keranjang'][$idbarang] = $jumlahku;
        } echo "<script>window.location = 'transaksi2?action=tambah';</script>";
    }

    if ($action=='tambah'){
        $firdaus = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
        $capek = mysqli_fetch_array($firdaus);
        $alamat = $capek['alamat'];

        mysqli_query($kon,"INSERT INTO beli (id,total,tglbeli,alamat,status) VALUES ('$id','$total','$tglbeli','$alamat','Diterima')");

        $idbeli = $kon->insert_id;
        foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) {
          $query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'");
          $ambil = mysqli_fetch_array($query);
          $namanya = $ambil['namabarang'];
          $harganya = $ambil['harga_r'];
          $subharga = $ambil['harga_r']*$jumlah;
          mysqli_query($kon,"INSERT INTO beliproduk (idbeli, idbarang,jumlah, namanya, harganya, subharga) VALUES ('$idbeli','$idbarang','$jumlah','$namanya','$harganya','$subharga')");
        } unset($_SESSION['keranjang']); bebeb('simpan','transaksi2');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE beli SET status='$status' WHERE idbeli = '$idbeli'");
        bebeb('ubah','transaksi2');
    }
}else if($tabel=='flashsale'){
    $idflash  = htmlspecialchars($_REQUEST['idflash'], ENT_QUOTES);
    $idbarang = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $diskon   = htmlspecialchars($_REQUEST['diskon'], ENT_QUOTES);
    $waktu    = htmlspecialchars($_REQUEST['waktu'], ENT_QUOTES);
    $harga    = htmlspecialchars($_REQUEST['harga'], ENT_QUOTES);
    $hasil    = (100 - $diskon) * $harga / 100;

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO flashsale(waktu, idbarang, hasil, diskon, hargaawal) VALUES ('$waktu','$idbarang','$hasil','$diskon','$harga')");
        bebeb('simpan','flashsale');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE flashsale SET waktu = '$waktu' WHERE idflash = '$idflash'");
        bebeb('ubah','flashsale');
    }
}else if($tabel=='kirim'){
    $idkirim     = htmlspecialchars($_REQUEST['idkirim'], ENT_QUOTES);
    $idkurir     = htmlspecialchars($_REQUEST['idkurir'], ENT_QUOTES);
    $ket         = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);
    $idbeli      = htmlspecialchars($_REQUEST['idbeli'], ENT_QUOTES);
    $statuskirim = htmlspecialchars($_REQUEST['statuskirim'], ENT_QUOTES);
    $penerima    = htmlspecialchars($_REQUEST['penerima'], ENT_QUOTES);

    $namafile       = $_FILES['foto']['tmp_name'];
    $namafoto       = $_FILES['foto']['name'];
    $checkin        = $_FILES['foto']['error'];
    $fileLama       = $_REQUEST['fileLama'];
    $lokasi         = "assets/img/".$_FILES['foto']['name'];
    $cekformat      = array('png','jpg','jpeg');
    $x              = explode('.', $namafoto);
    $ekstensi       = strtolower(end($x));

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO kirim(idbeli, idkurir, ket) VALUES ('$idbeli','$idkurir','$ket')");
        bebeb('simpan','kirim');
    }elseif ($action=='ubah'){
        if($_SESSION['level'] == 'admin'){
            mysqli_query($kon, "UPDATE kirim SET idkurir = '$idkurir' WHERE idkirim = '$idkirim'");
            bebeb('ubah','kirim');
        }else{
            if($checkin){
                mysqli_query($kon, "UPDATE kirim SET ket='$ket', statuskirim='$statuskirim', penerima = '$penerima',  foto = '$fileLama' WHERE idkirim = '$idkirim'"); bebeb('info','kirim');
            }else{
              unlink('../'.$fileLama);
              move_uploaded_file($namafile, '../'.$lokasi);
              mysqli_query($kon, "UPDATE kirim SET ket='$ket', statuskirim='$statuskirim', penerima = '$penerima', foto = '$lokasi' WHERE idkirim = '$idkirim'"); bebeb('ubah','kirim');
            }      
        }
    }
}else if($tabel=='profil'){
    $username    = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $usernameOLD = htmlspecialchars($_REQUEST['usernameOLD'], ENT_QUOTES);
    $password    = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $passwordOLD = htmlspecialchars($_REQUEST['passwordOLD'], ENT_QUOTES);
    $nama        = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);

    mysqli_query($kon, "UPDATE user SET username='$username', nama = '$nama', password = '$password' WHERE id = '$_SESSION[id]'"); 
    bebeb('ubahkeluar','index');
}else if($tabel=='profil2'){
    $username     = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $usernameOLD  = htmlspecialchars($_REQUEST['usernameOLD'], ENT_QUOTES);
    $password     = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $passwordOLD  = htmlspecialchars($_REQUEST['passwordOLD'], ENT_QUOTES);
    $namakurir    = htmlspecialchars($_REQUEST['namakurir'], ENT_QUOTES);
    $namakurirOLD = htmlspecialchars($_REQUEST['namakurirOLD'], ENT_QUOTES);
    $alamatkurir  = htmlspecialchars($_REQUEST['alamatkurir'], ENT_QUOTES);
    $kontakkurir  = htmlspecialchars($_REQUEST['kontakkurir'], ENT_QUOTES);

    if($usernameOLD == $username AND $passwordOLD == $password AND $namakurirOLD == $namakurir){
        mysqli_query($kon, "UPDATE kurir SET username='$usernameOLD', namakurir = '$namakurirOLD', password = '$passwordOLD', alamatkurir = '$alamatkurir', kontakkurir = '$kontakkurir' WHERE idkurir = '$_SESSION[idkurir]'"); 
        bebeb('ubah','profil2?idkurir='.$_SESSION['idkurir'].'');
    }else{
       mysqli_query($kon, "UPDATE kurir SET username='$username', namakurir = '$namakurir', password = '$password', alamatkurir = '$alamatkurir', kontakkurir = '$kontakkurir' WHERE idkurir = '$_SESSION[idkurir]'");  
       bebeb('ubahkeluar','../out');
    }
}else if($tabel=='profil3'){
    $username    = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $usernameOLD = htmlspecialchars($_REQUEST['usernameOLD'], ENT_QUOTES);
    $password    = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $passwordOLD = htmlspecialchars($_REQUEST['passwordOLD'], ENT_QUOTES);
    $nama        = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $alamat      = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $telp        = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $email       = htmlspecialchars($_REQUEST['email'], ENT_QUOTES);
    $jk          = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);

    if($usernameOLD == $username AND $passwordOLD == $password){
        mysqli_query($kon, "UPDATE user SET username='$usernameOLD', nama = '$nama', password = '$passwordOLD', alamat = '$alamat', telp = '$telp' WHERE id = '$_SESSION[id]'"); 
        bebeb('ubah','../profil?id='.$_SESSION['id'].'');
    }else{
       mysqli_query($kon, "UPDATE user SET username='$username', nama = '$nama', password = '$password', alamat = '$alamat', telp = '$telp' WHERE id = '$_SESSION[id]'");  
       bebeb('ubahkeluar','out');
    }
}else if($tabel=='daftar'){
    $username    = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $password    = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $nama        = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $alamat      = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $telp        = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $email       = htmlspecialchars($_REQUEST['email'], ENT_QUOTES);
    $jk          = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);
    $level       = htmlspecialchars($_REQUEST['level'], ENT_QUOTES);

    mysqli_query($kon, "INSERT INTO user(username, password, nama, alamat, telp, email, jk, level) VALUES ('$username','$password','$nama','$alamat','$telp','$email','$jk','$level')");
    ?><script>alert('Berhasil Disimpan, Silahkan Login.');window.location = '../index';</script>";<?php
}else if($tabel=='ulasan'){
    $idulasan  = htmlspecialchars($_REQUEST['idulasan'], ENT_QUOTES);
    $idbarang  = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $ulasannya = htmlspecialchars($_REQUEST['ulasannya'], ENT_QUOTES);
    $id        = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO ulasan (idbarang,ulasannya,id) VALUES ('$idbarang','$ulasannya','$id')");
        ?><script>alert('Berhasil Disimpan');window.location = '../ulasan';</script>";<?php
    }
}else if($tabel=='retur'){
    $idretur  = htmlspecialchars($_REQUEST['idretur'], ENT_QUOTES);
    $idbarang = htmlspecialchars($_REQUEST['idbarang'], ENT_QUOTES);
    $alasan   = htmlspecialchars($_REQUEST['alasan'], ENT_QUOTES);
    $id       = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $status   = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);

    $namafile       = $_FILES['file']['tmp_name'];
    $namafoto       = $_FILES['file']['name'];
    $lokasi         = "assets/img/".$_FILES['file']['name'];
    $cekformat      = array('png','jpg','jpeg');
    $x              = explode('.', $namafoto);
    $ekstensi       = strtolower(end($x));

    if($action=='tambah'){
        if(in_array($ekstensi, $cekformat) === true){
            move_uploaded_file($namafile, '../'.$lokasi);
            mysqli_query($kon, "INSERT INTO retur (idbarang,alasan,id,file,status) VALUES ('$idbarang','$alasan','$id','$lokasi','Menunggu')");
            ?><script>alert('Berhasil Disimpan');window.location = '../retur';</script>";<?php
        }else{ 
            ?><script>alert('Gagal Disimpan');window.location = '../pengiriman';</script>";<?php
        }
    }else{
        mysqli_query($kon, "UPDATE retur SET status='$status' WHERE idretur = '$idretur'");
        bebeb('ubah','retur');
    }
}
?>