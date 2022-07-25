<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">

                    <?= form_open('Admin/Dataanggota/tambah_aksi'); ?>
                    <div class="form-group">
                        <label for="nama">Nis</label>
                        <input type="text" class="form-control col-lg-7" id="nis" placeholder="" name="nis">
                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="username">Nama Siswa</label>
                        <input type="text" class="form-control col-lg-7" id="nama" name="nama" placeholder="">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">

                        <div class="form-group col-lg-4">
                            <label for="">Kelas</label>
                            <select name="kelas" id="kelas" class="custom-select">
                                <option value="" selected disabled>Pilih Kelas</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group col-lg-4">
                            <label for="">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Jurusan</option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option <?= set_select('jurusan_id', $j['id_jurusan']) ?> value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('jurusan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>




                    <div class="float-right">
                        <a href="<?= base_url('Admin/Dataanggota/siswa') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>