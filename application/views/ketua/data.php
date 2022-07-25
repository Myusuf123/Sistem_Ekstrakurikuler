<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Anggota Ekstrakurikuler</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right"><a href="<?= base_url('Admin/Ambil_ekskul/tambah/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
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

                <form method="get" action="<?php echo base_url("Admin/Dataanggota/cari") ?>">
                    <div class="col-md-2" align="center">Jenis Ekstrakurikuler
                        <select class="form-control" name="k_ekskul" id="k_ekskul">
                            <option value="semua" selected disabled>Semua</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option <?= set_select('k_ekskul', $j['kode_ekskul']) ?> value="<?= $j['kode_ekskul'] ?>"><?= $j['nama_ekskul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn btn-primary btn-sm"> <i class="fa fa-search"></i>&nbsp;&nbsp;Cari</button>
                    <a href="<?= base_url('Admin/Dataanggota/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Semua</a>


                </form>

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
                                    <th scope="col" class="text-center">masa</th>
                                    <th scope="col" class="text-center">Tahun Ajaran</th>
                                    <th scope="col" class="text-center">Status</th>

                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="7">Total Anggota Ekstrakurikuler = <?php echo ($count['anggota']); ?> </th>
                                </tr>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mengambil as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nis']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['nama_ekskul']; ?></td>
                                            <td><?= $row['kelas']; ?>&nbsp;<?= $row['nama_jurusan']; ?></td>

                                            <td><?= $row['masa']; ?></td>
                                            <td><?= $row['tahun']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/Dataanggota/detail/' . $row['id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>
                                                <a href="<?= base_url('Admin/Dataanggota/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                <a href="<?= base_url('Admin/Ambil_ekskul/hapus/' . $row['id']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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