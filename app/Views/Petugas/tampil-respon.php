<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Hasil Respon Pengaduan Masyarakat</h2>
<table class="table table-sm table-hovered">
<tr>
<th>No</th>
<th>Nik</th>
<th>Nama</th>
<th>Petugas</th>
<th>Tanggal Masuk</th>
<th>Tanggal Ditanggapi</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach($ListTanggapan as $key => $row): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['nama_petugas'] ?></td>
                                <td><?= $row['tgl_pengaduan'] ?></td>
                                <td><?= $row['tgl_tanggapan'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/pengaduan/tampilrespon/<?= $row['id_tanggapan']?>" class="btn btn-danger btn-sm"><i class="fas fa-info-circle"> Detail </i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>

                            
</tbody>
</table>
<?= $this->endSection() ?>