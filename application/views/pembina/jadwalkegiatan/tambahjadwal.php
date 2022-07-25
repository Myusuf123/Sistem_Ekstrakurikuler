<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal Ekstrakurikuler</h6>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <?= form_open('Pembina/P_jadwal/tambah_aksi'); ?>

                    <div class="form-group">
                        <label for="">Jenis Ekstrakurikuler</label><br>
                        <select name="id_ekskull" id="id_ekskull" class="custom-select col-lg-6">
                            <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option <?= set_select('id_ekskull', $j['id_ekskul']) ?> value="<?= $j['id_ekskul'] ?>"><?= $j['nama_ekskul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_ekskull', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label> Tanggal</label>
                            <input type="date" name="tgl" class="form-control">
                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="username">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="">
                            <?= form_error('jam_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="username">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="">
                            <?= form_error('jam_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Tempat Latihan</label>
                        <input type="text" class="form-control  col-lg-8" id="lokasi" name="lokasi" placeholder="">
                        <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder=""></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="float-right">
                        <a href="<?= base_url('Pembina/P_jadwal') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>