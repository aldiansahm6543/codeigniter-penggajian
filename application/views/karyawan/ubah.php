<div class="row">
      <div class="line"></div>
      <section class="bd-callout bd-callout-info container">
        <form action="<?= base_url('karyawan/edit/') . $karyawan->nip; ?>" method="post">

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" value="<?= $karyawan->nama; ?>" placeholder="Nama Lengkap" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" value="<?= $karyawan->nip; ?>" placeholder="NIP" name="nip" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                <?php foreach( $jenis_kelamin as $jk ) : ?>
                      <?php if( $jk == $karyawan->jenis_kelamin ) : ?>
                          <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                      <?php else : ?>
                          <option value="<?= $jk; ?>"><?= $jk; ?></option>
                      <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="kodemapel">Jabatan</label>
                <select class="form-control" name="kode_jabatan">
                  <?php foreach($jabatan as $j) : ?>
                      <?php if( $j->jabatan == $karyawan->jabatan ) : ?>
                        <option value="<?= $j->kode_jabatan; ?>" selected><?= $j->jabatan; ?> - <?= $j->keterangan ?></option>
                      <?php else : ?>
                        <option value="<?= $j->kode_jabatan; ?>"><?= $j->jabatan; ?> - <?= $j->keterangan ?></option>
                      <?php endif; ?>
           		 <?php endforeach;?>
                </select>
                <?= form_error('kode_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>tanggal lahir</label>
                <input type="date" class="form-control" value="<?= $karyawan->tgl_lahir; ?>" placeholder="tanggal lahir" name="tgl_lahir">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label>Telpon</label>
                <input type="text" class="form-control" value="<?= $karyawan->telp; ?>" placeholder="telpon" name="telp">
                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?= $karyawan->email; ?>" placeholder="email" name="email">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" value="<?= $karyawan->alamat; ?>" placeholder="alamat" name="alamat">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Masa kerja (bulan)</label>
            <input type="number" class="form-control" value="<?= $karyawan->masa_kerja; ?>" placeholder="masa kerja" name="masa_kerja">
            <?= form_error('masa_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>

          <button type="submit" class="btn btn-primary ">Submit</button>

        </form>
      </section>