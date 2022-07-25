<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center mt-12">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pembina Ekstrakurikuler</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_open_multipart('Profile/updatepw_guru'); ?>
                                <div class="form-group">
                                    <label class="col-sm-10">Password Baru</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="pw_baru" name="pw_baru" placeholder="Isi Password">
                                        <?= form_error('pw_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-10">Konfirmasi Password Baru</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"  id="konfir_pw" name="konfir_pw" placeholder="Ulangi Password">
                                        <?= form_error('konfir_pw', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row col-sm-10">
                                
                                <div class="form-group col-mt-4 justify-content-end ">
                                    <div class="col-sm-12">
                                    <div class="float-left">
                                        <a href="<?= base_url('Profile') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-tags"></i>
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <?= form_close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>