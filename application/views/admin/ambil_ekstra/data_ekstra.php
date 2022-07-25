<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Anggota Ekstrakurikuler</h1>
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
       
                    <hr>
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
                                            <a href="<?= base_url('Admin/Ambil_ekskul/getanggota/' . $e->id_ekskul) ?>" class="btn btn-info btn-sm"><i class="fa fa-users"></i>&nbsp;&nbsp;Lihat Anggota</a>

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