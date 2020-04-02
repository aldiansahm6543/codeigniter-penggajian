<div class="line"></div>
<section id=" datauser" class="bd-callout bd-callout-info container">
<div class="row mb-2">
    <div class="col">
    <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="modal" data-target="#form_tambah">Tambah data</button>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
    <thead>
        <tr class="thead">
        <th>KODE JABATAN</th>
        <th>JABATAN</th>
        <th>STANDAR GAJI</th>
        <th>KETERANGAN</th>
        <th>AKSI</th>
        </tr>
    </thead>
    <tbody id="jabatan">

    </tbody>
    </table>
</div>
</section>

<!-- modal tambah -->
<div class="modal fade" id="form_tambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Tambah Data</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p id="pesan" class="text-danger text-center"></p>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode_jabatan</label>
                    <input type="text" id="kode_jabatan" readonly value="<?= $kode ?>" name="kode_jabatan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Standar_gaji</label>
                    <input type="text" id="standar_gaji" name="standar_gaji" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control">
                </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="tambahJabatan()">Simpan</button>
        </div>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="form_edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Edit Data</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p id="pesan_edit" class="text-danger text-center"></p>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode_jabatan</label>
                    <input type="text" readonly id="kode_jabatan_edit" name="kode_jabatan_edit" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" id="jabatan_edit" name="jabatan_edit" class="form-control">
                </div>
                <div class="form-group">
                    <label>Standar_gaji</label>
                    <input type="text" id="standar_gaji_edit" name="standar_gaji_edit" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="keterangan_edit" name="keterangan_edit" class="form-control">
                </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateJabatan">Simpan</button>
        </div>
            </div>
        </div>
    </div>
</div>
