<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <label><B>Data Ekstrakurikuler</B></label>
            </div>
            <div class="card-body">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label><b>Nis : </b><?php echo $users['nis']; ?></label>
                            <br> <label><b>Nama : </b><?php echo $users['nama']; ?></label>
                            <br> <label><b>No Telpon : </b><?php echo $users['no_telp']; ?></label>
                            <br> <label><b>Kelas : </b><?php echo $users['kelas']; ?> <?php echo $users['nama_jurusan']; ?></label>
                            <br>

                        </div>
                        <div class="col-md-5">

                            <label><b>Total Ekstrakurikuler Yang Di Ikuti : </b>
                                <font color="red"><?php echo $total_ekskul; ?></font>/2
                            </label>

                        </div>
                    </div>
                    <br>
                    <?php if (empty($ambil)) : ?>
                        <div class="alert alert-danger">
                            Anda Belum Terdaftar Eksktrakurikuler
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Ekstrakurikuler</th>
                                    <th scope="col" class="text-center">Periode</th>
                                    <th scope="col" class="text-center">Tanggal Daftar</th>
                                    <th scope="col" class="text-center">Jabatan</th>
                                    <th scope="col" class="text-center">Status</th>


                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($ambil as $m) {
                                ?>
                                    <?php $date = date_create($m->tgl_daftar);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $m->nama_ekskul ?></td>
                                        <td><?php echo $m->tahunajaran ?></td>
                                        <td><?php echo $new_date ?></td>


                                        <td><?php
                                            if ($m->status == "Diterima" || $m->status == "Selesai") { ?><?php echo $m->jabatan ?><?php } else { ?>
                                            <?php echo 'Belum Ada' ?>
                                        <?php } ?>
                                        </td>


                                        <td><?php
                                            if ($m->status == 'Diterima') { ?>
                                                <span class="badge alert-info"><?php echo $m->status ?></span>
                                            <?php } elseif ($m->status == 'Ditolak') { ?>
                                                <span class="badge alert-danger"><?php echo $m->status ?></span>
                                            <?php } elseif ($m->status == 'Selesai') { ?>
                                                <span class="badge alert-dark"><?php echo $m->status ?></span>
                                            <?php } else { ?>
                                                <span class="badge alert-warning"><?php echo $m->status ?></span>
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

    <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h1 class="h4 mb-4 text-gray-800">Registrasi Ekstrakurikuler SMANSAGO</h1>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th scope="col" class="text-center">No</th>

                                        <th scope="col" class="text-center">Nama Ekstrakurikuler</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Ekstrakurikuler =<?php echo ($count['ekskul']); ?> </th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ekskul as $e) {
                                        ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>

                                                <td><?php echo $e->nama_ekskul ?> <?php echo ($e->tahunajaran) ?></td>
                                                <td>
                                                    <a href="<?= base_url('Siswa/Registrasi/Regis_aksi/' . $e->id_ekskul) ?>" onclick="return confirm('Apakah Anda Yakin Akan Daftar?')" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Daftar</a>
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
<!-- /.container-fluid -->