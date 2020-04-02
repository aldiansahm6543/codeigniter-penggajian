<div class="row">
      <div class="line"></div>
      <section class="bd-callout bd-callout-info container">
        <form action="<?= base_url('gaji/generate/') . $karyawan->nip; ?>" method="post">
        <div class="col-lg-2">
        <div class="form-group">
            <label>Kode_penggajian</label>
            <input type="text" class="form-control" readonly value="<?= $kode ?>" name="kode_penggajian">
          </div>
        </div>
    <label class="text-info mt-1">Detail karyawan</label>
    <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="form-group">
            <label>Nama karyawan</label>
            <input type="text" class="form-control" readonly value="<?= $karyawan->nama ?>" name="nama_karyawan">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" readonly value="<?= $karyawan->nip ?>" name="nip">
          </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" readonly value="<?= $karyawan->jabatan ?>" name="jabatan">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" readonly value="<?= $karyawan->keterangan ?>" name="Keterangan">
          </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="form-group">
            <label>Masa kerja</label>
            <input type="text" class="form-control" value="<?= $karyawan->masa_kerja ?> bulan" readonly>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label>Standar_gaji</label>
            <input type="text" class="form-control" readonly value="<?= $karyawan->standar_gaji ?>" name="standar_gaji">
          </div>
        </div>
    </div>
    <br>
    <label class="text-info">Aturan gaji</label>
    <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="form-group">
            <label>Insentif</label>
            <?php if ($karyawan->masa_kerja >= $karyawan->masa_kerja_jabatan) {
                $insentif = $karyawan->insentif;
                $bonus = $karyawan->bonus;
            } else {
                $insentif = 0;
                $bonus = 0;
            } 
            $total_gaji = $insentif + $bonus + $karyawan->standar_gaji;
            ?>
            <input type="text" class="form-control" value="<?= $insentif ?>" name="insentif" readonly>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label>Bonus</label>
            <input type="text" class="form-control" value="<?= $bonus ?>" name="bonus" readonly>
          </div>
        </div>
    </div>
    <div class="row justify-content-center">
    </div>

        <div class="col-lg-6 mt-1">
          <div class="form-group">
            <label>Total gaji</label>
            <input type="text" class="form-control" value="<?= $total_gaji ?>" name="nominal" readonly>
          </div>
          <button type="submit" class="btn btn-primary ">Generate</button>
        </div>


        </form>
      </section>