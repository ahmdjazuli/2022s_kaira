<?php 
session_start(); require_once("kon.php");
$username 	= $_REQUEST['username'];
$password	= $_REQUEST['password'];

	$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND password = '$password'");
	$cek  = mysqli_fetch_array($query);
	$kurirku = mysqli_query($kon, "SELECT * FROM kurir WHERE username='$username' AND password = '$password'");
	$yasin  = mysqli_fetch_array($kurirku);

	if($cek['level'] == 'admin'){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['id']       = $cek['id'];
		$_SESSION['nama']     = $cek['nama'];
		$_SESSION['level']    = "admin";
		header("location:view/index");
	}else if($cek['level'] == 'pelanggan'){
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $cek['id'];
		$_SESSION['level'] = "pelanggan";
		header("location:index");
	}else if($cek['level'] == 'reseller'){
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $cek['id'];
		$_SESSION['level'] = "reseller";
		header("location:index");
	}else if(mysqli_num_rows($kurirku) > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['idkurir']  = $yasin['idkurir'];
		$_SESSION['nama']     = $yasin['namakurir'];
		$_SESSION['level']    = "kurir";
		header("location:view/kirim");
	}else{
		?><script>alert('Gagal Login');window.location="index"; </script><?php
	}				
?>