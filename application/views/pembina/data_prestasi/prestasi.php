<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-left"><a href="<?= base_url('Pembina/P_prestasi/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></div>
        </div>
        <div class="row no-gutters">
            <div class="table-responsive">

                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <label><i class="fa fa-info"></i> <b>INFORMASI</b></label>
                            <h6>Berikut merupakan Data Prestasi Ekstrakurikuler<br><b><?= $namaekskul['nama_ekskul'] ?> (<?= $namaekskul['tahunajaran'] ?>) </b><br>

                            </h6>
                        </div>
                    </div>
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Jenis Ekstrakurikuler</th>
                                    <th scope="col" class="text-center">Tanggal Perlombaan</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tboy>
                                <?php
                                $no = 1;
                                foreach ($prestasi as $j) {
                                ?>
                                    <?php $date = date_create($j['tgl_lomba']);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $j['nama_ekskul']; ?></td>
                                        <td><?= $new_date; ?></td>
                                        <td><?= $j['deskripsi']; ?></td>
                                        <td>

                                            <a href="<?= base_url('Pembina/P_prestasi/edit/' . $j['id_prestasi']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                            <a href="<?= base_url('Pembina/P_prestasi/hapus/' . $j['id_prestasi']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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