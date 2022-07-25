<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Anggota <?= $namaekskul['nama_ekskul'] ?></h1>
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
                <br>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= base_url('Admin/Ambil_ekskul/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                                    <th colspan="8">Total Anggota <?= $namaekskul['nama_ekskul'] ?> = <?php echo $total_ekskul ?> </th>
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
                                                if ($row['status'] == 'Ketua') { ?>
                                                    <span class="badge alert-warning"><?= $row['jabatan'] ?></span>
                                                <?php } else { ?>
                                                    <span class="badge alert-info"><?= $row['jabatan'] ?></span>
                                                <?php } ?>

                                            </td>
                                            <td><?= $row['tahunajaran'] ?></td>
                                            <td>

                                                <a href="<?= base_url('Admin/Ambil_ekskul/hapus/' . $row['id_pendaftaran']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Anggota</a>
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