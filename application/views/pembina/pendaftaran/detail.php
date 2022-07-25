<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($ketua as $k) { ?>
                        <?= form_open('Admin/Dataanggota/update'); ?>

                        <div class="form-group">
                            <label for="username">NIS</label>
                            <input type="hidden" value="<?php echo $k->nis ?>" id="nis" name="nis">
                            <input type="text" class="form-control col-lg-7" value="<?php echo $k->nis ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama Siswa</label>

                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->nama ?>" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">Jenis Ekstrakurikuler</label>

                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->nama_ekskul ?>" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">Kelas</label>

                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->kelas ?>&nbsp;<?php echo $k->jurusan ?>" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">Periode/Tahun Ajaran</label>

                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->nama ?>" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">telah Terdaftar</label>

                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->nama ?>" name="nama" placeholder="">
                        </div>



                        <div class="float-right">
                            <a href="<?= base_url('Admin/Dataanggota/siswa') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>

                        </div>
                        <?= form_close(); ?>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>
</div>