<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Prestasi Ekstrakurikuler</h6>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <?= form_open('Admin/C_prestasi/tambah_aksi'); ?>

                    <label for="">Jenis Ekstrakurikuler</label><br>
                    <div class="form-group">
                        <select name="ekskull_id" id="ekskull_id" class="custom-select col-lg-6">
                            <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option <?= set_select('ekskull_id', $j['id_ekskul']) ?> value="<?= $j['id_ekskul'] ?>"><?= $j['nama_ekskul'] ?> (<?= $j['tahunajaran'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('ekskull_id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label> Tanggal Perlombaan</label>
                        <input type="date" name="tgl_lomba" class="form-control col-lg-6">
                        <?= form_error('tgl_lomba', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="username">deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder=""></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="float-right">
                        <a href="<?= base_url('Admin/C_prestasi') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>