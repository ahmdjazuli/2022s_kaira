<?php require('head.php'); hel('Grafik'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12"><?php gaho('#','Laba Kotor (Transaksi Reseller dan Pelanggan)') ?>
    <div class="card-body"><canvas id="graph" height="200"></canvas>
</div></div>
</form></div>
<div class="col-lg-12 col-md-12 col-sm-12"><?php gaho('#','Laba Bersih (Laba Kotor - [Pembelian Barang + Barang Rusak + Pengeluaran Lainnya])') ?>
    <div class="card-body"><canvas id="graphs" height="200"></canvas>
</div></div>
</form></div>
            </div>
        </div>
    </section>
</div>
<?php require('foot.php') ?>
<?php require('graph.php') ?>