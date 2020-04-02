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
<script>window.print();</script>