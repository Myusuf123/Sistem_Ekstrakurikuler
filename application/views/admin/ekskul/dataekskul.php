<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <div class="col-lg-12">
        <h1 class="h4 mb-4 text-gray-800">Data Ekstrakurikuler SMANSAGO</h1>
        <hr>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right"><a href="<?= base_url('Admin/Dataekskul/tambah/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
            </div>
            <div class="row no-gutters">
                <div class="table-responsive">
                    <?php if ($this->session->flashdata('succses')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('succses'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('danger'); ?>
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
                                        <th scope="col" class="text-center">Nama Ekstrakurikuler</th>
                                        <th scope="col" class="text-center">Nama Pembina</th>
                                        <th scope="col" class="text-center">Periode</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total Ekstrakurikuler =<?php echo ($count['ekskul']); ?> </th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ekskul as $e) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $e['nama_ekskul'] ?></td>
                                                <td><?php echo $e['nama_g'] ?></td>
                                                <td><?php echo $e['tahunajaran'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/Dataekskul/edit/' . $e['id_ekskul']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                    <a href="<?= base_url('Admin/Dataekskul/hapus/' . $e['id_ekskul']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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
</div>
<!-- End of Main Content -->