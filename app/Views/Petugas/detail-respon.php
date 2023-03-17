<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>

<form  action=" /petugas/respon ">
<div class="form-group">
<label class="font-weight-bold">NIK  : </label>
<label class="font-weight-bold"><?=$detail[0]['nik'];?></label>
<br>
<label class="font-weight-bold">Dari: </label>
<label class="font-weight-bold"><?=$detail[0]['nama'];?></label>
<br>
<label class="font-weight-bold">Petugas: </label>
<label class="font-weight-bold"><?=$detail[0]['nama_petugas'];?></label>
<br>
<label class="font-weight-bold">Tanggal Masuk: </label>
<label class="font-weight-bold"><?=$detail[0]['tgl_pengaduan'];?></label>
<br>
<label class="font-weight-bold">Tanggal Ditanggapi: </label>
<label class="font-weight-bold"><?=$detail[0]['tgl_tanggapan'];?></label>
<br>
<label class="font-weight-bold">Foto Kejadian: </label>
<img src="/uploads/<?= $detail[0]['foto'] ?>" width="100">
<img src="/uploads/<?= $detail[0]['foto1'] ?>" width="100">
<br>
</div>
<div class="form-group">
<label class="font-weight-bold">Laporan Pengaduan</label>
<textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" readonly><?=$detail[0]['isi_laporan'];?>
</textarea>
</div>
<div class="form-group">
<label class="font-weight-bold">Respon</label>
<textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" readonly><?=$detail[0]['isi_tanggapan'];?>
</textarea>
</div>

<div class="form-group">
<button class="btn btn-danger" onclick="goBack()">Kembali</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</div>
</form>


<?= $this->endSection() ?>