<div class="container-fluid">
    <div class="card shadow p-5 col-lg-7 text mx-auto">
        <form action="<?= base_url('admin/biodata'); ?>" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" class="form-control form-control-user" name="nama" id="Nama" placeholder="Nama">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control form-control-user" name="nis" id=" NIS" placeholder="NIS">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>KELAS</label>
                <input type="text" class="form-control form-control-user" name="kelas" id="Kelas" placeholder="Kelas">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control form-control-user" name="tgl_lahir" id="tanggal_lahir" placeholder="Tanggal_lahir">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" id="Alamat" placeholder="Alamat" rows="3"></textarea>
            <div class="form-group">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <br>
                        <label class="radio-inline">
                            <input type="radio" id="inlineradio" name="jenis_kelamin" value="Pria">Pria
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="inlineradio" name="jenis_kelamin" value="Wanita">Wanita
                        </label>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama">
                            <option value="Islam">ISLAM</option>
                            <option value="Kristen">KRISTEN</option>
                            <option value="Katholik">KATHOLIK</option>
                            <option value="Hindu">HINDU</option>
                            <option value="Budha">BUDHA</option>
                            <option value="Konghucu">KONGHUCU</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <small class="text-primary">*Submit untuk menyimpan.</small>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <button class="btn btn-secondary btn-sm p-2" type="reset">RESET</button>
                        <button class="btn btn-primary btn-sm p-2" type="submit">SUBMIT</button>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </form>
    </div>

</div>