<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>

<form method="POST" action=" /petugas/tanggapan ">
<div class="form-group">
<input type="hidden" name="txtId" class="form-control" value="<?=$detail[0]['id_pengaduan'];?>" readonly >
<label class="font-weight-bold">NIK  : </label>
<label class="font-weight-bold"><?=$detail[0]['nik'];?></label>
<br>
<label class="font-weight-bold">Dari: </label>
<label class="font-weight-bold"><?=$detail[0]['nama'];?></label>
<br>
<label class="font-weight-bold">Tanggal Masuk: </label>
<label class="font-weight-bold"><?=$detail[0]['tgl_pengaduan'];?></label>
<br>
<label class="font-weight-bold">Foto  Kejadian : </label>
<img src="/uploads/<?= $detail[0]['foto']; ?>" width="100">
<br>
<label class="font-weight-bold">Foto  Kejadian : </label>
<img src="/uploads1/<?= $detail[0]['foto1']; ?>" width="100">


</div>
<div class="form-group">
<label class="font-weight-bold">Laporan Pengaduan</label>
<textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" readonly><?=$detail[0]['isi_laporan'];?>
</textarea>
</div>
<div class="form-group">
<label class="font-weight-bold">Status</label>
<?php 
    if($detail[0]['status']=="proses"){ ?>

<select name="selectStatus" class="form-control">
<option <?=$detail[0]['status']=='ditolak' ?
'selected':null;?> value="ditolak">Ditolak</option>
<option <?=$detail[0]['status']=='proses' ?
'selected':null;?> value="proses">Proses</option>
<option <?=$detail[0]['status']=='selesai' ?
'selected':null;?> value="selesai">Selesai</option>


<?php	} else if($detail[0]['status']=="ditolak"){?>
    <br>
    <label class="font-weight-bold">Ditolak</label>
<?php	} else{?>
    <br>
    <label class="font-weight-bold">Selesai</label>
    <?php	}?>   
</select>
</div>
<div class="form-group">
<?php 
    if($detail[0]['status']=="proses"){ ?>
	    <label for="area">Tanggapan</label>
        <br>
		<textarea id="area" name="tanggapan" class="form-control" rows="5" "></textarea>
<?php	}?>
<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
</div>
<?php 
    if($detail[0]['status']=="proses"){ ?>
<div class="form-group">
<button class="btn btn-danger"> Simpan </button>
</div>
<?php	}?>
</form>


<?= $this->endSection() ?>