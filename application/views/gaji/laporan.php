<div class="line"></div>
      <?php if($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
			Generate sukses! <a class="text-primary" href="<?= base_url('gaji/laporan') ?>">Lihat</a>
		</div>
      <?php endif; ?>
      <section class="bd-callout bd-callout-info container">
        <div class="row">
            <div class="col">
                <form action="<?= base_url('gaji/laporan') ?>" method="post">
                    <div class="input-group mb-3">
                    <input type="date" name="cari" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="basic-addon2">Lihat</button>
                </div>
                </div>
                </form>
            </div>
            <div class="col justify-content-end d-flex">
                <form action="<?= base_url('gaji/cetak') ?>" method="post" target="_blank">
                    <div class="input-group mb-3">
                    <input type="date" name="cari" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="basic-addon2"><i class="fas fa-print"></i>Cetak</button>
                </div>
                </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>KODE PENGGAJIAN</th>
                <th>TANGGAL PENERIMAAN</th>
                <th>NIP</th>
                <th>NAMA KARYAWAN</th>
                <th>JABATAN</th>
                <th>NOMINAL</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($gaji as $g): ?>
              <tr>
                <td><?= $g->kode_penggajian ?></td>
                <td><?= $g->tanggal_penerimaan ?></td>
                <td><?= $g->nip ?></td>
                <td><?= $g->nama_karyawan ?></td>
                <td><?= $g->jabatan ?></td>
                <td><?= rupiah($g->nominal) ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>