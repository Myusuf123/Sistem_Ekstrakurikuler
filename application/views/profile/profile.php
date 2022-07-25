<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <label><B>Profile</B></label>
            </div>
            <div class="card-body">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <?php foreach ($profile as $p) {
                            ?>
    
                                <div class="table-responsive">
                            <table class="table table-bordered table-striped w-90 dt-responsive nowrap" id="dataTable" width="100%">
                                <thead></thead>

                                <tbody>
                                     <tr>
                                        <td width="20%">NIS</td>
                                        <td><?php echo $p['nis'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama Lengkap</td>
                                        <td><?php echo $p['nama'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Kelas</td>
                                        <td><?php echo $p['kelas'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?php echo $p['gender'] ?></td>
                                    </tr>
                
                                    <tr>
                                        <td>No Telepon</td>
                                        <td><?php echo $p['no_telp'] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                                
                        </div>
                       
                        <div class="col-md-4">
                        <br> <br>
                        <div class="card-header py-3 table-bordered">
                            <center><img width="100px" height="130px" src="<?= base_url() ?>assets/profile/<?php echo $p['foto'] ?>" />
                            </center>
                        </div>
                        </div>
                    <?php } ?>
                    </div>
                    <br>
                    <a href="<?= base_url('Home/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                    <a href="<?= base_url('Profile/edit/') ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->