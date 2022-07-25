<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->
    <br>
    <h1 class="h3 mb-4 text-gray-800">Data Ekstrakurikuler</h1>
    <hr>
    <br>


    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="row no-gutters">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Ekstrakurikuler</th>
                                <th scope="col" class="text-center">Nama Pembina</th>
                                <th scope="col" class="text-center">Periode/Tahun Ajaran</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Seluruh Siswa SMAN 1 Purbolinggo = </th>
                            </tr>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($ekskul as $e) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $e['nama_ekskul']; ?></td>
                                        <td><?= $e['nama_g']; ?></td>
                                        <td><?= $e['tahunajaran']; ?></td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->