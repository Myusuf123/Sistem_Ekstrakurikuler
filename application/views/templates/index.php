<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <center>
    <div class="card mb-4 col-lg-6">
                            <div class="card-header py-6">
                                <label style="font-size: 32px; font-family:'Times New Roman'; font-weight: bold;"><i class="fa fa-home"></i> Selamat Datang</label>
                                <h6>Di Sistem Informasi Ekstrakurikuler<br> SMAN 1 Purbolinggo <br>
                                    <br>Jl.Ki Hajar Dewantara KM 02 Desa 
Tanjung Intan kecamatan Purbolinggo Kabupaten Lampung Timur.

                                </h6>
                            </div>
                        </div>
                        </center>
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <hr>
    <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Esktrakurikuler
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($count['ekskul']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-futbol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Pembina
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($count['guru']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Siswa
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($count['siswa']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Ketua
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($countt['pendaftaran']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <hr>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h1 class="h4 mb-4 text-gray-800">Data Prestasi Ekstrakurikuler</h1>
        </div>
        <div class="row no-gutters">
            <div class="table-responsive">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Jenis Ekstrakurikuler</th>
                                    <th scope="col" class="text-center">Tanggal Perlombaan</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Periode</th>
                                   
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
                                        <td><?= $j['tahunajaran']; ?></td>

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
<!-- /.container-fluid -->