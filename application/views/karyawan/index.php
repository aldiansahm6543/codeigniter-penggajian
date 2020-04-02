      <div class="line"></div>
      <?= $this->session->flashdata('pesan'); ?>
      <section class="bd-callout bd-callout-info container">
        <div class="row mb-2">
            <div class="col">
            <a href="<?=base_url('karyawan/tambah') ?>" class="btn btn-primary btn-sm" >Tambah data</a>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NO</th>
                <th>NIP</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>TGL LAHIR</th>
                <th>TELPON</th>
                <th>EMAIL</th>
                <th>ALAMAT</th>
                <th>JABATAN</th>
                <th>MASA KERJA</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($karyawan as $k): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $k->nip ?></td>
                <td><?= $k->nama ?></td>
                <td><?= $k->jenis_kelamin ?></td>
                <td><?= $k->tgl_lahir ?></td>
                <td><?= $k->telp ?></td>
                <td><?= $k->email ?></td>
                <td><?= $k->alamat ?></td>
                <td><?= $k->jabatan ?></td>
                <td><?= $k->masa_kerja ?> bulan</td>
                <td><button class="badge btn-warning" onclick="window.location.href='<?= base_url('karyawan/edit/') . $k->nip ; ?>'">Update</button>
                    <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus <?= $k->nama ?> ?'))window.location.href='<?= base_url('karyawan/hapus/') . $k->nip ; ?>' ">Delete</button></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>