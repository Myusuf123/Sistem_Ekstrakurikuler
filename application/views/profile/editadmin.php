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
                            <?= form_open_multipart('Profile/updateadmin'); ?>
                            <?php foreach ($prof as $p) { ?>
                                <div class="form-group">
                                    <label class="col-sm-10">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $guru['nip']; ?>" id="nip" name="nip" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-10">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $guru['nama_g']; ?>" id="nama" name="nama">

                                    </div>
                                </div>
                 

                                <div class="form-group">
                                    <label class="col-sm-10">No Telpon/WA</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" value="<?= $guru['nohp']; ?>" id="nohp" name="nohp">

                                    </div>
                                </div>

                                <div class="row col-sm-10">
                                    <label class="col-sm-10">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/profile/') . $guru['foto_g']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div>
                                                    <input type="file" id="foto" name="foto">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-mt-4 justify-content-end ">
                                    <div class="col-sm-12">
                                        <div class="float-left">
                                        <a href="<?= base_url('Profile/Admin') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>