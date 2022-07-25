<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pembina Ekstrakurikuler</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pembina as $p) { ?>
                        <?= form_open('Admin/Datapembina/update'); ?>

                        <div class="row form-group">
                            <label for="nama" class="col-md-4 text-md-right ">Nip</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control " id="nip" readonly value="<?php echo $p->nip ?>" name="nip">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="row form-group">
                            <label for="username" class="col-md-4 text-md-right ">Nama Pembina</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control " id="nama_g" name="nama_g" value="<?php echo $p->nama_g ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <label for="username" class="col-md-4 text-md-right ">No. Telp</label>
                            <div class="col-lg-7">
                                <input type="number" class="form-control " id="nohp" name="nohp" value="<?php echo $p->nohp ?>">
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('Admin/Datapembina') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
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