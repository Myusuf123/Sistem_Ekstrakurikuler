<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Ketua Ekstrakurikuler</h1>
    <hr>

    <div class="card shadow mb-4">

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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nis</th>
                                    <th scope="col" class="text-center">Nama Ketua</th>
                                    <th scope="col" class="text-center">Kelas</th>
                                    <th scope="col" class="text-center">Status</th>

                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="6">Total Ketua Ekstrakurikuler = <?php echo ($count['ketua']); ?> </th>
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
                                            <td><span class="badge alert-warning"><?php echo $k['level']; ?></span></td>

                                            <td>
                                                <a href="<?= base_url('Admin/Dataanggota/hapusket/' . $k['nis']) ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Ketua</a>
                                                <a href="<?= base_url('Admin/Dataanggota/detail_ketua/' . $k['nis']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>

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
<!--End of Main Content -->