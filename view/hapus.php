<?php
	session_start();
	error_reporting(1);
	require("../kon.php"); 
	require('config.php');
	//user
	if (isset($_GET['id'])) {
		mysqli_query($kon, "DELETE FROM user WHERE id='$_REQUEST[id]'"); 
		bebeb('hapus','pengguna');
	//pengeluaran
	}else if(isset($_GET['idpengeluaran'])) {
		mysqli_query($kon, "DELETE FROM pengeluaran WHERE idpengeluaran='$_REQUEST[idpengeluaran]'"); 
		bebeb('hapus','pengeluaran');
	//kurir
	}else if(isset($_GET['idkurir'])) {
		mysqli_query($kon, "DELETE FROM kurir WHERE idkurir='$_REQUEST[idkurir]'"); 
		bebeb('hapus','kurir');
	//ongkir
	}else if(isset($_GET['idongkir'])) {
		mysqli_query($kon, "DELETE FROM ongkir WHERE idongkir='$_REQUEST[idongkir]'"); 
		bebeb('hapus','ongkir');
	//barang
	}else if(isset($_GET['idbarang'])) {
		$query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang='$_REQUEST[idbarang]'");
		$row = mysqli_fetch_array($query); unlink('../'.$row['gambar']);
		mysqli_query($kon, "DELETE FROM barang WHERE idbarang='$_REQUEST[idbarang]'"); 
		bebeb('hapus','barang');
	//masuk
	}else if(isset($_GET['idmasuk'])) {
		mysqli_query($kon, "DELETE FROM masuk WHERE idmasuk='$_REQUEST[idmasuk]'"); 
		bebeb('hapus','masuk');
	//rusak
	}else if(isset($_GET['idrusak'])) {
		mysqli_query($kon, "DELETE FROM rusak WHERE idrusak='$_REQUEST[idrusak]'"); 
		bebeb('hapus','rusak');
	//beli
	}else if (isset($_GET['idbeli']) AND $_GET['j'] == '1') {
		mysqli_query($kon, "DELETE FROM beli WHERE idbeli='$_REQUEST[idbeli]'"); 
		bebeb('hapus','transaksi1');
	//alumnus
	}else if (isset($_GET['idbeli']) AND $_GET['j'] == '2') {
		mysqli_query($kon, "DELETE FROM beli WHERE idbeli='$_REQUEST[idbeli]'"); 
		bebeb('hapus','transaksi2');
	//flashsale
	}else if(isset($_GET['flashsale'])) {
		mysqli_query($kon, "DELETE FROM flashsale WHERE flashsale='$_REQUEST[flashsale]'"); 
		bebeb('hapus','flashsale');
	}
?>