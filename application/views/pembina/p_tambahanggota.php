<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pembina</h6>
            </div>
            <?php if ($this->session->flashdata('danger')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('danger'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">

                <?= form_open('pembina/p_dataanggota/tambah_aksi'); ?>
                <div class="form-group">
                    <label for="nama">Nis</label>
                    <input type="text" class="form-control" id="nis" placeholder="" name="nis">
                </div>

                <div class="form-group">
                    <label for="username">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>

                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                </div>


                <div class="form-group">
                    <label for="username">Jenis Ekstrakurikuler</label>
                    <input readonly type="text" value="<?php echo $this->session->userdata('ses_kode'); ?>" class="form-control" id="k_ekskul" name="k_ekskul" placeholder="">
                </div>

                <label for="">Level</label>
                <div class="form-group">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="anggota" value="anggota" checked="">
                        <label class="form-check-label">Anggota</label>
                    </div>
                </div>



                <div class="float-right">
                    <a href="<?= base_url('Admin/Datapembina') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <?= form_close(); ?>


            </div>
        </div>
    </div>
</div>
</div>