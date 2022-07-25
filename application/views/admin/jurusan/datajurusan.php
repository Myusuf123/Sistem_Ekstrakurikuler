<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <div class="col-lg-12">
        <h1 class="h4 mb-4 text-gray-800">Data Jurusan SMANSAGO</h1>
        <hr>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right"><a href="#" data-toggle="modal" data-target="#tambahJurusan" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
            </div>
            <div class="row no-gutters">
                <div class="table-responsive">
                    <?php if ($this->session->flashdata('succses')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('succses'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('primary')) : ?>
                        <div class="alert alert-primary">
                            <?php echo $this->session->flashdata('primary'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Jurusan</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total Jurusan = <?php echo ($count['jurusan']); ?> </th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jurusan as $j) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $j->nama_jurusan ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/Jurusan/edit/' . $j->id_jurusan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                <a href="<?= base_url('Admin/Jurusan/hapus/' . $j->id_jurusan) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                    </div>


                </div>




            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahJurusan" tabindex="-1" role="dialog" aria-labelledby="tambahJurusan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <label><i class="fa fa-info"></i> Informasi</label>
                                <h6>Format Penulisan Jurusan :<br> Menggunakan Huruf Kapital dan Angka <br>
                                    <br><b>Contoh : IPA 1</b>
                                </h6>
                            </div>
                        </div>
                        <?= form_open('Admin/Jurusan/tambah_aksi'); ?>

                        <div class="form-group">
                            <label for="username">Nama Jurusan</label>
                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="">
                            <?= form_error('nama_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->