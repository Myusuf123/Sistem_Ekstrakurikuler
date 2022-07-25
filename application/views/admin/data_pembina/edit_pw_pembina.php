<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Password Pembina Ekstrakurikuler</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pembina as $p) { ?>
                        <?= form_open('Admin/Datapembina/update_pass'); ?>


                        <div class="form-group">
                            <label for="username">Password Baru</label>
                            <input type="hidden" value="<?php echo $p->nip ?>" id="nip" name="nip">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Silakan Isi Password Baru">
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