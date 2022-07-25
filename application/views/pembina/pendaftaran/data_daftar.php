<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Pendaftaran Ekstrakurikuler <?= $namaekskul['nama_ekskul'] ?></h1>
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
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <br>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= base_url('Pembina/P_pendaftaran/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
               
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nis</th>
                                    <th scope="col" class="text-center">Nama Siswa</th>
                                    <th scope="col" class="text-center">Jenis Ekskul</th>
                                    <th scope="col" class="text-center">Kelas</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Periode/Tahun Ajaran</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="9">Total Pendaftar <?= $namaekskul['nama_ekskul'] ?> = <?php echo $total_pendaftar ?> </th>
                                </tr>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mengambil as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nis'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nama_ekskul'] ?></td>
                                            <td><?= $row['kelas'] ?>&nbsp;<?= $row['nama_jurusan'] ?></td>
                                            <td><?php
                                                if ($row['status'] == 'Diproses') { ?>
                                                    <span class="badge alert-danger"><?= 'Belum Diterima' ?></span>
                                                <?php } elseif ($row['status'] == 'Ditolak') { ?>
                                                    <span class="badge alert-danger"><?= $row['status'] ?></span>
                                                <?php } else { ?>
                                                    <span class="badge alert-success"><?= $row['status'] ?></span>
                                                <?php }
                                                ?>

                                            </td>
                                            <td><?= $row['tahunajaran'] ?></td>
                                
                                            <td>
                                                <?php
                                                if ($row['status'] == 'Diterima' || $row['status'] == 'Ditolak') { ?>
                                                    <a href="<?= base_url('Admin/Datapembina/edit/' . $row['id_pendaftaran']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('Pembina/P_pendaftaran/acc/' . $row['id_pendaftaran']) ?>" onclick="return confirm('Apakah Yakin Diterima?')" class="btn btn-success btn-sm"><i class="fa fa-check"></i>&nbsp;&nbsp;TERIMA</a>
                                                    <a href="<?= base_url('Pembina/P_pendaftaran/ditolak/' . $row['id_pendaftaran']) ?>" onclick="return confirm('Apakah Yakin Ditolak?')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp;TOLAK</a>
                                                <?php } ?>

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