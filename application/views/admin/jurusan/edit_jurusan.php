<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Jurusan</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($jurusan as $j) { ?>
                        <?= form_open('Admin/Jurusan/update'); ?>


                        <div class="form-group">
                            <label for="username">Nama Jurusan</label>
                            <input type="hidden" value="<?php echo $j->id_jurusan ?>" id="id_jurusan" name="id_jurusan">
                            <input type="text" class="form-control col-lg-5" id="nama_jurusan" value="<?php echo $j->nama_jurusan ?>" name="nama_jurusan" placeholder="">
                        </div>

                        <div class="float-right">
                            <a href="<?= base_url('Admin/Jurusan') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
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