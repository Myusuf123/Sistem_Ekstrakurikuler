<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hapus Ketua</h6>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">

                    <?php foreach ($ketua as $k) { ?>
                        <?= form_open('Admin/Dataanggota/hapus_ketua'); ?>


                        <div class="form-group">
                            <label for="username">Nis</label>
                            <input type="hidden" value="<?php echo $k->nis ?>" name="nis">
                            <input type="text" class="form-control" value="<?php echo $k->nis ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama</label>
                            <input type="text" class="form-control" value="<?php echo $k->nama ?>" readonly>
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('Admin/Dataanggota/getketua') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Ketua?')"><i class="fa fa-trash"></i>&nbsp;Hapus Ketua</a></button>

                        </div>
                        <?= form_close(); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>