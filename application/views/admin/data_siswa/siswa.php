<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Seluruh Siswa SMANSAGO</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right"><a href="<?= base_url('Admin/Dataanggota/tambah/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
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
                                    <th scope="col" class="text-center">Nis</th>
                                    <th scope="col" class="text-center">Nama Siswa</th>
                                    <th scope="col" class="text-center">Kelas</th>

                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="6">Total Seluruh Siswa SMAN 1 Purbolinggo = <?php echo ($count['siswa']); ?> </th>
                                </tr>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ketua as $k) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $k['nis']; ?></td>
                                            <td><?= $k['nama']; ?></td>
                                            <td><?= $k['kelas']; ?>&nbsp;<?= $k['nama_jurusan']; ?></td>



                                            <td>
                                                <a href="<?= base_url('Admin/Dataanggota/detailsiswa/' . $k['nis']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>
                                                <a href="<?= base_url('Admin/Dataanggota/edit/' . $k['nis']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                <a href="<?= base_url('Admin/Dataanggota/edit_pw/' . $k['nis']) ?>" class="btn btn-success btn-sm"><i class="fa fa-key"></i>&nbsp;&nbsp;Edit Password</a>
                                                <a href="<?= base_url('Admin/Dataanggota/hapus/' . $k['nis']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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
</div>
<!-- End of Main Content -->