<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Anggota</h6>
            </div>
            <?php if ($this->session->flashdata('danger')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('danger'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">

                <?= form_open('Admin/Ambil_ekskul/tambah_aksi'); ?>

                <label for="">Jurusan</label>
                <div class="form-group">
                    <select name="nis_s" id="nis_s" class="custom-select">
                        <option value="" selected disabled>Pilih Jurusan</option>
                        <?php foreach ($siswa as $k) : ?>
                            <option <?= set_select('nis_s', $k['nis']) ?> value="<?= $k['nis'] ?>"><?= $k['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jurusan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <label for="">Jenis Ekstrakurikuler</label>
                <div class="form-group">
                    <select name="k_ekskul" id="k_ekskul" class="custom-select">
                        <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                        <?php foreach ($jenis as $j) : ?>
                            <option <?= set_select('k_ekskul', $j['kode_ekskul']) ?> value="<?= $j['kode_ekskul'] ?>"><?= $j['nama_ekskul'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('k_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <label for="">Tahun Ajaran</label>
                <div class="form-group">
                    <select name="ta_id" id="ta_id" class="custom-select">
                        <option value="" selected disabled>Pilih Jurusan</option>
                        <?php foreach ($tahun as $ta) : ?>
                            <option <?= set_select('ta_id', $ta['id_ta']) ?> value="<?= $ta['id_ta'] ?>"><?= $ta['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jurusan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="float-right">
                    <a href="<?= base_url('Admin/Ambil_ekskul') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <?= form_close(); ?>

            </div>
        </div>
    </div>
</div>
</div>