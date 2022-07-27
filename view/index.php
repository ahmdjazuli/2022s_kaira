<?php require('head.php'); hel('Laporan'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rmasuk','Pembelian Barang') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tgl FROM masuk GROUP BY MONTH(tgl) ORDER BY tgl ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tgl']) ?>"><?= bulan($j['tgl']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM masuk ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rrusak','Barang Rusak') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tgl FROM rusak GROUP BY MONTH(tgl) ORDER BY tgl ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tgl']) ?>"><?= bulan($j['tgl']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM rusak ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rtransaksi1','Transaksi Reseller') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tglbeli FROM beli GROUP BY MONTH(tglbeli) ORDER BY tglbeli ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tglbeli']) ?>"><?= bulan($j['tglbeli']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tglbeli) as tahun FROM beli ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rtransaksi2','Transaksi Pelanggan') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tglbeli FROM beli GROUP BY MONTH(tglbeli) ORDER BY tglbeli ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tglbeli']) ?>"><?= bulan($j['tglbeli']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tglbeli) as tahun FROM beli ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rflashsale','Flashsale') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM flashsale GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM flashsale ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rkirim','Pengiriman') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tglbeli FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli GROUP BY MONTH(tglbeli) ORDER BY tglbeli ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tglbeli']) ?>"><?= bulan($j['tglbeli']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tglbeli) as tahun FROM kirim JOIN beli ON kirim.idbeli = beli.idbeli ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rulasan','Ulasan') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM ulasan GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM ulasan ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rpendapatan','Pendapatan') ?>
    <div class="card-body">
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tglbeli) as tahun FROM beli ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rretur','Retur') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM retur GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM retur ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
            </div>
        </div>
    </section>
</div>
<?php require('foot.php') ?>