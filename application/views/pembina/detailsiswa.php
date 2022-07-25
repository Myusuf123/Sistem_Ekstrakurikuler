<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <?php foreach ($ketua as $k) { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>NIS : </b><?php echo $k->nis ?></b></h1>
                                </div>

                                <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>NAMA KETUA : </b> <?php echo $k->nama ?></b></h1>

                                </div>
                                <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>JENIS KELAMIN : </b> <?php echo $k->gender ?></b></h1>

                                </div>

                                <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>KELAS : </b> <?php echo $k->kelas ?> <?php echo $k->nama_jurusan ?></h1>

                                </div>

                                <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>NO TELPON/WA : </b> <?php echo $k->no_telp ?>
                                </div>

                                <!-- <div class="form-group">
                                    <h1 class="h6 mb-2 text-gray-800"><b>STATUS : </b> <?php
                                                                                        if ($k->level == 'ketua') { ?>
                                            <span class="badge alert-warning"><?php echo $k->level ?></span>
                                        <?php } else { ?>
                                            <span class="badge alert-info"><?php echo $k->level ?></span>
                                        <?php } ?>
                                    </h1>
                                </div>
                                        -->


                            </div>
                            <div class="col-md-4">

                                <img width="100px" height="130px" src="<?= base_url() ?>assets/profile/<?= $k->foto ?>" />

                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <div class="float-left">
                        <a href="<?= base_url('Pembina/P_dataanggota/tampilsiswa') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>