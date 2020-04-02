<div class="line"></div>
      <?php if($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
			Generate sukses! <a class="text-primary" href="<?= base_url('gaji/laporan') ?>">Lihat</a>
		</div>
      <?php endif; ?>
      <section class="bd-callout bd-callout-info container">
        <div class="row">
            <div class="col-4">
                <form action="<?= base_url('gaji') ?>" method="post">
                    <div class="input-group mb-3">
                    <select class="form-control" name="cari" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <option disabled selected>- Pilih jabatan -</option>
                        <?php foreach($jabatan as $j) : ?>
                        <option value="<?=$j->kode_jabatan;?>"><?=$j->jabatan;?> - <?= $j->keterangan ?></option>
                        <?php endforeach;?>
                    </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="basic-addon2">Lihat</button>
                </div>
                </form>
            </div>
        </div>
        <?php if(isset($karyawan)): ?>
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NIP</th>
                <th>NAMA KARYAWAN</th>
                <th>MASA KERJA</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($karyawan as $k): ?>
              <tr>
                <td><?= $k->nip ?></td>
                <td><?= $k->nama ?></td>
                <td><?= $k->masa_kerja ?> bulan</td>
                <td><button class="btn btn-sm btn-success" onclick="window.location.href='<?= base_url('gaji/generate/') . $k->nip ; ?>'">Generate gaji</button></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php endif; ?>
      </section>