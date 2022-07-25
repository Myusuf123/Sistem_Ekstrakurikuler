<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-left"><a href="<?= base_url('Pembina/P_jadwal/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></div>
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
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <label><i class="fa fa-info"></i> <b>INFORMASI</b></label>
                            <h6>Berikut Merupakan Jadwal Kegiatan Ekstrakurikuler<br><b><?= $namaekskul['nama_ekskul'] ?> (<?= $namaekskul['tahunajaran'] ?>)</b><br>

                            </h6>
                        </div>
                    </div>
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
                                        <td>

                                            <a href="<?= base_url('Pembina/P_jadwal/edit/' . $j['id_jadwal']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                            <a href="<?= base_url('Pembina/P_jadwal/hapus/' . $j['id_jadwal']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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