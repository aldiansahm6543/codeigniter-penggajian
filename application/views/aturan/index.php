<div class="line"></div>
      <?= $this->session->flashdata('pesan'); ?>
      <section class="bd-callout bd-callout-info container">
        <div class="row mb-2">
            <div class="col">
                <a href="<?=base_url('aturan_gaji/tambah') ?>" class="btn btn-primary btn-sm" >Tambah data</a>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NO</th>
                <th>JABATAN</th>
                <th>KETERANGAN</th>
                <th>MASA KERJA</th>
                <th>INSENTIF</th>
                <th>BONUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($aturan as $a): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $a->jabatan ?></td>
                <td><?= $a->keterangan ?></td>
                <td><?= $a->masa_kerja_jabatan ?> bulan</td>
                <td><?= rupiah($a->insentif) ?></td>
                <td><?= rupiah($a->bonus) ?></td>
                <td><button class="badge btn-warning" onclick="window.location.href='<?= base_url('aturan_gaji/edit/') . $a->id ; ?>'">Update</button>
                    <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus aturan <?= $a->jabatan ?> ?'))window.location.href='<?= base_url('aturan_gaji/hapus/') . $a->id ; ?>' ">Delete</button></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>