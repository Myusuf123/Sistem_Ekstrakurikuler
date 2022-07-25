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
                            
                                <div class="table-responsive">
                            <table class="table table-bordered table-striped w-90 dt-responsive nowrap" id="dataTable" width="100%">
                                <thead></thead>

                                <tbody>
                                     <tr>
                                        <td width="20%">NIS</td>
                                        <td><?php echo $guru['nip'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama Lengkap</td>
                                        <td><?php echo $guru['nama_g'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>No Telepon/WA</td>
                                        <td><?php echo $guru['nohp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td><?php echo $guru['level'] ?></td>
                                    </tr>
                

                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-4">

                        <br>
                        <div class="card-header py-3 table-bordered">
                            <center><img width="100px" height="130px" src="<?= base_url() ?>assets/profile/<?php echo $guru['foto_g'] ?>" />
                            </center>
                        </div>
                        </div>
  
                    </div>
                    <br>
                    <a href="<?= base_url('Home/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                    <a href="<?= base_url('Profile/editadmin/') ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->