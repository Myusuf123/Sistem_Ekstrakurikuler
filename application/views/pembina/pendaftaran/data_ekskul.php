<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Pendaftaran Ekstrakurikuler</h1>
    <hr>

    <div class="card shadow mb-4">


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



                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Ekstrakurikuler</th>
                                    <th scope="col" class="text-center">Periode/Tahun Ajaran</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($ekskul as $e) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $e->nama_ekskul ?></td>
                                        <td><?php echo $e->tahunajaran ?></td>
                                        <td>
                                            <a href="<?= base_url('pembina/p_pendaftaran/getpendaftaran/' . $e->id_ekskul) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Lihat Pendaftar</a>

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