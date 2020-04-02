<div class="row">
      <div class="line"></div>
      <section class="bd-callout bd-callout-info container">
        <form action="<?= base_url('aturan_gaji/tambah'); ?>" method="post">

        <div class="col-lg-6">
            <div class="form-group">
            <label for="kodemapel">Jabatan</label>
            <select class="form-control" name="kode_jabatan">
                <option disabled selected>- Pilih jabatan -</option>
                <?php foreach($jabatan as $j) : ?>
                <option value="<?=$j->kode_jabatan;?>"><?=$j->jabatan;?> - <?= $j->keterangan ?></option>
                <?php endforeach;?>
            </select>
            <?= form_error('kode_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label>Masa kerja (bulan)</label>
            <input type="number" class="form-control" value="<?= set_value('masa_kerja'); ?>" placeholder="masa kerja" name="masa_kerja">
            <?= form_error('masa_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label>Insentif</label>
            <input type="number" class="form-control" value="<?= set_value('insentif'); ?>" placeholder="Insentif" name="insentif">
            <?= form_error('insentif', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label>Bonus</label>
            <input type="number" class="form-control" value="<?= set_value('bonus'); ?>" placeholder="Bonus" name="bonus">
            <?= form_error('bonus', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>

          <button type="submit" class="btn btn-primary ">Simpan</button>

        </form>
      </section>