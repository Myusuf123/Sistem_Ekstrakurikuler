<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h4 mb-4 text-gray-800">Cetak Laporan Anggota Ekstrakurikuler</h1>
    <hr>
    <div class="row">

        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <center>
                        <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Anggota Berdasarkan Kelas</h6>
                    </center>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form method="get" action="<?php echo base_url("Cetak/Cari") ?>">


                        <div class="form-group">
                            <label for="">Kelas</label><br>
                            <select name="kelas" id="kelas" class="custom-select col-lg-4">
                                <option value="" selected disabled>Pilih Kelas</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="">Jurusan</label><br>
                            <select name="nama_jurusan" id="nama_jurusan" class="custom-select col-lg-4">
                                <option value="" selected disabled>Pilih Jurusan</option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option <?= set_select('jurusan_id', $j['id_jurusan']) ?> value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('jurusan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="float-right">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i>&nbsp;PDF</button>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-7">
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


                        <div class="card-header py-3">
                            <center>
                                <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Anggota Berdasarkan Ekstrakurikuler</h6>
                            </center>
                        </div>
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

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ekskul as $e) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $e->nama_ekskul ?></td>
                                                <td>
                                                    <a href="<?= base_url('Cetak/cetak_anggota/' . $e->id_ekskul) ?>" class="btn btn-danger btn-sm"><i class="fa fa-print"></i>&nbsp;&nbsp;PDF</a>

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
</div>
<!-- End of Main Content -->