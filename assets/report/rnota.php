<?php require('../../kon.php'); require('../../view/config.php'); session_start(); 
	date_default_timezone_set('Asia/Kuala_Lumpur');
	$level      = $_SESSION['level'];
  $username   = $_SESSION['username'];
  $query      = mysqli_query($kon,"SELECT * FROM user WHERE level='$level' AND username = '$username'");
  $memori       = mysqli_fetch_array($query);
  $_SESSION['id'] = $memori['id'];
	$idbeli 		= $_REQUEST['idbeli'];

	$result = mysqli_query($kon, "SELECT * FROM beliproduk WHERE idbeli = '$idbeli'");
	$info = mysqli_query($kon, "SELECT * FROM beli INNER JOIN user ON beli.id = user.id WHERE idbeli = '$idbeli'"); 
	$data = mysqli_fetch_array($info);
beo(); ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h3 style="text-align: center;">Cetak Nota Pembayaran</h3>
<h4 style="text-align: center;">No. Transaksi : <?= $data['idbeli'] ?></h4>
<h5 class="text-center">
</h5>
<div style="width:50%;float:left;margin-left: 20px;">
		<h4 style="font-weight: bold;">Info Pembeli <?php if($memori['level']=='reseller'){
			echo "(Reseller)"; }else{echo "(Pelanggan)";} ?></h4>
		<label style="font-weight: normal;">Tanggal : <?= ht($data['tglbeli'],true)?></label><br>
		<label style="font-weight: normal;">Nama : <?= $data['nama'] ?></label><br>
		<label style="font-weight: normal;">Telp : <?= $data['telp'] ?></label><br>
	</div>
	<div style="width:40%;float:right;">
		<h4 style="font-weight: bold;">Pengiriman</h4>
		<label style="font-weight: normal;">Tujuan : <?= $data['namakota'] ?></label><br>
		<label style="font-weight: normal;">Alamat : <?= $data['alamat'] ?></label><br>
	</div>
</div>
<div class="container">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th> No </th>
        <th> Nama Produk </th>
				<th> Harga </th>
				<th> Jumlah </th>
				<th> Sub Harga </th>
      </tr>
    </thead>
<?php 
$i = 1;$totalbelanja = 0;
while( $row = mysqli_fetch_array($result) ) :
$subharga = $row['harganya']*$row['jumlah']; ?>
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= $row['namanya'] ?></td>          
	  <td>Rp. <?= number_format($row['harganya'],0,',','.') ?> </td>
		<td><?= $row['jumlah'] ?> </td>
		<td>Rp. <?= number_format($row['subharga'],0,',','.') ?></td>
</tr>
<?php $totalbelanja+=$subharga; endwhile; ?>
<tr>
	<td class="text-center" colspan="4">Sub Total</td>
	<td class="text-center">Rp. <?= number_format($totalbelanja,0,',','.') ?></td>
</tr>
<tr>
	<td class="text-center" colspan="4">Biaya Ongkir</td>
	<td class="text-center">Rp. <?= number_format($data['tarifnya'],0,',','.') ?></td>
</tr>
<tr>
	<td class="text-center" style="font-weight: bold; background-color: #f1f1f1 !important;" colspan="4">Total Pembayaran</td>
	<td class="text-center" style="font-weight: bold; background-color: #f1f1f1 !important;">Rp. <?= number_format($totalbelanja+$data['tarifnya'],0,',','.') ?></td>
</tr>
  </table>
</div>
<br><br><br>
<script>
	 window.print();
</script> 	
</body>
</html>