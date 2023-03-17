<?=$this->extend('dashboard');?>
<?=$this->section('content');?>
<h2>Laporan Pengaduan Masyarakat Desa Tundagan</h2>
<p>Untuk menampilkan laporan Pengaduan Masyarakat Desa Tundagan, silahkan masukan tanggal pengaduan.</p>

    <div class="form-group">
    <label class="font-weight-bold">Tanggal Pengaduan</label>
        <div class="input-group">
            <input type="date" class="form-control" id="txtTglPengaduan" autofocus autocomplete="off">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger" id="tampilLaporan">Tampilkan</button>
            </div>
        </div>
    </div>

<div id="hasilCariLaporan">
</div>
<?=$this->endSection();?>
