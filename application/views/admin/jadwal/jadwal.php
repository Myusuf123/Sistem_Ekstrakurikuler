<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Jadwal Ekstrakurikuler</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right"><a href="<?= base_url('Admin/Jadwal/tambah/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
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
                                    <th scope="col" class="text-center">Jenis Ekstrakurikuler</th>
                                    <th scope="col" class="text-center">tanggal</th>
                                    <th scope="col" class="text-center">Waktu</th>
                                    <th scope="col" class="text-center">Tempat Latihan</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Periode</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tboy>
                                <?php
                                $no = 1;
                                foreach ($jadwal as $j) {
                                ?>
                                    <?php $date = date_create($j['tgl']);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $j['nama_ekskul']; ?></td>
                                        <td><?= $new_date; ?></td>
                                        <td><?= $j['jam_mulai']; ?> - <?= $j['jam_selesai']; ?> WIB</td>
                                        <td><?= $j['lokasi']; ?></td>
                                        <td><?= $j['deskripsi']; ?></td>
                                        <td><?= $j['tahunajaran']; ?></td>
                                        <td>

                                            <a href="<?= base_url('Admin/Jadwal/edit/' . $j['id_jadwal']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                            <a href="<?= base_url('Admin/Jadwal/hapus/' . $j['id_jadwal']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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